<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name= $_POST['name'];
    $company_name= $_POST['company_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $estimated_cost = $_POST['estimated_cost'];
    $address = $_POST['address'];
    $estimated_weight = $_POST['estimated_weight'];

    // Validate and sanitize input data (you can add more validation as needed)
    $name = htmlspecialchars($name);
    $company_name = htmlspecialchars($company_name);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : "";
    $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $estimated_cost = filter_var($estimated_cost, FILTER_SANITIZE_NUMBER_INT);
    $address = htmlspecialchars($address);
    $estimated_weight = filter_var($estimated_weight, FILTER_SANITIZE_NUMBER_FLOAT);

    // Step 2: Connect to the database
    $servername = "localhost:3308"; // Change this to your database server
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $database = "tech_reclaim"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Step 3: Insert data into the database
    $sql = "INSERT INTO larger_companies ( name, company_name, email, phone_number, estimated_cost, address, estimated_weight) 
            VALUES ('$name','$company_name', '$email', '$phone', '$estimated_cost', '$address', '$estimated_weight')";

    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";

        echo "<script>setTimeout(function() {window.location.href = './large_home_page.php';}, 3000);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
