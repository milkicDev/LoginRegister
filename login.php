<?php
session_start();
$page = "Login Page";
include 'assets/include/header.php';

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        if ($password === $row['password']) {
            $_SESSION['username'] = $row['username'];
            header('Location: index.php');
        }
        else {
            $alert = "Wrong username or password.";
        }
    }
}


?>

  <body>
      <div class="container">
        <div class="login-form">
            <div class="login-info">
                <img src="assets/img/avatar.png" alt="">
                <small>Hello Guest!</small>
                <small>How are you today?</small>
                <strong><?php if (isset($alert)) { echo $alert; } ?></strong>
            </div>
            <form action="login.php" method="post">
                <div class="form-group">
                    <input type="text" name="username" class="form-control username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter you UserName">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control password" id="exampleInputPassword1" placeholder="Enter your Password">
                </div>
                <div class="form-group form-check text-center">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div class="align-self-center text-center">
                    <button type="submit" class="btn btn-custom">Login</button>
                    <p>You don't have account? <a href="register.php">Create Account</a></p>
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
