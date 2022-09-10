<?php
$rombel = ['PPLG XI-1', 'PPLG XI-2', 'PPLG XI-3', 'PPLG XI-4', 'PPLG XI-5'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coba</title>
</head>
<body>
<form action="" method="POST">
<label for="nama" class="form-label">Nama Siswa</label>
<input type="text" class="form-control" id="nama" name="nama" required><br>
<label for="nis" class="form-label">NIS</label>
<input type="number" class="form-control" id="nis" name="nis" placeholder="" required><br>
<label for="np" class="form-label">Nilai Pengetahuan</label>
<input type="number" class="form-control" id="np" name="np" required><br>
<label for="np" class="form-label">Nilai Keterampilan</label>
<input type="number" class="form-control" id="np" name="nk" required><br>

<select class="form-select mb-3 " aria-label="Default select example" name="rombel"  required >
        <option value="" hidden>Rombel</option>
        <?php
            foreach($rombel as $rombels){
                echo  '<option value="$rombels" name="name">'.$rombels.'</option>'; 
            }
        ?>

</select>

<button type="submit" class="btn btn-success" name="daftar">Submit</button>
</form>
</body>
</html>
<?php
if(isset($_POST['daftar'])){
    //ambil data dari inputan
    @$nama = $_POST['nama'];
    @$nis = $_POST['nis'];
    @$nKeterampilan = $_POST['nk'];
    @$nPengetahuan = $_POST['np'];
    @$rombels = $_POST['rombel'];
//--------------------------------------

// menghitung nilai akhir
    $nilaiAkhir = ($nPengetahuan + $nKeterampilan)/2;
    $hasil = $nilaiAkhir;
    
    if($hasil >= 85){
        $nA = "A";
    }elseif ($hasil < 85 && $hasil >= 75) {
        $nA = "B";
    }else{
        $nA = "C";
    }
//--------------------------------------------------



    echo  '
                <h3>Nama:'.$nama.'</h3>
                <h3>NIS:'.$nis. '</h3>
                <h3>Nilai Keterampilan:'.$nKeterampilan. '</h3>
                <h3>Nilai Pengetahuan: '.$nPengetahuan.'</h3>
                <h3>Rombel:'.$rombel[0].' </h3>
                <h3>Nilai Akhir: '.$nA.'</h3>

            ';
}
?>