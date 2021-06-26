<?php 
include 'baglan.php';

if(isset($_POST['resimyukle'])){
$yukleklasor = "resimler/"; // yüklenecek klasör
$tmp_name = $_FILES['yukle_resim']['tmp_name'];
$name = $_FILES['yukle_resim']['name'];
$boyut = $_FILES['yukle_resim']['size'];
$tip = $_FILES['yukle_resim']['type'];
$uzanti = substr($name,-4,4);
$rastgelesayi1 = rand(10000,50000);
$rastgelesayi2 = rand(10000,50000);
$resimad = $rastgelesayi1.$rastgelesayi2.$uzanti;

// dosya var mı kontrol
if(strlen($name) ==0){
    echo "bir dosya seçiniz!";
    exit();
}

//boyut kontrol
if($boyut > (1024*1024*3)){
    echo "dosya boyutu çok fazla";
    exit();
}

// tip kontrol
if($tip != 'image/jpeg' && $tip != 'image/png' && $uzanti != '.jpg' ){
    echo "yalnızca jpeg veya png formatında olabilir";
    exit();
}

move_uploaded_file($tmp_name, "$yukleklasor/$resimad");
}

$resimsor = $db->prepare("INSERT INTO veteriner_kampanyalar SET resim=:resim ");
$resimyukle = $resimsor->execute(array('resim' => $resimad) );

if(isset($_POST['resimyukle'])){
$text = isset($_POST['text']) ? $_POST['text'] : null;
$baslik = isset($_POST['baslik']) ? $_POST['baslik'] : null;

$kampanyasorgu = $db -> prepare("INSERT INTO veteriner_kampanyalar SET text=?, baslik=?");
$ekle = $kampanyasorgu -> execute([$text, $baslik]);
}
?>

    <!DOCTYPE html> 

<html lang="tr"> 

<head> 

    <title>VeterinerUygulaması</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head> 

<body> 

    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand " href="#">MSE Veteriner</a>
    </div>
    <ul class="nav navbar-nav pd-1">
      <li class="active "><a href="adminanasayfa.php">Ana Sayfa</a></li>
       <li class="active"><a href="webadminkampanya.php">Kampanyalar</a></li>
      <li class="active"><a href="webkampanya.php">Kampanya Paylaş</a></li>
      <li class="active"><a href="adminsorular.php">Sorular</a></li>
       <li class="active"><a href="musteriler.php">Müşteriler</a></li>
   
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Çıkış</a></li>
    </ul>
  </div>
</nav>
<div class="container">
    <h2>Kampanya Paylaş</h2>
  </br>
    <form action="WebKampanyaEkle.php" method="POST" enctype="multipart/form-data">
    
  <div >
      
    <input type="text" style="width:800px;" name="baslik" placeholder="Başlığı giriniz.." /> 
       
  </div>
  </br>
      <div>
    <input type="text" name="text" style="width:800px; height:200px;" placeholder="İçeriği giriniz.." />
        
      </div>
      
      </br>
      </br>
      
    <input type="file" name="resim"  /> 
    </br>
    <input type="submit" value="Paylaş" name="resim" style="width:170px; height:40px;" /> 
  
</form>


</div>








</body> 

</html>
