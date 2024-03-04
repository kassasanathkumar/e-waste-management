<!DOCTYPE html>
<html>
<head>
    <title>Collection centers Search Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-bottom: 20px;

        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 10px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .container{
            display: flex;
            justify-contents : center;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Search the Database for the Collection Centers</h2>
<div class="container">

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="search">Search town:</label>
    <input type="text" id="search" name="search">
    <button type="submit">Search</button>
</form>
</div>

<?php
// Step 3: Connect to the database
$servername = "localhost:3308";
$username = "root";
$password = "";
$database = "tech_reclaim";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 4: Search query
$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
$searchTerm = $conn->real_escape_string($searchTerm); // Escape special characters
$sql = "SELECT * FROM larger_companies WHERE company_name LIKE '%" . $searchTerm . "%'"; // Modify column_name

$result = $conn->query($sql);

// Step 5: Display search results
if ($result->num_rows > 0) {
    // output data of each row
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Phone Number</th><th>Town</th><th>District</th><th>State</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["phone_number"]. "</td><td>" . $row["estimated_cost"]. "</td><td>" . $row["address"]. "</td><td>" . $row["estimated_weight"]. "</td>";
        echo "</tr>";
        // You can output other fields as well
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

<div>
    <a href="./companies_home_page.php"><button type="button">Return to Home Page</button></a>
    </div>
    
</body>
</html>
