<?php 
session_start();
$page = "Register Page";
include 'assets/include/header.php';

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username = '$username' or email = '$email'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (!empty($_POST)) {
    if (!empty($_POST['username']) && $username === $row['username']) {
        $alert = "Username already taken!";
    }
    elseif (!empty($_POST['email']) && $email === $row['email']) {
        $alert = "Email already taken!";
    }
    elseif (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO `users` (`ID`, `username`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')";
        $result = $conn->query($sql);
        $alert = "You are registred!";
        $_SESSION['username'] = $username;
        header('Location: index.php');
    }
    else {
        $alert = "Enter Info!";
    }
}
?>


  <body>
      <div class="container">
        <div class="login-form">
            <div class="login-info">
                <img src="assets/img/avatar.png" alt="">
                <small>Hello Guest!</small>
                <small>Create Account</small>
                <strong><?php if (isset($alert)) { echo $alert; } ?></strong>
            </div>
            <form action="register.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter you UserName">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter you Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control password" id="exampleInputPassword1" placeholder="Enter your Password">
                </div>
                <div class="align-self-center text-center">
                    <button type="submit" class="btn btn-custom">Register</button>
                    <p>You have account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>