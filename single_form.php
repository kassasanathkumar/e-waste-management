<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $collection_center = $_POST['collection_center'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $town = $_POST['town'];
    $address = $_POST['address'];
    $choices = $_POST['choices'];

    // Validate and sanitize input data (you can add more validation as needed)
    $name = htmlspecialchars($name);
    $collection_center = htmlspecialchars($collection_center);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : "";
    $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    $state = htmlspecialchars($state);
    $district = htmlspecialchars($district);
    $town = htmlspecialchars($town);
    $address = htmlspecialchars($address);
    $choices = htmlspecialchars($choices);

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
    $sql = "INSERT INTO users_collection (name, collection_center, email, phone, state, district, town, address, choice) 
            VALUES ('$name', '$collection_center', '$email', '$phone', '$state', '$district', '$town', '$address', '$choices')";

    if ($conn->query($sql) == TRUE) {
        echo "New record created successfully";

        echo "<script>setTimeout(function() {window.location.href = './single_home_page.php';}, 3000);</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
