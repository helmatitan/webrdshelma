<?php

include './connection.php';

$nama = $_POST['nama'];
$absen = $_POST['absen'];
$kelas = $_POST['kelas'];

if ($_FILES['foto']['size'] > 0) {
    $foto = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($file_tmp, 'file/' . $foto);
    $sql = "
        insert into siswa (nama, absen, kelas, foto)
        values ('" . $nama . "', '" . $absen . "', '" . $kelas . "', '" . $foto . "');
    ";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: index.php');
    } else {
        printf('Failed create student: ' . mysqli_error($conn));
        exit();
    }
}
