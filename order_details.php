
<?php


/*

not paid
shipped
delivered

*/
include("server/connection.php");
include("layouts/header.php");

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

  $order_id = $_POST['order_id'];
  $order_status = $_POST['order_status'];

  $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");

  $stmt->bind_param('i', $order_id);

  $stmt->execute();

  $order_details = $stmt->get_result();

  $order_total_price = calculateTotalOrderPrice($order_details);

}else{
    header('location: account.php');
    exit;
}



function calculateTotalOrderPrice($order_details){

  $total = 0;
  foreach($order_details as $row){

    $product_price = $row['product_price'];
    $product_quantity = $row['product_quantity'];

    $total = $total * ($product_price * $product_quantity);
  }

 return $total;
}
?>


<?php  ?>



 <!--Order details-->
 <section class="orders container my-5 py-3" id="orders">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5 mx-auto">
        <tr>
            <th>Product</th>
            <th> Price</th>
            <th>Quantity</th>
           
        </tr>
        
      <?php foreach($order_details as $row){ ?>
         <tr>
            <td>
              <div class="product-info"> 
                 <img src="assets/imgs/<?php echo $row['product_image']; ?>.jpg" alt=""> 
                 <div>
                    <p class="mt-3"><?php echo $row['product_name']; ?></p>
                </div>
               </div>

             
            </td>
              <td>
                <span>$<?php echo $row['product_price']; ?></span>
              </td>
              <td>
                <span><?php echo $row['product_quantity']; ?></span>
              </td>

            </tr> 
      
        <?php } ?>


    </table>

    <?php 
    
    if($order_status == "not paid"){  ?>

        <form action="payment.php" style="float:right;" method="POST">
        <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>">
        <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
          <button type="submt" value="Pay Now" class="btn btn-primary" name="order_pay_btn">Pay Now</button>
        </form>

<?php } ?>
  </section>




 <!--BoostTrap js file-->
 <script src="assets/js/bootstrap.min.js"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

  <?php include("layouts/footer.php"); ?>
</body>
</html>