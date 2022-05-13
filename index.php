<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `test`.`kman` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES
     ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    //echo $sql;

    // Execute the query
    if($con->query($sql) == true){
         echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to kman website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="kman" src="kman.jpeg" alt="kman">
    <div class="container">
        <h1>welcome to kman website</h1>
        <p>enter your details and submit this form to confirm your free videos </p>
        <?php
        if($insert == true){
        echo "<p class='submitmsg'>thank you for submit form</p>";}
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="Enter your name" placeholder="enter youre name">
            <input type="text" name="age" id="Enter your age" placeholder="enter youre age">
            <input type="text" name="gender" id="gender" placeholder="enter youre gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="phone" name="phone" id="email" placeholder="phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder ="Enter any other information here"></textarea>
            <button class="btn">submit</button>
            <button class="btn">reset</button>
        </form>
    </div>
    <script src="index.js"></script>
    <!--INSERT INTO `man` (`no`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'testname', '17', 'male', 'this@this.com', '9428388241', 'patel kathan sanjaybhai', current_timestamp()); -->
</body>
</html>

