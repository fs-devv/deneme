<?php include("conn.php"); include "tbody.php"; $tbody=new tbody();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      *{
        font-family: 'Poppins', sans-serif!important;
      }
        .custom-table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .custom-table th, .custom-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #dee2e6;
        }

        .custom-table th {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
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
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ürün Bilgileri</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="barcode" class="form-label">Barkod</label>
          <input type="text" class="form-control" id="barcode">
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">İsim</label>
          <input type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Kategori</label>
          <input type="text" class="form-control" id="category">
        </div>
      </div>
      <div class="modal-footer justify-content-start">
        <button type="button" class="btn btn-primary kaydet" data-toggle="modal" data-target=".bd-example-modal-lg">Kaydet</button>
      </div>
    </div>
  </div>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </body>
</html>
<script>
  $(document).ready(function(){
    $(".barcode").click(function(){
      $.ajax({
        url:"islemler.php?islem=select",
        method:"post",
        data:{"barcode":$(this).val()},
        success:function(response){
          response=JSON.parse(response);
          $(".modal").find('input[type="text"]').eq(0).val(response["barcode"]);
          $(".modal").find('input[type="text"]').eq(1).val(response["name"]);
          $(".modal").find('input[type="text"]').eq(2).val(response["category"]);
        }
      });
    });
    $(".kaydet").click(function(){
      let barcode= $(".modal").find('input[type="text"]').eq(0).val();
      console.log(barcode);
      let name =$(".modal").find('input[type="text"]').eq(1).val();
      let category=$(".modal").find('input[type="text"]').eq(2).val();
      $.ajax({
        url:"islemler.php?islem=update",
        method:"post",
        data:{"barcode":barcode,"name":name,"category":category},
        success:function(response){
         console.log(response);

        }
      });
    });
    $(".barcodes").click(function(){
          $.ajax({
          url: 'tbody.php',
          method: 'GET',
          success: function(response) {
              // Aldığınız yanıtı console.log ile konsola yazdırın
              console.log(response);
          },
          error: function(xhr, status, error) {
              // Hata durumunda ne yapılacağını belirleyin
              console.error(error);
          }
      });

    });
  });
</script>
<?php

?>
