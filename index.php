<?php include 'config/config.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Berita</title>
</head>

<body>
    <h1>Daftar Berita</h1>
    <a href="create.php">+ Tambah Berita</a><br><br>

    <?php
    if (isset($_GET['msg'])) echo "<p>{$_GET['msg']}</p>";

    $result = $conn->query("SELECT * FROM berita ORDER BY id DESC");
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px'>";
        echo "<h2>{$row['title']}</h2>";
        echo "<img src='uploads/{$row['thumbnail']}' width='150'><br>";
        echo "<p>" . nl2br($row['content']) . "</p>";
        echo "<a href='edit.php?id={$row['id']}'>Edit</a> | ";
        echo "<a href='delete.php?id={$row['id']}' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>";
        echo "</div>";
    }
    ?>
</body>

</html>