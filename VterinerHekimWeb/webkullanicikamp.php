<?php 
include 'header.php';
include 'baglan.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head><meta charset="UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
    <title>Veteriner</title>
</head>
<body>
<div>
    </br>
</div>    

<div class="container">
  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Başlık</th>
        <th>Resim</th>
        <th>Açıklama</th>
      </tr>
    </thead>
   <tbody>
     <?php
            $pet_sor=$db->prepare("SELECT * FROM veteriner_kampanyalar
            ");
            $pet_sor -> execute([
                'mailAdres'=> $_SESSION['userkullanici_mail'] 
                ] );
            while ($pet_cek=$pet_sor->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
               
                
                
                <td > <?php echo $pet_cek['baslik']; ?> </td> 
                 
              <td> <img   src="<?=$pet_cek['resim'];?>" width="150" height="150"></td>
              <td > <?php echo $pet_cek['text']; ?> </td> 
                
                <!-- <td border="0"><a href=".php">DETAY</a></td> -->
            
            </tr>
            <?php } ?>
     
    </tbody>
  </table>
</div>

</body>
</html>
</html>