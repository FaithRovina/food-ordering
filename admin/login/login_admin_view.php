<?php
include('../../settings/constants.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form - FarmtoFork Kenya</title> 
  <link href="../../css/login.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
  <div class="container">
    <div class="wrapper">
      <div class="title"><span>Login Form</span></div>

      <form action="<?php echo SITEURL; ?>admin/actions/login_admin_action.php" method="POST" onsubmit="return validateForm()">
        <div class="row">
          <i class="fas fa-user"></i>
          <input type="text" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="row">
          <i class="fas fa-lock"></i>
          <input type="password" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="row">
          <input type="submit" value="Login">
        </div>
      </form>
    </div>
  </div>

  <script>
    function validateForm() {
      var username = document.getElementById('username').value.trim();
      var password = document.getElementById('password').value.trim();

      if (username === '' || password === '') {
        alert('Please enter username and password.');
        return false;
      }
    
      return true; 
    }
  </script>
</body>
</html>
