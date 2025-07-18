<?php
include 'config/config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM berita WHERE id=$id");
$data = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Berita</title>
</head>

<body>
    <h1>Edit Berita</h1>
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        Judul: <input type="text" name="title" value="<?= $data['title'] ?>" required><br><br>
        Gambar Lama: <img src="uploads/<?= $data['thumbnail'] ?>" width="120"><br>
        Ganti Gambar: <input type="file" name="thumbnail"><br><br>
        Konten:<br>
        <textarea name="content" rows="8" cols="50" required><?= $data['content'] ?></textarea><br><br>
        <button type="submit">Update</button>
    </form>
</body>

</html>