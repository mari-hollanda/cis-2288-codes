<?php
/*
 * Trivia
 * Author: Badalkumar Patel and Marianna Hollanda
 * Date: 2021-11-17
 * Class: CIS2288
 * Description: Assignment 5 - Trivia
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>The Vinyl Creator</title>
    <meta charset="UTF-8">

    <! --- Linked files necessary for css and bootstrap --->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet" type="text/css">

</head>
<body id="main">

<?php


session_start();

// to handle user clicking trivia.php?action=restart
// We need to destroy the session and clear the session cookie
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'restart') {

        // kills server-side session
        session_destroy();

        // kills client-side cookie that stores the session id.
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        header('location:trivia.php');
    }


} // end if action set

//counter for questions
$questionCount = 0;

// if they made a guess check it!
if (isset($_POST['submit'])) {


    // get the input from the user and store it in variable and clean it
    $userInput = $_POST['input'];
    $inputAnswer = trim($userInput);

    //counter
    $questionCount = $_SESSION['questionCount'];

    //file path
    $pathToFile = "triviaQuestions/triviaQuestions.txt";
    //the delimiter
    $tab = "\t";

    //array of correct answers
    $correctAnswer[] = "";
    //array of all questions

    $questions[] = "";

    //counter for the loop
    $count = 0;

    //check if file exists ot not
    if (!file_exists($pathToFile)) {
        echo "<p><strong>The File Does Not Exist.</strong></p>";
        exit();
    }
// open the file
    $fp = fopen($pathToFile, 'r');

// if we can't find the file or it won't open, show a message
    if (!$fp) {
        echo "<p><strong>The File Does Not Exist.</strong></p>";
        exit();
    }
// check if the file is empty (no orders present)
    if (filesize($pathToFile) == 0) {
        echo "<h4>Sorry, There are no pending orders.</h4>";
    } else {

//read from file and store the questions and correct answers in arrays
        while (!feof($fp)) {
            $line = fgets($fp, 2048);
            $data_txt = str_getcsv($line, $tab);
            $questions[$count] = $data_txt[0];
            $correctAnswer[$count] = $data_txt[1];
            $count++;
        }
//close the file
        fclose($fp);
    }

    //if input is blank
    if ($userInput == "") {

        echo "<script type='text/javascript'>alert('Provide an Answer');</script>";

    } else {

//adding the input answers to the session array
        array_push($_SESSION['answer'], $inputAnswer);

        //checking for correct answers for score
        if (strtolower($correctAnswer[$questionCount]) == strtolower($_SESSION['answer'][$questionCount])) {
            $_SESSION['score'] = $_SESSION['score'] + 1;
        }

        //increment how many times they have answered  questions
        $questionCount++;

        // update the question and session count
        $_SESSION['questionCount'] = $questionCount;

        //if there are no more questions than game is over
        if ($questionCount == count($questions)) {

            $_SESSION['gameover'] = true;
        }


    }
    // end post guess checking

} else {
    // could be first time loading the game
    // or the game is in progress and the
    // user has returned to the game.

    if (isset($_POST['submit']) == false) {

//file path
        $pathToFile = "triviaQuestions/triviaQuestions.txt";
        $tab = "\t";
        $correctAnswer[] = "";
        $questions[] = "";
        $count = 0;
//check to see if file exist
        if (!file_exists($pathToFile)) {
            echo "<p><strong>The File Does Not Exist.</strong></p>";
            exit();
        }
// open the file
        $fp = fopen($pathToFile, 'r');

// if we can't find the file or it won't open, show a message
        if (!$fp) {
            echo "<p><strong>The File Does Not Exist.</strong></p>";
            exit();
        }
// check if the file is empty (no orders present)
        if (filesize($pathToFile) == 0) {
            echo "<h4>Sorry, There are no pending orders.</h4>";
        } else {

//read from file and store the questions and answers into the array
            while (!feof($fp)) {
                $line = fgets($fp, 2048);
                $data_txt = str_getcsv($line, $tab);
                $questions[$count] = $data_txt[0];
                $correctAnswer[$count] = $data_txt[1];

                $count++;
            }
//close the file
            fclose($fp);
        }

        //array of answers entered
        $_SESSION['answer'] = array();
        //counter
        $_SESSION['questionCount'] = 0;
        //score of the user
        $_SESSION['score'] = 0;
        $_SESSION['gameover'] = false;
    }

} // end if post guess is set

if ($_SESSION['gameover'] == false) {


    ?>
    <! --- the bootstrap theme --->

    <div class="container mt-5" id="questions">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>Trivia Quiz</h4>
                            <! --- diaplay the number of questions or of total questions --->
                            <span><?php echo("Question: " . ($questionCount + 1) . " of " . count($questions) . "<br>"); ?></span>
                        </div>
                    </div>
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h3 class="text-danger">Q.</h3>
                            <! --- diaplay questions --->
                            <h5 class="mt-1 ml-2"><?php echo($questions[$questionCount]); ?></h5>
                        </div>
                        <div class="ans ml-2">
                            <form action="trivia.php" method="POST">
                                Enter your Answer <input type="text" name="input"/> <input
                                        class="btn btn-primary border-success align-items-center btn-success"
                                        type="submit" name="submit" value="Submit"/>
                            </form>
                            <br><br>
                            <p style="text-align: center"><a
                                        class='btn btn-primary border-danger align-items-center btn-danger'
                                        href='trivia.php?action=restart'>Restart</a></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
} else

// game is over
{

?>
<! --- display the table with questions,answers, answers entered and the score --->
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="border">
                <div class="question bg-white p-3 border-bottom">
                    <div id="header4"><h4 style="display:inline-block;">Trivia Result</h4></div>
                    <?php
                    echo '
<table style="margin-left:auto;margin-right:auto;background-color: skyblue">
   

    <tr>
        <th>&nbsp Question Number &nbsp</th>
        <th>&nbsp Question &nbsp</th>
        <th>&nbsp Correct Answer &nbsp</th>
        <th>&nbsp Answer Entered &nbsp</th>
        
    </tr>
    ';
                    for ($c = 0; $c < count($questions); $c++) {
                        if (strtolower($correctAnswer[$c]) == strtolower($_SESSION['answer'][$c])) {
                            echo "<tr style='background-color: lightgreen '>";
                        } else {
                            echo "<tr style='background-color: lightcoral '>";
                        }

//display all the correct things to correct cell
                        echo "<td>" . ($c + 1) . "</td>";
                        echo "<td>" . $questions[$c] . "</td>";
                        echo "<td>" . $correctAnswer[$c] . "</td>";
                        echo "<td>" . $_SESSION['answer'][$c] . "</td>";

                        echo "</tr>";
                    }


                    echo '</table>';
                    //calculate the percentage
                    $percentage = ($_SESSION['score'] / count($questions)) * 100;
                    echo '<div id="score">';
                    echo("<h4> <br><br> Your Total Score is " . number_format($percentage, 2) . "%</h4> <br><br>");
                    echo "<p><a class='btn btn-primary border-danger align-items-center btn-danger' href='trivia.php?action=restart'>Restart</a></p>";
                    echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>


