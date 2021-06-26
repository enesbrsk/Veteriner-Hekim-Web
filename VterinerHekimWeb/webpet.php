<?php 
include 'ayar.php'; 
include 'adminheader.php';

?>

<!DOCTYPE html>
<html lang="tr">
<head><meta charset="UTF-8">
    
     <meta charset="UTF-8"> 

    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 

    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

    <link rel="stylesheet" href="style.css"> 

    <title>VeterinerUygulaması</title> 
</head>
<body>

       <div>
      
    <input type="text" style="width:800px;" name="pet_ismi" placeholder="Başlığı giriniz.." /> 
       
  </div>
  <div>
      
    <input type="text" style="width:800px;" name="pet_tur" placeholder="Başlığı giriniz.." /> 
       
  </div>
  <div>
      
    <input type="text" style="width:800px;" name="pet_cins" placeholder="Başlığı giriniz.." /> 
       
  </div>
      <input type="hidden" name="mus_id" value="<?php echo $row['id']; ?>">
      
     <a href="webpetekle.php"><button type="submit" class="sub"  id="uye" name="pet_ekle">Ekle</button> </a>   
        
</body>
</html>