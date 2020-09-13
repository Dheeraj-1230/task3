<?php
if(isset($_POST['submit']))
{
    $name=escape($_POST['name']);
    $username=$_SESSION['username'];
    $discription=escape($_POST['discription']);
    $image=$_FILES['image']['name'];
    $image_temp=$_FILES['image']['tmp_name'];
    $price=escape($_POST['price']);
    $quantity=escape($_POST['quantity']);


    move_uploaded_file($image_temp, "../images/$image");
   $query =  "INSERT INTO items(name, username, discription, image, price, quantity) ";
   $query .="VALUES('{$name}','{$username}','{$discription}','{$image}','{$price}','{$quantity}')";
    $create_post_query=mysqli_query($connection,$query);
      confirm($create_post_query);
}
?>
<form action="" method="post" enctype="multipart/form-data" >
<div class="form-group">
<label for="title">Item Name</label>
<input type="text" class="form-control" name="name">
</div>
<div class="form-group">
<label for="title">Discription</label>
<input type="text" class="form-control" name="discription">
</div>
<div class="form-group">
<label for="image">Item Image</label>
<input type="file" name="image">
</div>
</div>
<div class="form-group">
<label for="price">Price</label>
<input type="text" name="price">
</div>
<div class="form-group">
<label for="quantity">Quantity</label>
<input type="text" name="quantity">
</div>
</div>
<div class="form-group">
<label for="title">Add Item</label>
<input type="submit" class="btn btn-primary" name="submit" value="Add">
</div>
</form>