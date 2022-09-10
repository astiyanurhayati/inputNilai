<?php


$rombel = ['PPLG XI-1', 'PPLG XI-2', 'PPLG XI-3', 'PPLG XI-4', 'PPLG XI-5'];


    // if(!empty($nama) && !empty($nis) && !empty($rombel) && !empty($nKeterampilan) && !empty($nPengetahuan) && !empty($rombels) ){
    // }
  
       
        @$nama = $_POST['nama'];
        @$nis = $_POST['nis'];
        @$nKeterampilan = $_POST['nk'];
        @$nPengetahuan = $_POST['np'];
        @$rombelss = $_POST['rombel'];
    
        $nilaiAkhir = ($nPengetahuan + $nKeterampilan)/2;
        $hasil = $nilaiAkhir;
        
        if($hasil >= 85){
            $nA = "A";
        }elseif ($hasil < 85 && $hasil >= 75) {
            $nA = "B";
        }else{
            $nA = "C";
        }

    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalku kelompok 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <h2 class="text-center mt-5">Form input Nilai</h2>
    <div class="card w-50 mx-auto mb-5">
        <div class="card-header">
        Isi Form Berikut
        </div>
        <div class="card-body">
            <form class="mx-5" action="index.php" method="POST" >
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" require>
                </div>
                <div class="mb-3 ">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" class="form-control" id="nis" name="nis" placeholder="NIS  " require>
                </div>
                <div class="mb-3 ">
                    <?php if($nKeterampilan > 100){ ?>
                        <div class="alert alert-danger" role="alert">
                           Nilai tidak boleh lebih dari 100
                        </div>
                    <?php } ?>
                    <label for="nk" class="form-label">Nilai Keterampilan</label>
                    <input type="number" class="form-control" id="nk" name="nk" required>
                </div>
                <div class="mb-3 ">
                <?php if($nPengetahuan > 100){ ?>
                        <div class="alert alert-danger" role="alert">
                           Nilai tidak boleh lebih dari 100
                        </div>
                    <?php } ?>
                    <label for="np" class="form-label">Nilai Pengetahuan</label>
                    <input type="number" class="form-control" id="np" name="np" required>
                </div>
                <select class="form-select mb-3 " aria-label="Default select example" name="rombel"  required >
                    <option value="" hidden>Rombel</option>
                    <?php
                    foreach($rombel as $rombels){
                        echo  "<option value='$rombels'>$rombels</option>"; 
                    }
                    ?>

                </select>

                <button type="submit" class="btn btn-success" name="daftar">Submit</button>
            </form>
        </div>
    </div>

    
<?php

if(isset($_POST['daftar'])){
    if($nKeterampilan <= 100 && $nPengetahuan <= 100){
    
    echo  '<div class="container">
        <div class="card w-50 mx-auto mb-5">
            <div class="card-body">
                <div class="card-header">
                Hasil inputan
                </div>
                <h5>Nama:'.$nama.'</h5>
                <h5>NIS:'.$nis. '</h5>
                <h5>Nilai Keterampilan:'.$nKeterampilan. '</h5>
                <h5>Nilai Pengetahuan: '.$nPengetahuan.'</h5>
                <h5>Rombel:'.$rombelss.' </h5>
                <h5>Nilai Akhir: '.$nA.'</h5>

            </div>
          
        </div>
    </div>';
    }
}
?>
</body>
</html>