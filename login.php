<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once("db-connect.php");
    extract($_POST);
    $sql = "SELECT * FROM `users` where `email` = '{$email}'";
    $get = $conn->query($sql);
    if($get->num_rows > 0){
        $data = $get->fetch_assoc();
        $is_verify = password_verify($password, $data['password']);
        if($is_verify){
            echo "<script> alert('Welcome {$data['name']}!'); location.replace('index.php');</script>";
        }else{
            echo "<script> alert('Login Failed!.');</script>";
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Password Hashing</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>

</head>
<body>
    <script>
        start_loader()
    </script>
    <main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient">
            <div class="container">
                <a class="navbar-brand" href="./">PHP - Password Hashing</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" href="./">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="register.php">Registration</a>
                        </li>
                    </ul>
                </div>
                <a href="https://sourcecodester.com" class="text-light fw-bolder h6 text-decoration-none" target="_blank">SourceCodester</a>
                
            </div>
        </nav>
        <div id="main-wrapper">
            <div class="container-md px-5 my-3">
                <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 mx-auto">
                    <div class="card rounded-0 shadow">
                        <div class="card-header rounded-0">
                            <div class="card-title"><b>Login</b></div>
                        </div>
                        <div class="card-body rounded-0">
                            <div class="container-fluid">
                                <form action="" id="register" method="POST">
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-light">Email</label>
                                        <input type="text" class="form-control rounded-0" name="email" id="email" value="<?= $_POST['email'] ?? "" ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-light">Password</label>
                                        <input type="password" class="form-control rounded-0" name="password" id="password" value="" required>
                                    </div>
                                    <div class="mb-3 text-center">
                                        <div class="col-lg-4 col-md-6 col-sm-10 col-sm-12 mx-auto">
                                            <button class="btn btn-primary rounded-pill">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="shadow-top py-4 col-auto">
            <div class="">
                <div class="text-center">
                    All Rights Reserved &copy; <span id="dt-year"></span> | <span class="text-muted">PHP - Password Hashing</span>
                </div>
                <div class="text-center">
                    <a href="mailto:oretnom23@gmail.com" class="text-decoration-none text-body-secondary">oretnom23@gmail.com</a>
                </div>
            </div>
        </footer>
    </main>
</body>
</html>