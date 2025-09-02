<?php
require 'config.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM absensi WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "ERROR";
    }
    $stmt->close();
}
?>
