<?php
$Username = $password = "";
$UsernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["Username"])) {
        $UsernameErr = "Username is Required";
    } else {
        $Username = $_POST["Username"];
    }
    if (empty($_POST["password"])) {
        $passwordErr = "Password is Required";
    } else {
        $password = $_POST["password"];
    }
                                                                            /* comment */                           //npm run hotdog
    if ($Username && $password) {
        include("Connection.php");
        $check_Username = mysqli_query($Connections, "SELECT * FROM login_tbl WHERE Username = '$Username'");
        $check_Username_row = mysqli_num_rows($check_Username);

        if ($check_Username_row > 0) {
            session_start();
            $_SESSION['Username']=$_POST['Username'];
            $row = mysqli_fetch_assoc($check_Username);
            $db_password = $row["password"];
            $db_account_type = $row["account_type"];
            if ($db_password == $password) {
                if ($db_account_type ==  "1") {
                    echo "<script>window.location.href = 'admin.php'; </script>";
                } else {
                    echo "<script>window.location.href = 'user.php'; </script>";
                }
            } else {
                $passwordErr = "Password is incorrect";
            }
        } else {
            $UsernameErr = "Email is not Registered";
        }
    } 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="LOGIN.css">
        <title>Login</title>
       
        <!--- comment -->
    </head>
    <body style="background-image:url(s.gif); background-size:cover;">
        <form method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            

            <div class="hh">
                <div class="form" style="top:20%;">
                    <form action="login.php" method="post">
                        <input type="Username" name="Username" placeholder="Enter Username" value=<?php echo $Username?>>
                        <span class="error" style="color:red; font-family:arial;"><?php echo $UsernameErr; ?></span>
                        <input type="password" name="password" placeholder="Enter Password">
                        <span class="error" style="color:red;font-family:arial;"><?php echo $passwordErr; ?></span>
                        <button class="btnn" name="login">Login</button>

                        <p class="link">Don't have an Account?<br></p>
                        <button type="submit" class="btn">
                            <a href="reg.php">Register</a>
                        </button>
                    </div>
                </div>

            </body>
        </html>