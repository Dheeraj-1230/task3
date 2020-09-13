
<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Item Name</th>
                                <th>Username</th>
                                <th>Discription</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>View</th>
                                <th>Update</th>

                                <!-- <th>Event URL</th> -->

                            </tr>
                        </thead>
                       
                    <?php
                    $user=$_SESSION['username'];
                    $query="SELECT * FROM items WHERE username='$user' ";
                    $select_posts=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_posts))
                    {
                        $id=escape($row['id']);
                        $username=escape($row['username']);
                        $name=escape($row['name']);
                        $discription=escape($row['discription']);
                        $quantity=escape($row['quantity']);
                        $price=escape($row['price']);
                        $image=escape($row['image']);
                        // $event_link=$row['event_URL'];
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$name</td>";
                        echo "<td>$username</td>";
                        echo "<td>$discription</td>";
                        echo "<td><img width='100' height='60' class='img-responsive'  src='../images/$image' alt='image'></td>";
                        echo "<td>$price</td>";
                        echo "<td>$quantity</td>";
                        echo "<td><a href='../post.php?e_id={$id}'>View Item</a></td>";
                        echo "<td><a href='../editpost.php?e_id={$id}&nm={$name}&ds={$discription}&qn={$quantity}&pr={$price}&img={$image}'>Update Item</a></td>";
                        // echo "<td>$event_link</td>";
                        echo "</tr>";
                        
                    }




                    ?>
                    </table>
                    




