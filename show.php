<?php require_once 'templates/header.php';

$barang = $conn->prepare("SELECT * FROM barang WHERE id = " . $_GET['id']);
$barang->execute();
$barang = $barang->fetch(PDO::FETCH_OBJ);

?>
<h1>Edit Barang</h1>
<a href="/kuis1_pemweb2">Kembali</a>
<br>
<br>
<pre>
    Id: <?= $barang->id; ?>
</pre>
<pre>
    Nama Barang: <?= $barang->nama_barang; ?>
</pre>
<pre>
    Harga: <?= $barang->harga; ?>
</pre>
<pre>
    Stok: <?= $barang->stok; ?>
</pre>
<?php require_once 'templates/footer.php'; ?>