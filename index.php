<?php require_once 'templates/header.php'; ?>
<h1>Semua Barang</h1>
<a href="tambah.php">Tambah Barang</a>
<br>
<br>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $gudang = $conn->prepare("SELECT * FROM barang");
        $gudang->execute();
        while ($barang = $gudang->fetch(PDO::FETCH_OBJ)) {
        ?>
            <tr>
                <td><?= $barang->id; ?></td>
                <td><?= $barang->nama_barang; ?></td>
                <td><?= $barang->harga; ?></td>
                <td><?= $barang->stok; ?></td>
                <td>
                    <a href="edit.php?id=<?= $barang->id; ?>">Edit</a>
                    <a href="show.php?id=<?= $barang->id; ?>">Show</a>
                    <a href="?hapus&id=<?= $barang->id; ?>">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php

if (isset($_GET['hapus'])) {
    if ($_GET['id']) {
        $query = $conn->prepare("DELETE FROM barang WHERE id = " . $_GET['id']);
        if ($query->execute()) {
            header('Location:/kuis1_pemweb2');
        }
    }
}

require_once 'templates/footer.php'; ?>