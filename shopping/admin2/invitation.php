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
         include "includes/add_people.php";
      break;
      case 'view_invitations';
           include "includes/view_invitations.php";
      break;
      case 'send_invitations';
           include "includes/send_invitations.php";
      default:
      include "includes/view_all_invitations.php";
    break;
  }
?>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>