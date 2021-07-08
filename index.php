<?php



$servername = "localhost";
$username = "kzxed";
$password = "~Bt6zx51";
$dbname = "cringefr_mth";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['get'])) {
    $get = $_GET['get'];

    $sql = "INSERT INTO xss (mess) VALUES ('$get')";

    if ($conn->query($sql) === TRUE) {
        echo "Message added";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}

if(isset($_POST['envoyer'])) {
    $message = $_POST['message'];

    $sql = "INSERT INTO xss (mess) VALUES ('$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message added";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}


?>

<!doctype HTML>
<head>
<title>XSS Stock by kzxed#1337</title>
</head>

<body>
    <h1>
        Add XSS by POST:
    </h1>
    <form action="index.php" method="POST">

        <input type="text" name="message">
        <input type="submit" name="envoyer">

    </form>



    <br><br><br>

    <h4>_______________________________________________________</h4>
    <?php

    $query = "SELECT * FROM xss";
    $result = $conn->query($query);

    echo "<br><h2>XSS message:</h2><br>";

    while($row = mysqli_fetch_array($result)){
        echo "<br>", $row[mess];
    }


    ?>
</body>
