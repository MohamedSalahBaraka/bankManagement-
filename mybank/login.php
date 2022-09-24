<?php include "../includes/init.php"; ?>
<?php
if ($session->is_signed()) {
    redirect("../index.php");
}
if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    ////method to check database employee
    $employee_found = Employee::verify($email, $password);
    if ($employee_found) {
        $session->login($employee_found);
        redirect("../index.php");
    } else {
        $message = "Your email or password is incorrect. Please try again.";
    }
} else {
    $message = "";
    $email = "";
    $password = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/css/register.css">
    <title>مصرفي | دخول</title>
</head>
<body>
    <div class="header-lang">
    
    </div>
    <header class="heder">
        
    </header>
    

    <div class="section">
        <div class="container">
            
        <form class="login-form" action="" method="POST">
            <input id="loginUsername" type="email" name="email" placeholder="البريد الإلكتروني">
            <input id="loginPassword" type="password" name="password" placeholder="كلمة المرور ..">
            <input id="loginBtn" class="btn-form" type="submit" value="دخول" name="submit">
        </form>
    </div>
    </div>
</body>
</html>