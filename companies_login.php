<?php

session_start();

$DATABASE_HOST = 'localhost:3308';
$DATABASE_USER = 'root';
$DATABASE_PASS ='';
$DATABASE_NAME = 'tech_reclaim';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Error connecting to the database' .mysqli_connect_errno());
}
if(isset($_POST['name']) && isset($_POST['password'])) {

function validate($data) {

$data = trim($data);

$data = stripslashes($data);

$data = htmlspecialchars($data);

return $data;

}

$email = validate($_POST['name']);

$password = validate($_POST['password']);

if(empty($email)) {

header ("Location: index.php?erro-User Name is required");

exit();

}

else if(empty($password)) {

header("Location: index.php?error=Password is required");

exit();
}
$password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

if($stmt = $con->prepare('SELECT id, password FROM recycle_companies WHERE name = ?')){
    $stmt->bind_param('s', $_POST['name']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0){
        echo 'Details are tallied;';
        echo "<script>setTimeout(function() {window.location.href = './companies_home_page.html';}, 3000);</script>";
    }

exit();

}

else{

    echo 'email does not exists exists;';
    echo " go to sign in......!";

exit();

}

}

else {

header("Location: index.php");

exit();
}
$con->close();

?>