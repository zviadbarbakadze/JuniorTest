<?php 
require_once "productclasses.php";
require_once "delete.php";








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <title>Product List</title>
</head>
<body>
    

 <form action="" method="POST" >
   
    <div class=" container d-flex justify-content-between flex-wrap mt-5 border-bottom border-dark ">
        <h1 class="mx-3">Product List</h1>
        <div class="mb-3 mt-3">
        <a href="create.php" class='btn btn-success mx-3  '>ADD</a>
        <button type="submit" name="mass-delete" class="btn btn-danger ">MASS DELETE</button>
        </div>
    </div>
   
    
   
 <div class="container  d-flex flex-wrap mt-5 justify-content-center">
     <?php 
     $data=new Data();
     $prod=$data->getProduct();
     foreach($prod as $pro){ ?>
        <div class="card shadow m-3 text-center " style="width:240px">
        
            <input class="delete-checkbox position-absolute m-3 float-start" type="checkbox" name="checkbox[]" value="<?= $pro['id'] ?>">
            <p class="card-title mt-4 fw-bold mb-0"><?php echo $pro['sku'] ?></p>
            <p class="card-title fw-bold mb-0"><?php echo $pro['name'];?></p>
            <p class="fw-bold mb-0"><?php echo $pro['price']."$" ?></p>

            <div class="d-flex justify-content-center">
                <p class=" fw-bold mx-1"><?php echo $pro['type'] ?></p>
                <p class=" fw-bold"><?php if($pro['sizevalue']!=0){echo $pro['sizevalue'];} ?></p>
                <p class=" fw-bold"><?php if($pro['weight']!=0){echo $pro['weight'];} ?></p>
                <p class=" fw-bold"><?php if($pro['height']!=0
                && $pro['width']!=0 && $pro['length']!=0)
                {echo $pro['height'].'X'.$pro['width'].'X'.$pro['length'];}  ?></p>
                <p class=" fw-bold mb-5"><?php echo $pro['size'] ?></p>
            </div>

         </div>

        <?php } ?>
    </div>
</form>
<footer class=" container  border-top border-dark text-center mt-5">
    <h5 class="m-3">Scandiweb Test assignment</h5>
</footer>    
</body>
</html>
   
    

      
  
  
      
      
     
 
  
    
    
   
    
