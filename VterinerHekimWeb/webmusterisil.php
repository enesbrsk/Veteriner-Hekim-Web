<?php
include 'ayar.php';
$sql = "DELETE FROM veteriner_kullaniciler WHERE id='" . $_GET["id"] . "'";

if (mysqli_query($baglan, $sql)) {
     header("location:musteriler.php?kay覺t_basarili");
} else {
    echo "Error deleting record: " . mysqli_error($baglan);
}
mysqli_close($baglan);
?>