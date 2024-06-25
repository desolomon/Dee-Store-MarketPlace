<?php

session_start();


if(!empty($_SESSION['cart'])){
  
  //let user in


  //send user to home page
}else{

  header('location: index.php');
}
?>

<?php include("layouts/header.php"); ?>
<!--Checkout-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Check Out</h2>
        <hr class="mx-auto">
    </div>
    <div class="mx-auto container">
        <form action="server/place_order.php" id="checkout-form" action="place_order.php" method="POST">
            <p class="text-center" style="color:red;">
                <?php if(isset($_GET['message'])){echo $_GET['message'];} ?>
            <?php if(isset($_GET['message'])){ ?>
                <a href="login.php" class="btn btn-primary">Login</a>
        <?php } ?>
            </p>
            <div class="form-group checkout-small-element" >
                <label for="">Name</label>
                <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
            </div>
            <div class="form-group checkout-small-element">
                <label for="">Email</label>
                <input type="email" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group checkout-small-element">
                <label for="">Phone</label>
                <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required>
            </div>
            <div class="form-group checkout-small-element">
                <label for="">City</label>
                <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
            </div>

            <div class="form-group checkout-large-element">
                <label for="">Address</label>
                <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
            </div>
            <div class="form-group checkout-btn-container">
               <p>Total amount: $<?php echo $_SESSION['total']; ?></p>
            </div>
            <div class="form-group checkout-btn-container">
                <input type="submit" class="btn" id="checkout-btn" value="Place Order" name="place_order">
            </div>
        </form>
    </div>
  </section>


    
    <!--BoostTrap js file-->
    <script src="assets/js/bootstrap.min.js"></script>
     <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
  
    <?php include("layouts/footer.php"); ?>
    </body>
    </html>