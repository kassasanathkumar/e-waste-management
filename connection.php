<?php
$DATABASE_HOST = 'localhost:3308';
$DATABASE_USER = 'root';
$DATABASE_PASS ='';
$DATABASE_NAME = 'form';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Error connecting to the database' .mysqli_connect_errno());
}
if(!isset($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password'])){
    exit("values empty");
}
if(empty($_POST['first_name'] || $_POST['last_name'] || $_POST['email'] || $_POST['password'])){
    exit("values are empty");
}
if($stmt = $con->prepare('SELECT id, password FROM users WHERE email = ?')){
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0){
        echo 'email already exists, Try Again;';
    }
    else{
        if($stmt = $con->prepare('INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)')){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('ssss', $_POST['first_name'],$_POST['last_name'], $_POST['email'], $password);
            $stmt->execute();
            echo 'Succesfully Registered!';

            echo "<script>setTimeout(function() {window.location.href = 'index.php';}, 3000);</script>";
        }
        else{
            echo 'ERRor occured!';
        }
        $con->close();
    }
}
?>