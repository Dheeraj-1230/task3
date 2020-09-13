<?php include "includes/header.php"; ?>

<div id="wrapper">
<?php include "includes/navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <h1 class="page-header">
                     Welcome to the Admin
                    </h1>
<?php
if(isset($_GET['source']))
  {
      $name=escape($_GET['source']);
  }
  else
  {
      $name='';
  }
  switch($name)
  {
      case 'add_post';
         include "includes/add_post.php";
      break;
      case 'view_invitations';
         include "includes/view_invitations.php";
      break;
      default:
      include "includes/view_all_posts.php";
    break;
  }
?>
                </div>
            </div>
        </div>
    </div>
<?php include "includes/footer.php"; ?>