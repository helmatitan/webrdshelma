<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
  <style>
    body {
      font-family: calibri;
    }

    .update {
      width: 90px;
      height: 30px;
      border-radius: 7px;
      font-family: calibri;
      font-size: 14px;
      font-weight: bold;
      outline: none;
      align-items: center;
      background: #7D3DCF;
      border-color: transparent;
      color: #ffff;
      box-shadow: 3px 3px 10px #C7B3E3;
      font-family: calibri;
      margin-bottom: 15px;
    }

    button:active {
      transform: scale(1.1);
    }
  </style>
</head>

<body style="background-color: #C7B3E3;">
  <div class="row" style="margin-top:2%; margin-right:29%;">
    <div class="col-sm-5"></div>
    <div class="col-md rounded bg-light" style="box-shadow: 5px 5px 7px -4px; padding:10px;">
      <div class="col-md-header bg-light" style="margin-top:10px;">
        <a href="index.php"><button ype="button" class="btn-close" aria-label="Close"
            onclick="return confirm('Are you sure to exit?')"></button></a>
        <h3 class="text-dark" align="center">Edit Data</h3>
      </div>
      <div class="col-md-body">
        <form action="edit-siswa.post.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
          <?php
          include './connection.php';
          $sql = 'select * from siswa where no = ' . $_GET['id'];
          $result = mysqli_query($conn, $sql);
          $data = mysqli_fetch_assoc($result);
          ?>

          <div>
            <label for="exampleInputEmail1" class="form-label text-xs font-weight-bold opacity-6 text-dark">Nama</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>">
          </div>
          <div>
            <label for="exampleInputEmail1"
              class="form-label text-xs font-weight-bold opacity-6 text-dark">Absen</label>
            <input type="text" class="form-control" name="absen" value="<?php echo $data['absen']; ?>">
          </div>
          <div>
            <label for="exampleInputEmail1"
              class="form-label text-xs font-weight-bold opacity-6 text-dark">Kelas</label>
            <input type="text" class="form-control" name="kelas" value="<?php echo $data['kelas']; ?>">
          </div>
          <div>
            <label for="exampleInputEmail1" class="form-label text-xs font-weight-bold opacity-6 text-dark">Foto</label>
            <input type="file" class="form-control" name="foto" value="<?php echo $data['foto']; ?>">
          </div>
          <br>
          <button type="submit" class="update"
            onclick="return confirm('Are you sure to update data from <?php echo $data['nama'] . '?'; ?>')"
            style="margin-left: 40%">Update</button>
        </form>
      </div>
      <div class="col-sm-5"></div>

    </div>
  </div>

</body>

</html>