<table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Item Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <!-- <th>Event URL</th> -->

                            </tr>
                        </thead>
                       
                    <?php
                    $user=$_SESSION['username'];
                    $query="SELECT * FROM purchased WHERE purby='$user'";
                    $select_posts=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_posts))
                    {
                        $event_id=escape($row['id']);
                        $event_name=escape($row['name']);
                        $event_image=escape($row['image']);
                        $event_price=escape($row['price']);
                        $event_quantity=escape($row['quantity']);
                        $event_date=escape($row['date']);
                        // $event_organizer=escape($row['event_organizer']);
                        // $event_category=escape($row['event_category']);
                        // $event_date=escape($row['event_date']);
                        // $event_link=$row['event_URL'];
                        echo "<tr>";
                        echo "<td>$event_id</td>";
                        echo "<td>$event_name</td>";
                        echo "<td><img width='100' height='60' class='img-responsive'  src='../images/$event_image' alt='image'></td>";
                        // echo "<td><a href='invitation.php?source=view_invitations&id={$event_id}&status=Accepted'>Accept</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='invitation.php?source=view_invitations&id={$event_id}&status=Decline'>Declined</a></td>";
                        echo "<td>$event_price</td>";
                        echo "<td>$event_quantity</td>";
                        echo "<td>$event_date</td>";
                       
                        // echo "<td>$event_link</td>";
                        echo "</tr>";
                        
                    }




                    ?>




<!-- // if(isset($_POST['accept']))
//   {
//     //   $name=escape($_GET['accept']);
//     //   $
//     $query="UPDATE invitation SET details='Accept' WHERE id='$en' ";
//     $select_posts=mysqli_query($connection,$query);
//   }
  
 -->






                    </table>
<?php

if(isset($_GET['id']))
{
    $the_event_id=$_GET['id'];
    $status=$_GET['status'];
    // echo $the_event_id;
$query="UPDATE invitation SET details='{$status}' WHERE id={$the_event_id} ";
$accept_query=mysqli_query($connection,$query);
$user=$_SESSION['username'];
$query="SELECT * FROM invitation WHERE send_to='$user' && details!='Accepted'";
$select_posts=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_posts))
{
    $event_id=escape($row['id']);
    $event_Send_from=escape($row['username']);
    $event_name=escape($row['event']);
    $event_details=escape($row['details']);
    // $event_organizer=escape($row['event_organizer']);
    // $event_category=escape($row['event_category']);
    // $event_date=escape($row['event_date']);
    // $event_link=$row['event_URL'];
    echo "<tr>";
    echo "<td>$event_id</td>";
    echo "<td>$event_Send_from</td>";
    echo "<td>$event_name</td>";
    echo "<td><a href='invitation.php?source=view_invitations&id={$event_id}&status=Accepted'>Accept</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='invitation.php?source=view_invitations&id={$event_id}&status=Decline'>Declined</a></td>";
    echo "<td>$event_details</td>";
    // echo "<td>$event_organizer</td>";
    // echo "<td>$event_date</td>";
   
    // echo "<td>$event_link</td>";
    echo "</tr>";
}
}

?>

