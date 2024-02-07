<?php include("conn.php"); include "tbody.php"; $tbody=new tbody();?>
<input type="button" class="btn btn-info barcodes" value="asd">
<div class="container-fluid mt-4">
  <div class="row">
    <div class="col">
      <table class="table table-responsive table-striped custom-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Barkod</th>
            <th>İsim</th>
            <th>Kategori</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $menu = @$_GET["menu"];
        switch ($menu){
          case "product":
          $tbody->product();
        break;
        }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
