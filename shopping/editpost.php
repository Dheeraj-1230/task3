<?php include 'includes/db.php'; ?>

<?php

$name=$_GET['nm'];
$discription=$_GET['ds'];
$quantity=$_GET['qn'];
$price=$_GET['pr'];
$image=$_GET['img'];
$id=$_GET['e_id'];

?>



<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    // $username=$_SESSION['username'];
    $discription=$_POST['discription'];
    $image=$_FILES['image']['name'];
    $image_temp=$_FILES['image']['tmp_name'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];


    move_uploaded_file($image_temp, "../images/$image");
   $query =  " UPDATE ITEMS SET name='$name', discription='$discription', image='$image', price='$price', quantity='$quantity' WHERE id='$id' " ;
//    $query .="VALUES('{$name}','{$username}','{$discription}','{$image}','{$price}','{$quantity}')";
    $create_post_query=mysqli_query($connection,$query);
    if($create_post_query)
    {
        echo "<script>alert('Record Updated') </script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/shopping/admin/posts.php">
    <?php
    }
    //   confirm($create_post_query);
}
?>
<form align="center" class="form-group" action="" method="post" enctype="multipart/form-data" >
<br><br>
<b>UPDATE ITEM INFORMATION</b>
<br><br><br>
<div class="form-group">
<label for="title">Item Name:</label>&nbsp;&nbsp;&nbsp;
<input type="text" class="form-control" name="name" value="<?php echo "$name" ?>">
</div><br>
<div class="form-group">
<label for="title">Discription:</label>&nbsp;&nbsp;&nbsp;
<input type="text" class="form-control" name="discription" value="<?php echo "$discription" ?>">
</div>
<br>
<div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="image">Item Image:</label>&nbsp;&nbsp;&nbsp;
<input type="file" name="image" value="<?php echo "$image" ?>">
</div>
</div>
<br>
<div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="price">Price: </label>&nbsp;&nbsp;&nbsp;
<input type="text" name="price" value="<?php echo "$price" ?>">
</div>
<br>
<div class="form-group">
<label for="quantity">Quantity</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" name="quantity" value="<?php echo "$quantity" ?>">
</div>
</div>
<br>
<div class="form-group">
<label for="title">Add Item</label>
<input type="submit" class="btn btn-primary" name="submit" value="Update">
</div>
</form>