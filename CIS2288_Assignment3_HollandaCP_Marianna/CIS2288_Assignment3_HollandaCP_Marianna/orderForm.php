<?php
/*
 * Author: Marianna Hollanda Campos Pedroso
 * Date: 2021-10-16
 * Class: CIS2288
 * Description: Assignment 3 - Acme International
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acme Accessories Inc</title>
</head>
<body>

<style>
    body {background-color: #ff94c9;
        color: white;
        font-family: Georgia, sans-serif;
    }
    h2 {color: white;
        text-align: center;
        font-family: "Lucida Console", sans-serif;}
    ul {
        border: 2px solid #e26ea8;
        background-color: #e26ea8;
    }

    li {
        text-align: left;
        display: inline;
    }

    li a {
        color: white;
        padding: 9px 17px;
        text-decoration: none;
    }

</style>

<nav>
    <ul>
        <li>
            <a href="orderForm.php">Order Form</a>
        </li>
        <li>
            <a href="view.php">View Order</a>
        </li>
        <li>
            <a href="resetFile.php">Reset</a>
        </li>
    </ul>
</nav>

<h2>Acme Accessory Sales</h2>
<div id="container">
    <form action="processOrder.php" method="post">
        <table style="border: 0px; margin-left: auto; margin-right: auto">
            <tr style="background: #e26ea8;">
                <th colspan="2">Acme Accessories Inc.</th>
            </tr>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" size="50"
                           maxlength="50"/></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" size="50"
                           maxlength="50"/></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" name="phoneNum" size="25"
                           maxlength="25"/></td>
            </tr>
            <tr>
                <td>iPhone 12 case:</td>
                <td><select name="iphoneTwelve" id="iphoneTwelve">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                    </select></td>
            </tr>
            <tr>
                <td>iPhone 13 case:</td>
                <td><select name="iphoneThirteen" id="iphoneThirteen">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                    </select></td>
            </tr>
            <tr>
                <td>Samsung Galaxy case:</td>
                <td><select name="samsungGalaxy" id="samsungGalaxy">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                    </select></td>
            </tr>
            <tr>
                <td>Google Pixel case:</td>
                <td><select name="googlePixel" id="googlePixel">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                    </select></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="Submit" value="Submit" name="Submit"/></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

