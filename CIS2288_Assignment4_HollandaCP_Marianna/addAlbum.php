<?php
/*
 * Album Form
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-10-27
 * Class: CIS2288
 * Description: Assignment 4 - The Vinyl Creator
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Vinyl Creator</title>
</head>
<body>
<style>
    #container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

</style>

<div id="container">
    <form action="process.php" method="post">
        <table style="border: 0px; margin-left: auto; margin-right: auto">
            <tr style="background: #e26ea8;">
                <th colspan="2" style="color: white">The Vinyl Creator</th>
            </tr>
            <tr>
                <td>Album Title:</td>
                <td><input type="text" name="title" size="25"
                           maxlength="50"/></td>
            </tr>
            <tr>
                <td>Artist:</td>
                <td><input type="text" name="artist" size="25"
                           maxlength="50"/></td>
            </tr>
            <tr>
                <td>Publisher:</td>
                <td><input type="text" name="publisher" size="25"
                           maxlength="50"/></td>
            </tr>
            <tr>
                <td>Genre:</td>
                <td><input type="text" name="genre" size="25"
                           maxlength="50"/></td>
            </tr>
            <tr>
                <td>Released:</td>
                <td><input type="text" name="released" size="25"
                           maxlength="50"/></td>
            </tr>
            <tr>
                <td>Length:</td>
                <td><input type="text" name="length" size="25"
                           maxlength="50"/></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <div class="form-group">
                        <?php
                        include 'Button.class.php';
                        $button = new Button();
                        $button->buttonName = "submit";
                        $button->buttonValue = "Submit";
                        $button->buttonStyle = "submit";
                        $button->buttonType = "submit";
                        $button->displayButton();
                        ?>
                    </div>
                </td>
            </tr>

        </table>
    </form>
</div>
</body>
</html>

