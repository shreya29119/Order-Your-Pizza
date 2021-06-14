
<?php
    include('userInformation.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

  <?php include('header.php'); ?>

  <section class="container grey-text">
    <h4 class="center">Add a pizza</h4>
    <form class="white" action="userInformation.php" method="post">
      <label >Your Email:</label>
      <input type="text" name="email" value="">
      <label >Pizza Title:</label>
      <input type="text" name="title" value="">
      <label >Ingredients (comma sreparated):</label>
      <input type="text" name="ingredients" value="">
      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
    </form>
  </section>

  <?php include('footer.php'); ?>


</html>
