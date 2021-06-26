<?php 

include("ayar.php");

$mailAdres = $_POST["mailAdres"];
$kadi = $_POST["kadi"];
$parola = $_POST["pass"];
$telefon = $_POST["telefon"];
$dogrulamaKodu = rand(0,10000).rand(0,10000);
$durum = 1;

$control = mysqli_query($baglan,"select * from veteriner_kullaniciler where mailAdres = '$mailAdres' or kadi ='$kadi'");
$count = mysqli_num_rows($control);


class User{
	public $text ;
	public $tf;
	
}
$user = new User();



if($count >0)
{
	$user ->text = "Girmiş olduğunuz bilgilere ait kullanıcı bulunmaktadır. Lütfen bilgilerinizi değiştiriniz..!";
	echo(json_encode($user));
}
else
{	
$addUser = mysqli_query($baglan,"insert into veteriner_kullaniciler(kadi,mailAdres,parola,dogrulamaKodu,durum,telefon) 
values ('$kadi','$mailAdres','$parola','$dogrulamaKodu','$durum','$telefon')");
	
		 header('location:webindex.php?durum=basarili');
	   
}



?>