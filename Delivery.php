<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $deliveryDate = $_POST["delivery_date"];
    $deliveryTime = $_POST["delivery_time"];
    $itemDescription = $_POST["item_description"];

    // Validate input (you can add mor
    if (empty($name) || empty($email) || empty($address) || empty($phone) || empty($deliveryDate) || empty($deliveryTime) || empty($itemDescription)) {
        echo "Please fill in all fields.";
    } else {
        // Connect to your database (replace placeholders with actual values)
        $conn = new mysqli("localhost", "username", "password", "onlineshop");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute SQL statement
        $stmt = $conn->prepare("INSERT INTO deliveries (name, email, address, phone, delivery_date, delivery_time, item_description) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $email, $address, $phone, $deliveryDate, $deliveryTime, $itemDescription);
        
        if ($stmt->execute()) {
            echo "Delivery booking successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Booking</title>
</head>
<body>
    <h2>Delivery Booking Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        
        <label for="address">Address:</label><br>
        <textarea id="address" name="address"></textarea><br>
        
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br>
        
        <label for="delivery_date">Delivery Date:</label><br>
        <input type="date" id="delivery_date" name="delivery_date"><br>
        
        <label for="delivery_time">Delivery Time:</label><br>
        <input type="time" id="delivery_time" name="delivery_time"><br>
        
        <label for="item_description">Item Description:</label><br>
        <textarea id="item_description" name="item_description"></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
