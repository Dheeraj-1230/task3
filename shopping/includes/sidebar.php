<div class="col-md-4">
     <?php
     if(isset($_POST['submit']))
     {
         $search=escape($_POST['search']);
         $query="SELECT *FROM posts WHERE post_tags LIKE '%$search%' ";
        $search_query=mysqli_query($connection,$query);
        if(!$search_query)
        {
            die("failed" .mysqli_error($connection));
        }
     }
     ?>
                <div class="well">
                    <h4>Login</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        <input type="text"   name="username" placeholder="Enter Username" class="form-control">
                        </div>
                        <div class="input-group">
                        <input type="password" name="password" placeholder="Enter Password" class="form-control">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                    </span>
                    </form>
                </div>
                <br><br>
                    <h5>Don't Have Account?</h5><br>
                    <a href="registration.php">Register</a>          