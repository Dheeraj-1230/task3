<?php include "includes/header.php"; ?>
    <div id="wrapper">
        <?php include "includes/navigation.php"; ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                         Spider Project
                        </h1>
                    </div>
                </div>
<div class="row">
    
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
$query="SELECT *FROM items WHERE username='$user' ";
$select_all_posts=mysqli_query($connection,$query);
$post_count=mysqli_num_rows($select_all_posts);
echo " <div class='huge'>{$post_count}</div>";
?>
                        <div>Items in Cart</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
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
$query="SELECT *FROM purchased WHERE purby='$user' ";
$select_all_posts=mysqli_query($connection,$query);
$post_count=mysqli_num_rows($select_all_posts);
echo " <div class='huge'>{$post_count}</div>";
?>
                        <div>Items purchased</div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
            </div>
        </div>
<?php include "includes/footer.php"; ?>