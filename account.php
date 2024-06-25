<?php

  session_start();
  include("server/connection.php");

  if(!isset($_SESSION['logged_in'])){
    header('location: login.php');
    exit;
  }

  if(isset($_GET['logout'])){
    if(isset($_SESSION['logged_in'])){
      unset($_SESSION['logged_in']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      header("location: login.php");
      exit;
    } 
  }


  if(isset($_POST['change_password'])){

    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $user_email = $_SESSION['user_email'];

    //if password dont match
    if($password !== $confirmpassword){
      header('location: account.php?error=Passwords Does not Match');
    

    //if password is less than 6 character
    }else
     if(strlen($password) < 6){
      header('location: account.php?error=Password must be at least 6 characters');
    
      //no errors
     }else{

      $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
      $stmt->bind_param('ss',md5($password),$user_email);

     if( $stmt->execute()){
      header('location: account.php?message=Password has been updated successfully');
     }else{
      header('location: account.php?error=Could not update password');
     }
     }
  }


  //get orders
  if(isset($_SESSION['logged_in'])){

    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();

    $orders = $stmt->get_result(); // an array

  }
?>


<?php include("layouts/header.php"); ?>


  <!--Account-->
  <section class="my-5 py-5">
  <div class="row container mx-auto">
    <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
    <p class="text-center" style="color:green"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success']; }?></p>
    <p class="text-center" style="color:green"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; }?></p>
        <h3 class="font-weight-bold">Account info</h3>
        <hr class="mx-auto">
        <div class="account-info">
            <p>Name: <span><?php if($_SESSION['user_name']){ echo $_SESSION['user_name'];} ?></span></p>
            <p>Email: <span><?php if($_SESSION['user_email']){ echo $_SESSION['user_email'];} ?></span></p>
            <p><a href="#orders" id="order-btn">Your Orders</a></p>
            <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
        </div>
    </div>

    <div class="col-lg-6 col-md-12 col-sm-12">
        <form action="account.php" id="account-form" method="POST">
          <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
          <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
            <h3>Change Password</h3>
            <hr class="mx-auto">
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" id="account-password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" id="account-password-confirm" placeholder="Confirm Password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Change Password" class="btn" id="change-pass-btn" name="change_password">
            </div>
        </form>
    </div>
  </div>
  </section>


  <!--Orders-->
  <section class="orders container my-5 py-3" id="orders">
    <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Order Id</th>
            <th>Order Cost</th>
            <th>Order Stetus</th>
            <th>Order Date</th>
            <th>Order Detail</th>
        </tr>
        
        <?php while($row = $orders->fetch_assoc()){ ?>
         <tr>
            <td>
               <!-- <div class="product-info"> -->
                <!-- <img src="assets/imgs/laptop2.jpg" alt=""> -->
                <!-- <div>
                    <p class="mt-3"><?php echo $row['order_id'] ?></p>
                </div>
               </div> -->

               <span><?php echo $row['order_id'] ?></span>
            </td>
              <td>
                <span><?php echo $row['order_cost'] ?></span>
              </td>
              <td>
                <span><?php echo $row['order_status'] ?></span>
              </td>
            <td>
                <span><?php echo $row['order_date'] ?></span>
            </td>

            <td>
               <form action="order_details.php" method="POST">
                <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status">
                <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id">
                <input type="submit" class="btn order-details-btn" value="Details" name="order_details_btn">
               </form>
            </td>

            </tr> 
      
            <?php } ?>
    </table>
  </section>

<?php include("layouts/footer.php"); ?>
 <!--BoostTrap js file-->
 <script src="assets/js/bootstrap.min.js"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>