<?php
$DATABASE_HOST = 'localhost:3308';
$DATABASE_USER = 'root';
$DATABASE_PASS ='';
$DATABASE_NAME = 'tech_reclaim';

$con = mysqli_connect($DATABASE_HOST,$DATABASE_USER,$DATABASE_PASS,$DATABASE_NAME);
if(mysqli_connect_error()){
    exit('Error connecting to the database' .mysqli_connect_errno());
}
if(!isset($_POST['name'],$_POST['phone_number'],$_POST['email'],$_POST['password'])){
    exit("values empty");
}
if(empty($_POST['name'] || $_POST['phone_number'] || $_POST['email'] || $_POST['password'])){
    exit("values are empty");
}
if($stmt = $con->prepare('SELECT id, password FROM single_users  WHERE email = ?')){
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0){
        echo 'email already exists;';
        echo "go to signup......!";
    }
    else{
        if($stmt = $con->prepare('INSERT INTO single_users (name, Phone_number, email, password, town, district, state) VALUES (?, ?, ?, ?, ?, ?, ?)')){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sssssss', $_POST['name'],$_POST['phone_number'], $_POST['email'], $password, $_POST['town'], $_POST['district'], $_POST['state']);
            $stmt->execute();
            echo 'Succesfully Registered!';

            echo "<script>setTimeout(function() {window.location.href = 'home.php';}, 3000);</script>";
        }
        else{
            echo 'ERRor occured!';
        }
        $con->close();
    }
}
?>