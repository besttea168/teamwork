<?php
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $upload_file = $upload_dir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
        $image_url = $upload_file;

        // Connect to the database
        $mysqli = new mysqli('localhost', 'username', 'password', 'my_database');
        if ($mysqli->connect_error) {
            die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        // Insert image URL into the database
        $stmt = $mysqli->prepare('INSERT INTO articles (image_url) VALUES (?)');
        $stmt->bind_param('s', $image_url);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Respond with JSON containing the image URL
            echo json_encode(['url' => $image_url]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Database insert failed']);
        }

        $stmt->close();
        $mysqli->close();
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Upload failed']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
?>