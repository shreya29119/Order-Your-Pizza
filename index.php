
<?php

    include('config/db_connect.php');

    //write query for all pizzas
   $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

   // make queries & get result
    $result = mysqli_query($conn, $sql);

   //fetch resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    //explode(',',$pizzas[0]['ingredients'])


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include('header.php'); ?>

  <h4 class = 'center grey-text'>Pizzas!</h4>

   <div class="container">
     <div class="row">
       <?php foreach($pizzas as $pizza) {?>
         <div class="col s6 md3">
           <div class="card z-depth-0">
             <img src="pizza.png" class="pizza">
             <div class="card-content center">
               <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
               <ul>
                 <?php foreach(explode(',',$pizza['ingredients']) as $ing){ ?>
                 <li><?php echo htmlspecialchars($ing); ?></li>
               <?php } ?>
               </ul>
               <div class="card-action right-align">
                 <a class="brand-text" href="details.php?id=<?php echo $pizza['id'];?>">more info</a>
               </div>
             </div>
           </div>
         </div>
       <?php } ?>

        <?php if(count($pizzas) >= 3): ?>
        <p>there are 3 or more pizzas</p>
      <?php else: ?>
        <p>there are less than 3 pizzas</p>
      <?php endif; ?>

     </div>
   </div>

  <?php include('footer.php'); ?>
</html>
