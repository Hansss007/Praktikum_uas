<?php
include 'config/config.php';

$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);

// Validasi & upload gambar
$target_dir = "uploads/";
$filename = basename($_FILES["thumbnail"]["name"]);
$target_file = $target_dir . time() . "_" . $filename;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

$allowed = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowed)) {
    die("Hanya file JPG, JPEG, PNG, dan GIF yang diperbolehkan.");
}

if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
    $filenameOnly = basename($target_file);

    $stmt = $conn->prepare("INSERT INTO berita (title, thumbnail, content) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $filenameOnly, $content);

    if ($stmt->execute()) {
        header("Location: index.php?msg=Berita berhasil disimpan");
    } else {
        header("Location: index.php?msg=Gagal menyimpan berita");
    }
} else {
    die("Gagal mengupload gambar.");
}
