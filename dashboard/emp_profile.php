  <?php include "header.php" ?>
<div class="container mt-2 mb-2">
  <div class="row">
    <div class="col-md-6 m-auto emp_profile p-4 border border-secondary">
      <p class="text-center bg-white p-3"> <span class="emp_name">Employee Name</span>
        <br> <span>(Designation</span> <span>Scale BPS-20)</span> </p>
      <div class="bg-white p-3"> <strong>Job Responsibilities</strong>
        <ul>
          <li>Write and Debug Code</li>
          <li>Design web pages</li>
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