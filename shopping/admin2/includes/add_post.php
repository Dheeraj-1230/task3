
<table class="table table-bordered table-hover">
                      
                        <?php
                        $d=0;
                        if(is_array($_COOKIE['item1']))
                        {
                              $d++;
                        }
                        if($d==0)
                        echo "no items in cart";
                        else
                        {
                            ?>
                              <thead>
                            <tr>
                                <th>Name</th>
                                <!-- <th>Username</th> -->
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <!-- <th>Checkout</th> -->
                                <!-- <th>Discription</th> -->
                                <!-- <th>Date</th> -->
                                <!-- <th>View</th> -->
                                <!-- <th>Add</th> -->

                                <!-- <th>Event URL</th> -->

                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach($_COOKIE['item1'] as $name2 => $value)
                        {
                            $values11=explode("__",$value);
                            ?>
                            <tr>
                            <td><?php echo $values11[2]; ?></td>
                            <td><img width='100' height='60' class='img-responsive'  src=" ../images/<?php echo $values11[1]; ?>"></td>
                            <!-- <td>discription</td> -->
                            <td><?php echo $values11[3]; ?></td>
                            <td><?php echo $values11[4]; ?></td>
                            <td><?php echo $values11[5]; ?></td>
                            <!-- <td><input type="button" value="Checkout"></td> -->
                            </tr>

                            <?php
                        }


?>

                        </tbody>

                            <?php
                            
                        }
?>
                    </table>
                    

<?php    

$gtotal=0;
if(is_array($_COOKIE['item1']))
{
foreach($_COOKIE['item1'] as $name2 => $value)
{
    $values11=explode("__",$value);
    $gtotal+=$values11[5];
}
}
?>
<align="center">
<?php
echo "  Rs."."$gtotal  ";
?>
<form method="post" >
<input type="submit" value="Checkout" name="check">
</form>
</align>



<?php
// session_start();
if(isset($_POST['check']))
{
   
    
    if(is_array($_COOKIE['item1']))
    {
        $dd=1;
        // setcookie("item1[1]",'', time()-3600);
        foreach($_COOKIE['item1'] as $name1 => $value)
        {
            $values11=explode("__",$value);
            $res=mysqli_query($connection,"UPDATE items SET quantity=quantity-$values11[4] WHERE id=$values11[0]");
            // echo "<script>alert('item1[$name1]') </script>";
           
            // setcookie("item[$name]", "", time()-1);
            $res2=mysqli_query($connection, "SELECT * FROM items WHERE id='$values11[0]'");
            while($row=mysqli_fetch_array($res2))
            {
                 $name=$row['name'];
                 $imag=$row['image'];
                 $unm=$row['username'];
                 $price=$row['price'];
                //  $image=$row['image'];
            }
            // echo "$name";
            // echo "$unm";
            // echo "$imag";
            // echo "$price";
            $quantity=$values11[4];
            // echo "$quantity";
            // echo "$_SESSION[username]";
            $query =  "INSERT INTO purchased(name, username,image, price, quantity, purby,date)  ";
            $query .="VALUES('{$name}','{$unm}','{$imag}','{$price}','{$quantity}','$_SESSION[username]',CURDATE())";
             $create_post_query=mysqli_query($connection,$query);
             confirm($create_post_query);
                setcookie("item1[$name1]"," ", time()-86400*30,'/');
                ?>
                <script>
                alert("items Checked out");
                location.href="http://localhost/shopping/admin2/posts.php";
                </script>
                <?php
        }
        
    }
    else
    {
        echo "items are not available in your cart";
    }
}

// echo "<script>alert('Deleted') </script>";

?>
