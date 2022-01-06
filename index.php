<!--PHP-->

<?php
include ("connect.php");

$conn = new connection();

//echo $conn->connect();
$success_message = '';
if (isset($_POST["submit"]))
{
    $insert_data = array(
        'adminname' => mysqli_real_escape_string($conn->mysqlConnect, $_POST['adminname']),
        'password' => mysqli_real_escape_string($conn->mysqlConnect, $_POST['password'])
    );
    if (!empty($insert_data['adminname']) && !empty($insert_data['password']))
    {
        if ($conn->insert('adminlogin', $insert_data))
        {
            $adminName = $_POST['adminname'];
            $success_message = "Admin with name $adminName inserted";
        }
    }

    echo $success_message;
}
?>

<!--HTML-->

<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login.css">
    <title>Admin Login</title>
</head>

<body>
    <form method="post">
        <div class="login-box">
            <h1>Login</h1>
  
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username"
                         name="adminname" value="">
            </div>
  
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password"
                         name="password" value="">
            </div>
  
            <input class="button" type="submit"
                     name="submit" value="Sign In">
        </div>
    </form>
</body>
  
</html>
