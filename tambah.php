<?php require_once 'templates/header.php'; ?>
<h1>Tambah Barang</h1>
<a href="/kuis1_pemweb2">Kembali</a>
<br>
<br>
<form action="" method="post">
    <table>
        <tr>
            <td> <label for="nama_barang">Nama_Barang</label></td>
            <td> <input type="text" name="nama_barang" id="nama_barang" value=""></td>
        </tr>
        <tr>
            <td> <label for="harga">Harga</label></td>
            <td> <input type="number" name="harga" id="harga" value=""></td>
        </tr>
        <tr>
            <td> <label for="stok">stok</label> </td>
            <td> <input type="number" name="stok" id="stok" value=""> </td>
        </tr>
    </table>

    <button type="submit" name="simpan">Simpan</button>
</form>
<?php

if (isset($_POST['simpan'])) {
    $query = $conn->prepare("INSERT INTO barang(nama_barang, harga, stok) VALUES(
        '" . $_POST['nama_barang'] . "', '" . $_POST['harga'] . "', '" . $_POST['stok'] . "'
    )");

    if ($query->execute()) {
        header("Location:/kuis1_pemweb2");
    } else {
        echo "terjadi kesalahan query";
    }
}

require_once 'templates/footer.php'; ?>