
<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Organizer</th>
                                <th>Date</th>
                                <th>View</th>
                                <!-- <th>Add</th> -->

                                <!-- <th>Event URL</th> -->

                            </tr>
                        </thead>
                       
                    <?php
                    $user=$_SESSION['username'];
                    $query="SELECT * FROM items;";
                    $select_posts=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_posts))
                    {
                        $id=escape($row['id']);
                        $username=escape($row['username']);
                        $name=escape($row['name']);
                        $discription=escape($row['discription']);
                        $price=escape($row['price']);
                        $quantity=escape($row['quantity']);
                        $image=escape($row['image']);
                        // $event_link=$row['event_URL'];
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$name</td>";
                        echo "<td>$username</td>";
                        echo "<td>$price</td>";
                        echo "<td><img width='100' height='60' class='img-responsive'  src='../images/$image' alt='image'></td>";
                        echo "<td>$discription</td>";
                        echo "<td>$quantity</td>";
                        echo "<td><a href='../post.php?e_id={$id}'>View Item</a></td>";
                        // echo "<td><form action='' name='form1' method='post'>Quantity:<input type='text' size='3' name='quantity' value='1'><br><br>&nbsp;&nbsp;&nbsp;<button type='submit' name='submit1'>Add to Cart</button></form></td>";
                        // echo "<td>$event_link</td>";
                        echo "</tr>";
                        
                    }




                    ?>
                    </table>
                    


