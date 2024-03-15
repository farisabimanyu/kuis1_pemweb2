<?php require_once 'templates/header.php';

$barang = $conn->prepare("SELECT * FROM barang WHERE id = " . $_GET['id']);
$barang->execute();
$barang = $barang->fetch(PDO::FETCH_OBJ);

?>
<h1>Edit Barang</h1>
<a href="/kuis1_pemweb2">Kembali</a>
<br>
<br>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $barang->id; ?>">
    <table>
        <tr>
            <td> <label for="nama_barang">Nama_Barang</label></td>
            <td> <input type="text" name="nama_barang" id="nama_barang" value="<?= $barang->nama_barang; ?>"> </td>
        </tr>
        <tr>
            <td> <label for="harga">Harga</label></td>
            <td> <input type="number" name="harga" id="harga" value="<?= $barang->harga; ?>"> </td>
        </tr>
        <tr>
            <td> <label for="stok">stok</label> </td>
            <td> <input type="number" name="stok" id="stok" value="<?= $barang->stok; ?>"> </td>
        </tr>
    </table>

    <button type="submit" name="simpan">Perbarui</button>
</form>
<?php

if (isset($_POST['simpan'])) {
    $query = $conn->prepare("UPDATE barang SET
        nama_barang = '" . $_POST['nama_barang'] . "', harga = '" . $_POST['harga'] . "', stok = '" . $_POST['stok'] . "'
        WHERE id = " . $_POST['id']);

    if ($query->execute()) {
        header("Location:/kuis1_pemweb2");
    } else {
        echo "terjadi kesalahan query";
    }
}

require_once 'templates/footer.php'; ?>