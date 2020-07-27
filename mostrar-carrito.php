<?php
    include_once('templates/header.php') ;
    include_once('global/conexion.php');
    include_once('carrito.php');
 ?>

<div class="container mt-5">
  <h3>Lista de carrito</h3>
  <?php if(!empty($_SESSION['carrito'])){ ?>
  <table class="table table-bordered">
     <thead>
        <tr>
          <td width="40%">description</td>
          <td width="15%">cantidad</td>
          <td width="20%">precio</td>
          <td width="20%">total</td>
          <td width="20%">--</td>
        </tr>
     </thead>
     <tbody>
     <?php foreach($_SESSION['carrito'] as $productos) { ?>
     
          <tr>
             <td><?= $productos['name']; ?> </td>
             <td  class="text-center"><?= $productos['cantidad']; ?></td>
             <td  class="text-center"><?= $productos['precio'] ; ?></td>
             <td  class="text-center">$ 300</td>
             <td><button class="btn btn-danger">eliminar</button></td>
         </tr>
      <?php } ?>
      
       <tr>
       <td colspan="3" align="right"> 
          <h3>total</h3>   
       </td>
       <td align="right">
         <h3> <?= number_format(300,2)  ?></h3>
       </td>
       <td></td>
       </tr>
     </tbody>
  </table>
  <?php } else {  ?>
   <div class="alert alert-success">
      no hay productos aun en el carrito
   </div>
  <?php }   ?>
</div>



<?php include_once('templates/footer.php') ;?>
