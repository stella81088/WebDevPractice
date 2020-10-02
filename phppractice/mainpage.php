<?php
$f_name = "stella";
$l_name = "li";
$age = 44;
$height = 1.7;
$can_vote = true;
$address = array('street' => '123 main street', 'city' => 'mycity');
$state = NULL;
define('PI', 3.1415);

?>

<!DOCTYPE html> <!-- defines document as HTML5  -->

<html>

<head>
    <!-- contain meta info: info bout data/webpage or how to display content/refresh browser
        (specify character set,page description,key words,author of the document,&
        viewport settings. -->

    <meta charset="utf-8"> <!-- default character encoding, translate character num to binary-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatiable" content="ie=edge">
    <!--choose what version of IE
    it should render as, and ie=edge will let you display the highest mode possible -->

    <title>The Main Page</title>
</head>

<body>
    <!-- defines documnet's body, container for visible content -->

    <h1> HOWDY YALL</h1>

    <!-- no longer a string, it is an object-->
    <!-- give me the body of the message-->
    <p>Name: <?php echo $f_name . ' ' . $l_name; ?> </p>

    <!-- calling upon php script you are in, if want to reference another php file, 
        put that file in action -->
    <form action="mainpage.php" method="post">
        <label>Email: </label>
        <input type="text" name="email" /> <br>
        <label>Number 1:</label>
        <input type="text" name="num1" /> <br>
        <label>Number 2:</label>
        <input type="text" name="num2" /> <br>
        <label>Website:</label>
        <input type="text" name="website" /> <br>
        <input type="submit" name="Submit" />
    </form>

    <?php
        if (isset($_POST["email"])) { //if there is value in the email
            if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)){ //check if email valid
                echo "Email is not valid<br>";
            }else{
                echo "email is valid<br>";
            }
        }

        if (isset($_POST["num1"]) && !empty($_POST["num2"])){
            $num1 = filter_input(INPUT_POST, "num1", 
            FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $num2 = filter_input(
                INPUT_POST,
                "num2",
                FILTER_SANITIZE_NUMBER_FLOAT,
                FILTER_FLAG_ALLOW_FRACTION
            );
            //sprintf - return formatted string
            $output = sprintf("%.1f + %.1f = %.1f", $num1, $num2, ($num1+$num2)); 
            //eliminate special characters inputted
            echo htmlspecialchars($output) . '<br>';
            
        }

        if (isset($_POST["website"])){
            $website = filter_input(INPUT_POST, "website", FILTER_VALIDATE_URL);
            echo 'Website: '. htmlspecialchars($website).'<br>';
        }
    ?>



</body>

</html>