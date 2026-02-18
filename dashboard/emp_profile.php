  <?php include "header.php";
 
 if($role!=1){
 header("location:../404.php");
 exit();
 }

  if(isset($_SESSION['u_data'])){
    $user=$_SESSION['u_data'];
  }

  ?>
<div class="container mt-2 mb-2">
  <div class="row">
    <div class="col-md-6 m-auto emp_profile p-4 border border-secondary">
      <p class="text-center bg-white p-3"> <span class="emp_name"><?php echo $user['0']?></span>
        <br> <span>(<?= ucwords($user['1'])?></span> <span><?= ucwords($user['2'])?>)</span> </p>
      <div class="bg-white p-3"> <strong>Job Responsibilities</strong>
        <ul>
          <li> <?= ucwords($user['3'])?></li>
          
        </ul>
      </div>
      <br>
      <div class="bg-white p-3">
        <form method="POST">
          <?php

          if(isset($_SESSION['msg'])){
            $msg=$_SESSION['msg'];
            echo "<p>$msg</p>";
            unset($_SESSION['msg']);
          }


          ?>
          <label><strong>Daily Work</strong></label>
          <textarea required="required" class="form-control" rows="5" name="work_desc" maxlength="200" minlength="10"></textarea>
          <button name="work_btn" class="btn btn-primary mt-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include "footer.php";
 
 if(isset($_POST['work_btn'])){
  $id=$user['5'];
  $word_desc=mysqli_real_escape_string($con,$_POST['work_desc']);
  $date=date('Y-m-d',time());
  $check="SELECT * FROM work_tbl WHERE employee_id='$id' AND work_date='$date'";

  $query=mysqli_query($con,$check);
  $rows=mysqli_num_rows($query);
  if($rows){
    $_SESSION['msg']="<small class='text-danger'>You cannot submit work again in same date.</small>";
    header("location:emp_profile.php");
  }
  else{
    $insert="INSERT into work_tbl(employee_id, work_des,work_date) VALUES('$id','$word_desc','$date')";
    $query=mysqli_query($con,$insert);
    if($query){
      $_SESSION['msg']="<small class='text-success'>Work Submitted Successfully.</small>";
      header("location:emp_profile.php");
    }
    else{

    $_SESSION['msg']="<small>Please Try Again later</small>";
    header("location:emp_profile.php");

    }
  }

 }


?>