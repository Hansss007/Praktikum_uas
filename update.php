<?php
include 'config/config.php';

$id = $_POST['id'];
$title = htmlspecialchars($_POST['title']);
$content = htmlspecialchars($_POST['content']);

$updateQuery = "";
if ($_FILES['thumbnail']['name']) {
    $old = $conn->query("SELECT thumbnail FROM berita WHERE id=$id")->fetch_assoc();
    unlink("uploads/" . $old['thumbnail']);

    $target_dir = "uploads/";
    $filename = time() . "_" . basename($_FILES["thumbnail"]["name"]);
    $target_file = $target_dir . $filename;
    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file);

    $updateQuery = "UPDATE berita SET title=?, thumbnail=?, content=? WHERE id=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssi", $title, $filename, $content, $id);
} else {
    $updateQuery = "UPDATE berita SET title=?, content=? WHERE id=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssi", $title, $content, $id);
}

if ($stmt->execute()) {
    header("Location: index.php?msg=Berita berhasil diperbarui");
} else {
    header("Location: index.php?msg=Gagal update");
}
