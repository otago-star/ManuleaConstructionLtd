
<?php
$host = 'localhost';
$db = 'reviews_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT name, review FROM reviews ORDER BY created_at DESC");

$reviews = array();
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

header('Content-Type: application/json');
echo json_encode($reviews);

$conn->close();
?>
