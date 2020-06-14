<?php
if(isset($_POST['login_submit']))
{
    include_once "../resources/conn.php";

    $email = $pwd = "";

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $usertype = $_POST['usertype'];



    $sql = " SELECT * FROM TrainBooking WHERE email ='$email' AND password = '$pwd' AND usertype='$usertype' ";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {

            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['usertype'] = $row['usertype'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['password'] = $row['password'];

        }
        if($usertype=='Admin')
        {
            header("location:../Admin/WelcomeAdmin.php");
        }
        else if($usertype=='Customer')
        {
            header("location:../Customer/WelcomeCustomer.php");
        }

    }
    else
    {
        $result =  "<p style='color:red;'>Invalid Email or password!</p>";
    }

}

?>


<!DOCTYPE html>

<html>
<head>
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="../Styling/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-top" style="opacity: 50%;">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="../Home/Home.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../Register/register.php" class="w3-bar-item w3-button">Register</a>
            <a href="../Login/login.php" class="w3-bar-item w3-button">Login</a>
            <a href="#" class="w3-bar-item w3-button">About</a>
        </div>
    </div>
</div>

<div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin-top: 150px; width: 430px; border-radius: 25px; margin-left: 540px;">
    <center>
        <?php
        if(isset($result)) echo $result;
        ?>
        <h1>Login</h1>
        <form action="#" method="POST" style="opacity: 80%;">
            <input style="width: 350px;" class="w3-link w3-round-xlarge" type="text" name="email" placeholder="Email" required><br><br>
            <input style="width: 350px;" class="w3-link w3-round-xlarge" type="password" name="pwd" placeholder="Password" required><br><br>
            <div class="radio_group">
                <label for="usertype">I'm a :</label>
                <input type="radio" name="usertype" value="Admin" required>&nbsp;Admin |
                <input type="radio" name="usertype" value="Customer" required>&nbsp;Customer
            </div>

            <button type="submit" style="width: 100px; border-radius: 25px; " class="w3-button w3-red w3-margin-top" name="login_submit" id="but">Login</button><br>
        </form>
        <br>
        <a href="../Register/register.php" style="color: white;">Don't have an account</a><br><br>

    </center>
</div>
</body>
<div style="margin-top: 100px;">
<?php
include '../resources/footer.php'
?>
</div>
</html>
