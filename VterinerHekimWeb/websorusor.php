<?php 
include 'baglan.php';
include 'header.php';
include 'islem.php';
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
   
  

 <div class="container" >
     
        <h3>Gelen Cevaplar</h3>
          <table class="table table-dark table-hover">
                  <tbody>

            <?php
            $pet_sor=$db->prepare("SELECT * FROM veteriner_cevaplar 
            INNER JOIN veteriner_kullaniciler ON veteriner_cevaplar.mus_id=veteriner_kullaniciler.id WHERE mailAdres=:mailAdres");
            $pet_sor -> execute([
                'mailAdres'=> $_SESSION['userkullanici_mail'] 
                ] );
            while ($pet_cek=$pet_sor->fetch(PDO::FETCH_ASSOC)){ ?>
        <tr>
                <td height="30px"  > <?php echo $pet_cek['cevap']; ?> </td> 
            
            </tr>
            <?php } ?>
        </table>
    
    </div>

        <div class="container" >
    <form action ="islem.php" method="post">
    <div class="textarea">
        <textarea name="soru" style="width:600px; height:400px;" placeholder="Sorunuzu giriniz.."></textarea>
    </div> 
 
<input type="hidden" name="id" value="<?php echo $kullanicicek['id']; ?>">

<button name="soru_sor">GÖNDER</button> 

</form>
    </tbody>

  </table>

</div>


    
</body>
</html>