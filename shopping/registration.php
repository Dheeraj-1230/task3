<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    if(strlen($password)>=8){
    $name=mysqli_real_escape_string($connection,$name);
    $username=mysqli_real_escape_string($connection,$username);
    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);
   $query =  "INSERT INTO spider(name,username, email, password,role) ";
   $query .="VALUES('{$name}','{$username}','{$email}','{$password}','{$role}')";
    $create_post_query=mysqli_query($connection,$query);
    }
    else
    {
        echo "<script>alert('password should be minimum 8 character length')</script>";
    }
}
?>    
    <?php  include "includes/navigation.php"; ?>  
 <a href="index.php"><h3>BACK</h3></a>
    <div class="container">
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                    <div class="form-group">
                            <label for="username" class="sr-only">name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Desired Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <label for="psw" class="sr-only">Password</label>
                              <input type="password" id="key" class="form-control" placeholder="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                        <select name="role">
                        <option>Buyer</option>
                        <option>Seller</option>
                        </select>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>                 
                </div>
            </div> 
        </div> 
    </div> 
</section>
<?php include "includes/footer.php";?>