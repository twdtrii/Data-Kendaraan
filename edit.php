<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">       
        <?php 
            include "./koneksi.php";

            
            function input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if (isset($_GET['no_data'])) {
                $no_data = input($_GET['no_data']);

                $result = "select * from tb_kendaraan where no_data=$no_data";
                $query = mysqli_query($koneksi, $result);
                $data = mysqli_fetch_assoc($query);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $nomor_registrasi_kendaraan =input($_POST['nomor_registrasi_kendaraan']) ;
                $nama_pemilik = input($_POST['nama_pemilik']);
                $merk_kendaraan = input($_POST['merk_kendaraan']) ;
                $tahun_pembuatan = input($_POST['tahun_pembuatan']);
                $kapasitas_silinder = input($_POST['kapasitas_silinder']) ;
                $warna_kendaraan = input($_POST['warna_kendaraan']) ;
                $bahan_bakar = input($_POST['bahan_bakar']) ;

                $result = "edit tb_kendaraan set
                          nomer_registrasi_kendaraan='$nomor_registrasi_kendaraan',
                          nama_pemilik='$nama_pemilik',
                          merk_kendaraan='$merk_kendaraan',
                          tahun_pembuatan='$tahun_pembuatan',
                          kapasitas_silinder='$kapasitas_silinder',
                          warna_kendaraan='$warna_kendaraan',
                          bahan_bakar='$bahan_bakar'";

                
                $query = mysqli_query($koneksi, $result);

                if ($query){
                    header("Location:index.php");
                } else {
                    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";
                }

            }
            

        ?>
        
    <h3 class="text-center">Edit Data Kendaraan</h3>
    

    <!-- Row 1 -->
    <div class="row">
            <div class="col-md-15">

                <div class="card">
                    <div class="card-header bg-info text-light">
                        Add
                    </div>

                    
                    <div class="card-body">

                    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>No Registrasi Kendaraan</label>
                                    <input type="text" name="nomor_registrasi_kendaraan" class="form-control" id="nomer_registrasi_kendaraan" 
                                    placeholder="Masukan No Registrasi" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label>Tahun Pembuatan</label>
                                    <input type="number" name="tahun_pembuatan" class="form-control" id="tahun_pembuatan" placeholder="Masukan Tahun Pembuatan" required>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Nama Pemilik</label>
                                    <input type="text" name="nama_pemilik" class="form-control" id="nama_pemilik" placeholder="Masukan Nama Pemilik" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label>Kapasitas Silinder</label>
                                    <input type="number" name="kapasitas_silinder" class="form-control" id="kapasitas_silinder" placeholder="Masukan Kapasitas Silinder" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Merek Kendaraan</label>
                                    <input type="text" name="merk_kendaraan" class="form-control" id="merk_kendaraan" placeholder="Masukan Merek Kendaraan" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label>Warna Kendaraan</label>
                                        <select class="form-select" name="warna_kendaraan" required>
                                            <option selected>Pilih Warna</option>
                                            <option value="Merah">Merah</option>
                                            <option value="Hitam">Hitam</option>
                                            <option value="Biru">Biru</option>
                                            <option value="Abu">Abu-Abu</option>
                                            <option value="Hijau">Hijau</option>
                                            <option value="Pink">Pink</option>
                                        </select>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label>Alamat Pemilik Kendaraan</label>
                                    <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required></textarea>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label>Bahan Bakar</label>
                                    <input type="text" class="form-control" id="bahan_bakar" name="bahan_bakar" placeholder="Masukan Bahan Bakar" required>
                                </div>
                            </div>
                        </div>    
                        
                        <div class="text-left">
                            <hr>
                            <button type="simpan" name="simpan" class="btn btn-primary">Simpan</button>
                            <button class="btn btn-secondary" name="bkembali" type="kembali">Kembali</button>
                        </div>
                    </form>

                    
                        
                    
                </div>
            </div>
        </div>


    <!-- Row 1 -->


    </div>
    
</body>
</html>