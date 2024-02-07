<?php
include "conn.php";
$islem=$_GET["islem"];
switch($islem){
    case "select":
        $sql='select * from products where barcode='.$_POST["barcode"];
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        echo json_encode($row);
        break;
    case "update":
        $sql = "INSERT products (barcode, name, category) VALUES ('" . $_POST["barcode"] . "', '" . $_POST["name"] . "', '" . $_POST["category"] . "')";
        $result=$conn->query($sql);
        if ($result === TRUE) {
            echo "Veri başarıyla eklendi.";
        } else {
            echo "Veri eklenirken hata oluştu: " . $stmt->error;
        }
        break;
}

?>