<?php include "includes/header.php"; ?>
    <div id="wrapper">
        <?php include "includes/navigation.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Shopping Website
                        </h1>
                    </div>
                </div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$user=$_SESSION['username'];
$query="SELECT *FROM items WHERE username='$user' ";
$select_all_posts=mysqli_query($connection,$query);
$post_count=mysqli_num_rows($select_all_posts);
echo " <div class='huge'>{$post_count}</div>";
?>  
                        <div>Items<br> Added</div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$user=$_SESSION['username'];
$query="SELECT *FROM purchased WHERE username='$user' AND date>=CURDATE()-30 ";
$select_all_posts=mysqli_query($connection,$query);
$post_count=mysqli_num_rows($select_all_posts);
echo " <div class='huge'>{$post_count}</div>";
?>
                        <div>Recent Purchases<br>in One month</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
     <!--
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$user=$_SESSION['username'];
$query="SELECT *FROM invitation WHERE send_to='$user' && details='Accepted' ";
$select_all_posts=mysqli_query($connection,$query);
$post_count=mysqli_num_rows($select_all_posts);
echo " <div class='huge'>{$post_count}</div>";
?>
                        <div>Invitation Accepted</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
<?php
$query="SELECT *FROM categories";
$select_all_categories=mysqli_query($connection,$query);
$post_categories=mysqli_num_rows($select_all_categories);
echo " <div class='huge'>{$post_categories}</div>";
?>
                      <div>Categories</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
            </div>
        </div>
<?php include "includes/footer.php"; ?>