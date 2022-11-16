<?php
/*
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-09-29
 * Class: CIS2288
 * Description: Assignment 2 - PEI Income Tax
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <div style="display: flex; justify-content: center;">
    <img src="background.png" style="center" width="100" height="100">
    </div>
    <title>2021 PEI Income Tax Return Form</title>
</head>
<body>
<form action="processTaxReturn.php" method="post">
    <table style="border: 0px; margin-left: auto; margin-right: auto">
        <tr style="background: #cccccc;">
            <th colspan="2">2021 PEI Income Tax Return Form</th>
        </tr>
        <tr>
            <td>Title:</td>
            <td><select name="title" id="title">
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Ms">Ms</option>
                    <option value="Dr">Dr</option>
                    <option value="Capt">Capt</option>
                </select></td>
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="firstName" size="50"
                       maxlength="50"/></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="lastName" size="50"
                       maxlength="50"/></td>
        </tr>
        </tr>
        <tr>
            <td>Postal Code:</td>
            <td><input type="text" name="addrPCode" size="25"
                       maxlength="25"/></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><textarea id="address" name="address" rows="4" cols="50">
                  </textarea></td>
        </tr>
        <tr>
            <td>Gross income:</td>
            <td> <input type="number" id="income" name="income" value="0" style="width: 90px">
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td></td>
            <td>
                <input type="checkbox" name="student" value="Yes">I am a full-time student.<br>
            </td>
        </tr>
        <tr><td></td></tr>
        <tr>
            <td colspan="2" style="text-align: center;"><input type="submit" value="Submit"/></td>
        </tr>
    </table>
</form>

</body>
</html>
