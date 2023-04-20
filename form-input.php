<?php require('header.php'); ?>

<?php
/**
* Program memanfaatkan Program 10.2 untuk membuat form inputan sederhana.
**/
include "form.php";
include "database.php";
echo "<html><head><title>mahasiswa</title></head><body>";
$form = new Form("","Input Form");
$form->addField("txtNim", "Nim");
$form->addField("txtNama", "Nama");
$form->addField("txtAlamat", "Alamat");
echo "<h3>Silahkan isi form berikut ini :</h3>";
$form->displayForm();

// Menyimpan data ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nim = $_POST['txtNim'];
    $Nama = $_POST['txtNama'];
    $Alamat = $_POST['txtAlamat'];
    $db = new Database();
    $data = array(
        "Nim" => $Nim,
        "Nama" => $Nama,
        "Alamat" => $Alamat
    );
    $result = $db->insert("mahasiswa", $data);
    if ($result === false) {
        echo "Error: Gagal menyimpan data";
    } else {
        echo "Data berhasil disimpan";
    }
}
echo "</body></html>";
?>

<?php require('footer.php'); ?>