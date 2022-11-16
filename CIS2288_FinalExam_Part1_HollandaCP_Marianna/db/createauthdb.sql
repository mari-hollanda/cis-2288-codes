# noinspection SqlNoDataSourceInspection

use books;
create table external_users ( custUser varchar(20), custPass varchar(40), primary key (custUser));
insert into external_users values ( 'siteAdminAccount', sha1('CISpass') );
grant select,insert,update,delete on books.*
    to 'web_only_user'@'localhost'
    identified by 'web_secret_password';
flush privileges;
