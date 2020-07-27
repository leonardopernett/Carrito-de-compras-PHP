<?php 

include_once('global/conexion.php');
include_once('carrito.php');

 
$sql="SELECT * FROM productos ";

$sentences = $pdo->prepare($sql);
$sentences->execute();
$result = $sentences->fetchAll();

include_once('templates/header.php')
?>

<div class="container mt-5">
 <div class="alert alert-success">
   pantalla mensaje
   <?= $mensaje ?>
   <a href="" class="badge badge-success">ver mas</a>
 </div>

    <div class="row">
      <?php foreach($result as $indices=>$producto): ?>
        <div class="col-md-3">
            <div class="card">
            <img 
             src="<?= $producto['image'];  ?>"
             class="card-img-top" 
             title="<?= $producto['name'] ?>"
             alt="" 
             height="317"
             data-toggle="popover" 
             data-content="<?= $producto['description']; ?>"
            data-trigger="hover"
             >
                <div class="card-body">
                <h3><?= $producto['name'] ?></h3>
                 <h4><?= $producto['precio'] ?></h4>
                 <p class="text-justify">description</p>

                  <form action="" method="post">
                    <input type="hidden" name="id"  value="<?= openssl_encrypt($producto['id'], CODE, KEY)  ?>">
                    <input type="hidden" name="name"  value="<?= openssl_encrypt($producto['name'], CODE, KEY)  ?>">
                    <input type="hidden" name="precio"  value="<?= openssl_encrypt($producto['precio'], CODE, KEY)  ?>">
                    <input type="hidden" name="cantidad"  value="<?= openssl_encrypt(1, CODE, KEY)  ?>">
                    <button type="submit" name="btn" value="agregar" class="btn btn-primary">agregar carrito</button>
                  </form>
                </div>
            </div>
        </div>
      <?php endforeach ?> 
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
   
   <script>
     $(function () {
        $('.card-img-top').popover()
       })
   </script>
<?php include_once('templates/footer.php') ?>