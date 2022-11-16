<?php
/*
 * Process the Album Form
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-10-27
 * Class: CIS2288
 * Description: Assignment 4 - The Vinyl Creator
 */

include 'album.class.php';

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $artist = $_POST['artist'];
    $publisher = $_POST['publisher'];
    $genre = $_POST['genre'];
    $released = $_POST['released'];
    $length = $_POST['length'];

    $album1 = new Album;
    $album1->title = $title;
    $album1->artist = $artist;
    $album1->publisher = $publisher;
    $album1->genre = $genre;
    $album1->Released = $released;
    $album1->Length = $length;

    echo $album1->__toString();
    echo "<p><a href='addAlbum.php'>Add another album!</a></p>";

} else{
    header("Location: addAlbum.php");
    //VALIDATE STUFF HERE
    //if i have an error in my string print the try again
    // if dont use my if statement created already (the new Album)
    //I also need to style the table the way he wants to
}
?>