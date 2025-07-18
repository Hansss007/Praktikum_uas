<!DOCTYPE html>
<html>

<head>
    <title>Tambah Berita</title>
</head>

<body>
    <h1>Tambah Berita</h1>
    <form action="store.php" method="POST" enctype="multipart/form-data">
        Judul: <input type="text" name="title" required><br><br>
        Gambar Thumbnail: <input type="file" name="thumbnail" required><br><br>
        Konten:<br>
        <textarea name="content" rows="8" cols="50" required></textarea><br><br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>