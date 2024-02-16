<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
body{
margin:0px;
}

    </style>
    </head>
    
    
    <body>
    <?php
    $us = Auth::id();
    $users = DB::connection('mysql')->table('users')->where('id',$us)->first();
    $products = DB::connection('mysql')->table('products')->get();
    ?>
    <div class="container-fluid" style="width:100%;">

    <div class="navbar navbar-dark bg-dark box-shadow" style="width:100%;margin-bottom:20px;">
    <div class="col-5"></div>
        <div class="col-3">
          <a href="/" class="navbar-brand d-flex align-items-center">
            <strong>Select Product</strong>
          </a>
           </div>
           <div class="col-4"><span class="text-end" style="color:white">Hi, <?php echo $users->name ?></span></div>
      </div>

      <div class="container-fluid" style="width:70%;">
      <div class="row">
        <?php 
        foreach ($products as $product) {
          
         
        ?>
      <div class="col-lg-4">
      <div class="card" style="width: 98%;margin-bottom:10px;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product->name; ?></h5>
  <p class="card-text"><b>Rs.<?php echo $product->price; ?></b></p>
    <a href="/buy/<?php echo $product->id ?>/<?php echo $product->price; ?>" class="btn btn-block btn-primary">Buy</a>
  </div>
</div>
  
     </div>
      <?php } ?>
        </div>
</div>
    
</body>
</html>
</body>
</html>

    

    

    
</body>
</html>