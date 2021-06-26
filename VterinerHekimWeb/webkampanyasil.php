<?php
include 'ayar.php';
$sql = "DELETE FROM veteriner_kampanyalar WHERE id='" . $_GET["id"] . "'";

if (mysqli_query($baglan, $sql)) {
     header("location:adminkampanya.php?kay閬演_basarili");
} else {
    echo "Error deleting record: " . mysqli_error($baglan);
}
mysqli_close($baglan);
?>
