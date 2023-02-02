<?php
include './connection.php';

$id = $_GET['id'];
$nama = $_POST['nama'];
$absen = $_POST['absen'];
$kelas = $_POST['kelas'];

if ($_FILES['foto']['size'] > 0) {
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, 'file/' . $filename);
    $upfile = mysqli_query($conn, "update siswa set foto='" . $filename . "' where no = '" . $id  . "' ");
}

$sql = "
        update siswa set nama = '" . $nama . "', absen = '" . $absen . "', kelas = '" . $kelas . "'
        where no = '" . $id . "';
    ";

$result = mysqli_query($conn, $sql);
if ($result) {
    header('Location: index.php');
} else {
    printf('Failed update student: ' . mysqli_error($conn));
    exit();
}
?>