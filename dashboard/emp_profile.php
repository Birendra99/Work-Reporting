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
          <label><strong>Daily Work</strong></label>
          <textarea required="required" class="form-control" rows="5" name="work_desc" maxlength="200" minlength="10"></textarea>
          <button name="work_btn" class="btn btn-primary mt-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include "footer.php"?>