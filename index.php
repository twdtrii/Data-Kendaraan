<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <!-- Container -->
    <div class="container">
        <h3 class="text-center">Informasi Data Kendaraan</h3>

        <?php
            include './koneksi.php';

            if (isset($_GET['no_data'])){
                $no_data=htmlspecialchars($_GET["no_data"]);

                $result = "delete from tb_kendaraan where no_data='$no_data'";
                $query = mysqli_query($koneksi, $result);

                if ($query) {
                    header("location: index.php");
                } else {
                    echo "<div class='alert alert-danger'> Data Gagal Dihapus.</div>";
                }
            }

        ?>

        <!-- Row 1-->
        <div class="row">
            <div class="col-md-15">

                <div class="card">
                    <div class="card-header bg-info text-light">
                        Pencarian
                    </div>
                    <div class="card-body">

                    <form method="GET" Action="index.php">
                        <div class="mb-3">
                            <label  class="form-label">No Registrasi</label>
                            <input type="text" name="tcarinomer" class="form-control" placeholder="Masukan No Registrasi" required>
                        </div>

                        <div class="mb-3">
                            <label  class="form-label">Nama Pemilik</label>
                            <input type="text" name="tcarinama" class="form-control" placeholder="Masukan Nama Pemilik" required>
                        </div>

                        <div class="text-left">
                        <hr>
                        <a type="bcari" class="btn btn-primary" role="button">Search</a>
                        <a href="create.php" class="btn btn-primary" role="button">Add</a>
                        
                    </div>
                    </form>

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Row 1-->

        <!-- Row 2 -->
        <div class="card mt-3">
                <div class="card-header bg-info text-light">
                    Data Kendaraan
                </div>
                <div class="card-body">
                    
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>No Registrasi</th>
                            <th>Nama Pemilik</th>
                            <th>Merek Kendaraan</th>
                            <th>Tahun Kendaraan</th>
                            <th>Kapasitas</th>
                            <th>Warna</th>
                            <th>Bahan Bakar</th>
                            <th colspan="3">Action</th>                            
                        </tr>

                        <?php

                            include "./koneksi.php";

                            // Cari
                            if(isset($_POST['bcari'])){
                                $keyword = $_POST['tcarinomer'];
                                $query = "SELECT * from tb_kendaraan where nomor_registrasi_kendaraan like '%$keyword%' or nama_pemilik 
                                like '%$keyword%' order by no_data desc";
                            }else{
                                
                                $query = "SELECT * From tb_kendaraan order by no_data desc";
                                $result = mysqli_query($koneksi, $query);

                            }
                            // Cari
                           
                           $no =0;
                           while ($data = mysqli_fetch_assoc($result)) {
                            $no++;
                            ?>

                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data['nomor_registrasi_kendaraan']; ?></td>
                            <td><?php echo $data['nama_pemilik']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><?php echo $data['merk_kendaraan']; ?></td>
                            <td><?php echo $data['tahun_pembuatan']; ?></td>
                            <td><?php echo $data['kapasitas_silinder']; ?></td>
                            <td><?php echo $data['warna_kendaraan']; ?></td>
                            <td>
                            <a href="detail.php?no_data=<?php echo htmlspecialchars($data['no_data']); ?>" class="btn btn-warning" role="button">Detail</a>
                            <a href="edit.php?no_data=<?php echo htmlspecialchars($data['no_data']); ?>" class="btn btn-primary" role="button">Edit</a>
                            <hr>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?no_data=<?php echo $data['no_data']; ?>" class="btn btn-danger" role="button">Delete</a>
                               
                            </td>

                        </tr>
                            
                        <?php
                            }
                        ?>
                        
                    </table>
                    
                    
                </div>
            </div>
        <!-- Row 2 -->

    </div>

    <!-- Container -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>