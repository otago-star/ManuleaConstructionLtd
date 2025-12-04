
<?php
$host = 'localhost';
$db = 'reviews_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $review = $_POST['review'];

    $stmt = $conn->prepare("INSERT INTO reviews (name, email, review) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $review);
    $stmt->execute();
    echo "Review submitted successfully!";
    $stmt->close();
}

$conn->close();
?>
