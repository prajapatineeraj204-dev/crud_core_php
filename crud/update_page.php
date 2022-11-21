<?php include('header.php'); ?>
<?php include('conn.php');?>
<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
$query="select * from students where id = '$id'";
$result=mysqli_query($connection,$query);
if($result){
    $row=mysqli_fetch_assoc($result); 
}
else{
   die("query failed".mysqli_error($result));
}
if(isset($_POST['update_students'])){
    if(isset($_GET['id'])){
        $idnew=$_GET['id'];
    }
    $fname=$_POST['f_name'];
    $lname=$_POST['l_name'];
    $age=$_POST['age'];
    $query="update students set first_name='$fname', last_name='$lname', age='$age' where id='$idnew'";
    $result=mysqli_query($connection,$query);
        if($result){
            header('location:index.php?update_msg=You have successfully updated the data.');    
        }
        else{
            echo "query failed.."; 
        }
        }
?>

<form action="update_page.php?id=<?php echo $id;?>" method="post">
    <div class="container mt-5">
<div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="f_name" value="<?php echo $row['first_name'];?>" class="form-control">
            </div>
            <div class="form-group">              
                <label for="">Last Name</label>
                <input type="text" name="l_name" value="<?php echo $row['last_name'];?>" class="form-control">                
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="text" name="age" value="<?php echo $row['age'];?>" class="form-control">
            </div>
            <br>
            <input type="submit" name="update_students" value="Update" class="btn btn-success">
</div>
</form>


<?php include('footer.php');?>