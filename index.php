<?php 
session_start();
$page = "Home Page";
include 'assets/include/header.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<body>
    <div class="container padding-top text-center">
    <?php
        $sql = "SELECT * FROM users WHERE username = '". $_SESSION['username'] ."'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    ?>

        <h1>Hello <?php echo $row['username']; ?></h1>
        <h3>Your E-Mail Address <?php echo $row['email']; ?></h3>
        <small>Da se odjaviš <a href="logout.php">Odjava</a></small>
    </div>


    <?php include 'assets/include/footer.php'; ?>    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>