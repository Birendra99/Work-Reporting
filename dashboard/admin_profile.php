<?php include "header.php"?>
<div class="container mt-5 mb-2">
  <div class="row m-2">
    <div class="col-md-7 m-auto emp_profile p-4 border border-secondary">
      <p class="text-center bg-white p-3"> <span class="emp_name">Employee Name</span>
        <br> <span>(Designation</span> <span>Scale BPS-17)</span> </p>
      <div class="bg-white p-3">
        <form action="" method="POST">
          <label><strong>Daily Work</strong></label>
          <input type="date" name="work_date" class="form-control" required>
          <button name="report_btn" class="btn btn-primary mt-2">Report Generate</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php" ?>