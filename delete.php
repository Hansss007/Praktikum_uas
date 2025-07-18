<?php
include 'config/config.php';
$id = $_GET['id'];

$result = $conn->query("SELECT thumbnail FROM berita WHERE id=$id");
$data = $result->fetch_assoc();
unlink("uploads/" . $data['thumbnail']);

$conn->query("DELETE FROM berita WHERE id=$id");
header("Location: index.php?msg=Berita berhasil dihapus");
