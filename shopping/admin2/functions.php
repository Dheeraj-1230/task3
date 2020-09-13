<?php  
function escape($string)
{
    global $connection;
   return mysqli_real_escape_string($connection,trim($string));
}
function confirm($result)
{
    global $connection;
    if(!$result)
    {
        die("QUERY FAILED  ." .mysqli_error($connection));
    }
    return $result;
}
function insert_categories()
{
    global $connection;
    if(isset($_POST['submit']))
    {
        $cat_title=escape($_POST['cat_title']);
        if($cat_title == "" || empty($cat_title))
        {
            echo "Event field should not be empty";
        }
        else
        {
            $query = "INSERT INTO categories(cat_title) ";
            $query .="VALUE('{$cat_title}') ";
            $create_category_query=mysqli_query($connection,$query);

            if(!$create_category_query)
            {
                die("failed" .mysqli_error($connection));
            }
        }
    }

}
?>









?>