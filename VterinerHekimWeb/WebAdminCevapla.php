<?php
include 'ayar.php';
$musid = $_POST["mus_id"];
$id = $_POST["id"];
$text = $_POST["text"];



$sql = "insert into veteriner_cevaplar (mus_id,soru_id,cevap) values ('$musid','$id','$text')";

if (mysqli_query($baglan, $sql)) {
    
 $guncelle = mysqli_query($baglan,"update veteriner_sorular set durum = '1' where id = '$id'");
 header("location:adminsorular.php?kay閬演_basarili");
} else {
    echo "Error deleting record: " . mysqli_error($baglan);
}
mysqli_close($baglan);
?>