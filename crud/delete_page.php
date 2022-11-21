<?php
include "conn.php";
if(isset($_GET['id'])){
    $did=$_GET['id'];
    $query="delete from students where id='$did'";
    $result=mysqli_query($connection,$query);
    if($result){
            header('location:index.php?delete_msg=You have successfully delete the data.');    
        }
        else{
            echo "query failed.."; 
        }
}
    

   

?>
