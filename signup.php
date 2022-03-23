<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container " >
    <h3 class="mt-4">Register now</h3>
    
    <form action="signup_db.php" method="post">

      <?php if (isset($_SESSION['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?php
          echo $_SESSION['error'];
          unset($_SESSION['error']);
          ?>
        </div>
      <?php } ?>
      <?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success" role="alert">
          <?php
          echo $_SESSION['success'];
          unset($_SESSION['success']);
          ?>
        </div>
      <?php } ?>
      <?php if (isset($_SESSION['warning'])) { ?>
        <div class="alert alert-warning" role="alert">
          <?php
          echo $_SESSION['warning'];
          unset($_SESSION['warning']);
          ?>
        </div>
      <?php } ?>


      <div class="form-group">
        <div class="col-sm-2 control-label">
        Status :
        </div>
        <div class="col-sm-3">
          <select name="m_level" class="form-control" required readonly>
                       
            <option value="member">User</option>
          </select>
        </div>
      </div>
      <div class="col-sm-3">
        <label for="m_user" class="form-label">Username</label>
        <input type="username" class="form-control" name="m_user" aria-describedby="username">
      </div>

      <div class="col-sm-3">
        <label for="m_pass" class="form-label">Password</label>
        <input type="password" class="form-control" name="m_pass">
      </div>
      <div class="col-sm-3">
        <label for="m_name" class="form-label">Firstname and Lastname</label>
        <input type="text" class="form-control" name="m_name" aria-describedby="firstname">
      </div>
      <div class="col-sm-3">
        <label for="m_email" class="form-label">E-mail</label>
        <input type="email" class="form-control" name="m_email" aria-describedby="email">
      </div>
      <div class="col-sm-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="m_tel" aria-describedby="Phone">
      </div>
      <div class="col-sm-3">
        <label  class="form-label">Address</label>
        <input type="text" class="form-control" name="m_address" aria-describedby="Address">
      </div>
      <div class="col-sm-3">
        <label  class="form-label">State</label>
        <input type="text" class="form-control" name="m_state" aria-describedby="state">
      </div>
      <div class="col-sm-3">
        <label  class="form-label">City</label>
        <input type="text" class="form-control" name="m_city" aria-describedby="city">
      </div>
      <div class="col-sm-3">
        <label  class="form-label">Zip</label>
        <input type="text" class="form-control" name="m_zip" aria-describedby="zip">
      </div>

      <br>

      <button type="submit" name="signup" class="btn btn-primary">Sign up</button>

    </form>
    <p>Already a member? Click here<a href="../shop/login.php"> Sign up</a></p>
  </div>
</body>

</html>