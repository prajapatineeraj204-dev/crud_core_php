<?php include('header.php'); ?>
  <?php include('conn.php');?>
<h4 style="color:red; text-align:center;"><?php
        if(isset($_GET['message'])){
            echo $_GET['message'];
        }
    ?></h4>
    <h4 style="color:green; text-align:center;"><?php
        if(isset($_GET['insert_msg'])){
            echo $_GET['insert_msg'];
        }
    ?></h4>
    <h4 style="color:green; text-align:center;"><?php
        if(isset($_GET['delete_msg'])){
            echo $_GET['delete_msg'];
        }
    ?></h4>
    <h4 style="color:green; text-align:center;"><?php
        if(isset($_GET['update_msg'])){
            echo $_GET['update_msg'];
        }
    ?></h4>
        <div class="row mt-3">
        
        <div class="col">
            <div class="row">
            <div class="col-10"><h1 class="text-danger">All Student List</h1></div>
            <div class="col-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  ADD STUDENTS
</button>
            </div>
</div>
            <hr>
        <table class="table table-bordered">
  <thead class="table-light text-center">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Updata</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
  <tbody>
      <?php 
      $query= "SELECT * FROM `students`";
      $result=mysqli_query($connection,$query);
      if($result){
          
          while($row=mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <th scope="row"><?php echo $row['id'];?></th>
                <td><?php echo $row['first_name'];?></td>
                <td><?php echo $row['last_name'];?></td>
                <td><?php echo $row['age'];?></td>
                <th><a href="update_page.php?id=<?php echo $row['id'];?>" class="btn btn-success">Update</a>
                <th><a href="delete_page.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                </th>
            </tr>
            <?php
          }
      }
      else{
          echo "not connection";
      }
      ?>  
  </tbody>
</table>
        </div>
        </div>
    </div>
    
    <form action="insert_data.php" method="post">

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="">First Name</label>
                <input type="text" name="f_name" class="form-control">
            </div>
            <div class="form-group">              
                <label for="">Last Name</label>
                <input type="text" name="l_name" class="form-control">                
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="text" name="age" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" name="add_students" value="Add" class="btn btn-success">
      </div>
    </div>
  </div>
</div>
    </form>
  <?php include('footer.php');?>