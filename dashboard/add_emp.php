<?php 
// 1. DATABASE & SESSION INITIALIZATION
include "header.php"; 
// Note: Ensure session_start(); and your $con connection variable are inside header.php

// 2. PROCESSING LOGIC (Must be before any HTML output)
if(isset($_POST['add_emp'])){
    $fullname = mysqli_real_escape_string($con, $_POST['user_name']);
    $des      = mysqli_real_escape_string($con, $_POST['user_des']);
    $res      = mysqli_real_escape_string($con, $_POST['user_res']);
    $scale    = mysqli_real_escape_string($con, $_POST['user_scale']);
    $user_id  = mysqli_real_escape_string($con, $_POST['user_id']);
    $pass_raw = $_POST['user_pass'];
    $pass     = mysqli_real_escape_string($con, sha1($pass_raw));
    $role     = mysqli_real_escape_string($con, $_POST['user_role']);
  
    // Validation
    if(strlen($pass_raw) < 4){
        $_SESSION['error'] = "Password must have minimum 4 characters";
        header("location: add_emp.php");
        exit();
    } else {
        // Check if User ID exists
        $check_sql = "SELECT * FROM user_tbl WHERE user_id='$user_id'";
        $check_query = mysqli_query($con, $check_sql);
        
        if(mysqli_num_rows($check_query) > 0){
            $_SESSION['error'] = "User Id already exists.";
            header("location: add_emp.php");
            exit();
        } else {
            // Insert Data
            $sql = "INSERT INTO user_tbl (fullname, user_des, user_scale, user_res, user_id, user_pass, user_role) 
                    VALUES ('$fullname', '$des', '$scale', '$res', '$user_id', '$pass', '$role')";
            
            if(mysqli_query($con, $sql)){
                $_SESSION['success'] = "Data Inserted Successfully.";
                header("location: add_emp.php");
                exit();
            } else {
                // If the query fails, it will show the exact database error
                $_SESSION['error'] = "Database Error: " . mysqli_error($con);
                header("location: add_emp.php");
                exit();
            }
        }
    }
}
?>

<div class="container mt-2">
  <form action="add_emp.php" method="POST">
    <div class="row m-2 p-3 register_form border border-secondary">

      <h5 class="text-center mb-4">Employee Registration Form</h5>

      <div class="col-md-10 m-auto">
        <?php if(isset($_SESSION['error'])): ?>
          <div class="alert alert-danger text-center">
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
          </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['success'])): ?>
          <div class="alert alert-success text-center">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="col-md-5 m-auto">
        <div class="mb-2">
          <label>Fullname</label>
          <input type="text" name="user_name" placeholder="Fullname" class="form-control" required maxlength="30" minlength="3">
        </div>
        <div class="mb-2">
          <label>Designation</label>
          <input type="text" name="user_des" placeholder="Designation" class="form-control" required maxlength="30" minlength="3">
        </div>
        <div class="mb-2">
          <label>Responsibilities</label>
          <textarea class="form-control" rows="6" name="user_res" maxlength="300" minlength="10"></textarea>
        </div>
      </div>

      <div class="col-md-5 m-auto">
        <div class="mb-2">
          <label>Scale</label>
          <select class="form-control" name="user_scale" required>
            <option value="">Select Scale</option>
            <option value="BPS-09">BPS-09</option>
            <option value="BPS-10">BPS-10</option>
            <option value="BPS-11">BPS-11</option>
            <option value="BPS-12">BPS-12</option>
            <option value="BPS-13">BPS-13</option>
            <option value="BPS-14">BPS-14</option>
            <option value="BPS-15">BPS-15</option>
            <option value="BPS-16">BPS-16</option>
            <option value="BPS-17">BPS-17</option>
            <option value="BPS-18">BPS-18</option>
            <option value="BPS-19">BPS-19</option>
            <option value="BPS-20">BPS-20</option>
          </select>
        </div>
        <div class="mb-2">
          <label>User ID</label>
          <input type="text" name="user_id" class="form-control" required maxlength="30" minlength="4">
        </div>
        <div class="mb-2">
          <label>Password</label>
          <input type="password" name="user_pass" class="form-control" required maxlength="100" minlength="4">
        </div>
        <div class="mb-2">
          <label>User Role</label>
          <select required name="user_role" class="form-control">
            <option value="">Select Role</option>
            <option value="1">Normal User</option>
            <option value="0">Admin</option>
          </select>
        </div>
        <div class="mb-2 pt-2">
          <button type="submit" class="btn btn-primary" name="add_emp">Register</button>
          <a href="users_list.php" class="btn btn-secondary">Back</a>
        </div>
      </div>

    </div>
  </form>
</div>

<?php include "footer.php"; ?>