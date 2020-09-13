<?php
 setcookie("item1"," ", time()+86400*30,'/');


?>


<?php include 'includes/db.php'; ?>
<?php 
include 'includes/header.php';
include 'includes/navigation.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <?php
if(isset($_GET['e_id']))
{
    $the_event_id=$_GET['e_id'];
}
                  $query="SELECT * FROM items WHERE id=$the_event_id ";
                  $select_all_posts_query=mysqli_query($connection,$query);
                  while($row=mysqli_fetch_assoc($select_all_posts_query)){
                    $name=$row['name'];
                    $discription=$row['discription'];
                    $price=$row['price'];
                    $image=$row['image'];
                   ?>
                <h2>
                   <div class="iname">Item Name:<?php echo $name?></div>
                </h2>
                <p class="lead">
               Description:<?php echo $discription?>
                </p>
    <?php     }?>

                <p class="price"><span class="glyphicon"></span>Price: Rs.<?php echo $price?></p>
                <hr>
                <img width="400" height="50" class="img-responsive" src="images/<?php echo $image;?>" alt="">
                <hr>
                <hr>
              
               
    </form>
                </div>
                <form action='' name='form1' method='post'><b>Quantity:</b><input type='text' size='3' name='quantity' value='1'><br><br>&nbsp;&nbsp;&nbsp;<button type='submit' name='submit1'>Add to Cart</button></form>


                <?php
 $id=$_GET['e_id'];
    if(isset($_POST['submit1']))
    {
        $qty=$_POST['quantity'];
        
      $d=0;
      if(is_array($_COOKIE['item1']))
      {
          foreach($_COOKIE['item1'] as $name1 => $value)
          {
              $d=$d+1;
          }
          $d=$d+1;
      }
      else{
          $d=$d+1;
      }

      $res=mysqli_query($connection,"SELECT * FROM items WHERE id=$id");
      while($row=mysqli_fetch_array($res))
      {
        $img1=$row['image'];
        $nm=$row['name'];
        $price=$row['price'];
        // $qty="1";
        $total=$price*$qty;
      }
      if(is_array($_COOKIE['item1']))
      {
          foreach($_COOKIE['item1'] as $name2 => $value)
          {
              $values11=explode("__",$value);
              $found=0;
              if($img1==$values11[0])
              {
                  $found++;
                  $qty=$values11[3]+$qty;

                  $tb_qty;
                  $res2=mysqli_query($connection, "SELECT * FROM items WHERE image='$img1'");
                  while($row=mysqli_fetch_array($res2))
                  {
                      $tb_qty=$row['quantity'];
                  }
                  if($tb_qty<$qty)
                  {
                     echo "this much quantity is not available";
                  }
                  else{

                  $total=$values11[2]*$qty;
                  setcookie("item1[$name2]",$id."__".$img1."__".$nm."__".$price."__".$qty."__".$total, time()+86400*30,'/');
                  }
              }
          }
          if($found==0)
          {
            $tb_qty;
            $res2=mysqli_query($connection, "SELECT * FROM items WHERE image='$img1'");
            while($row=mysqli_fetch_array($res2))
            {
                $tb_qty=$row['quantity'];
            }
            if($tb_qty<$qty)
            {
               echo "this much quantity is not available";
            }
            else{
            setcookie("item1[$d]",$id."__".$img1."__".$nm."__".$price."__".$qty."__".$total, time()+86400*30,'/');
            }
          }
      }
      else
      {
        $tb_qty;
        $res2=mysqli_query($connection, "SELECT * FROM items WHERE image='$img1'");
        while($row=mysqli_fetch_array($res2))
        {
            $tb_qty=$row['quantity'];
        }
        if($tb_qty<$qty)
        {
           echo "this much quantity is not available";
        }
        else{
        setcookie("item1[$d]",$id."__".$img1."__".$nm."__".$price."__".$qty."__".$total, time()+86400*30,'/');
        }
      }

      ?>
<script>
alert("Successfully added to Cart");
location.href="http://localhost/shopping/admin2/posts.php";
</script>

      <?php
    }

  
?>



                <style>
                div.iname
                {
                    position:absolute;
                    top:100px;
                    font-size:20px;
                    left:450px;
                    color:white;
                }
                p.lead
                {
                    position:absolute;
                    top:150px;
                    left:450px;
                    color:white;
                }
                p.price{
                    position:absolute;
                    top:190px;
                    left:450px;
                    color:white;
                }
                b{
                    color:white;
                }
                /* div.iname{
                    position:absolute;
                    top:200px;
                    left:400px;
                } */
                </style>