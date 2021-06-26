


<?php
include 'ayar.php';



$pet_ismi = $_POST['pet_ismi'];
$pet_tur = $_POST['pet_tur'];
$pet_cins = $_POST['pet_cins'];

$sql = "INSERT INTO veteriner_pet_listesi SET mus_id='" . $_GET["id"] . "', pet_ismi='$pet_ismi', pet_tur='$pet_tur', pet_cins='$pet_cins' ";

if (mysqli_query($baglan, $sql)) {
     header("location:musteriler.php?kay閬演_basarili");
} else {
    echo "Error deleting record: " . mysqli_error($baglan);
}
mysqli_close($baglan);
?>

