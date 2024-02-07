<?php
class tbody{
    function product(){
        include "conn.php";
        $sql="select * from products";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
        echo '
        <tr>
            <td>'.$row["id"].'</td>
            <td><input type="button" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-info barcode" value="'.$row["barcode"].'"></td>
            <td>'.$row["name"].'</td>
            <td>'.$row["category"].'</td>
        </tr>';
        }
    }
}
?>