<!DOCTYPE html>
<?php include './connection.php' ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: calibri;
        }

        .create {
            width: 90px;
            height: 30px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            align-items: center;
            background: #935CF5;
            border-color: transparent;
            ;
            color: #ffff;
            box-shadow: 3px 3px 10px #6c757d;
            font-family: calibri;
            margin-left: 20px;
        }

        .edit {
            width: 80px;
            height: 30px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            align-items: center;
            background: #7D3DCF;
            border-color: transparent;
            color: #ffff;
            margin-left: 0px;
            box-shadow: 3px 3px 10px #6c757d;
            font-family: calibri;
        }

        .delete {
            width: 80px;
            height: 30px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            align-items: center;
            background: #C7B3E3;
            border-color: transparent;
            color: #ffff;
            margin-left: 5px;
            margin-right: 20px;
            box-shadow: 3px 3px 10px #6c757d;
            font-family: calibri;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        a:hover {
            color: #fff;
        }

        button:active {
            transform: scale(1.1);
        }

        .student {
            font-weight: bold;
            margin-left: 20px;
            margin-top: 20px;
            margin-bottom: 50px;
        }

        .make {
            width: 90px;
            height: 30px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            outline: none;
            align-items: center;
            background: #935CF5;
            border-color: transparent;
            color: #ffff;
            box-shadow: 3px 3px 10px #6c757d;
            font-family: calibri;
        }

        table {
            margin-top: 10px;
        }

        .field {
            background: #935CF5;
        }

        input:active {
            border-color: #935CF5;
        }

        tr #header {
            background-color: #935CF5;
        }
    </style>
</head>

<body>
    <h5 class="text-center student">Data Siswa</h5>
    <button class="mb-20 create" data-bs-toggle="modal" data-bs-target="#exampleModal">CREATE</button>
    <br>

    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        $result = mysqli_query($conn, "select * from siswa where nama like '%" . $cari . "%'");
    } else {
        $result = mysqli_query($conn, "select * from siswa");
    }
    ?>

    <div class="card-body px-20 pt-20 pb-2">
        <form action="index.php" method="get">
            <div class="col-xs-4">
                <input type="text" name="cari" class="form-control" placeholder="Search by name">
            </div>
        </form>
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0 table-striped">
                <thead>
                    <tr class="text-xs font-weight-bold opacity-6 text-secondary bg-light">
                        <th>Nomor</th>
                        <th class="align-middle text-left">Nama</th>
                        <th class="align-middle text-left">Absen</th>
                        <th class="align-middle text-left">Kelas</th>
                        <th class="align-middle text-left">Foto</th>
                        <th class="align-middle text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr class="text-xs font-weight-bold">
                            <td class="align-middle text-left">
                                <?php echo $data['no']; ?>
                            </td>
                            <td class="align-middle text-left">
                                <?php echo $data['nama']; ?>
                            </td>
                            <td class="align-middle text-left">
                                <?php echo $data['kelas']; ?>
                            </td>
                            <td class="align-middle text-left">
                                <?php echo $data['absen']; ?>
                            </td>
                            <td class="align-middle text-left"><img src="file/<?php echo $data['foto']; ?>" width="100"
                                    height="100" /></td>
                            <td>
                                <button class="edit"><a
                                        href="edit-siswa.php?id=<?php echo $data['no']; ?>">EDIT</a></button>
                                <button class="delete"><a href="delete-siswa.post.php?id=<?php echo $data['no']; ?>"
                                        onclick="return confirm('Are you sure to delete the data from <?php echo $data['nama'] . '?'; ?>')">DELETE</a></button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--Modal Create-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="exampleModalLabel">Create Siswa</h5>
                    <button ype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="create-siswa.post.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Absen</label>
                            <input type="text" name="absen" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kelas</label>
                            <input type="text" name="kelas" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="make"
                            onclick="alert('Are you sure to create the data?')">Create</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>



</body>

</html>