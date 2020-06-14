<?php
if(isset($_POST['c_pwd']))
{
    require_once "../resources/conn.php";

    session_start();

    $id = $_SESSION['id'];
    $old_pwd = $_SESSION['password'];
    $new_pwd = $_POST['new_pwd'];
    $new_pwd_re = $_POST['new_pwd_re'];
    $old = $_POST['old_pwd'];

    if($old != $old_pwd)
    {
        $result =  "<p style='color:red;'>The old password isn't correct!</p>";
    }
    else
    {
        if (strlen($_POST["new_pwd"]) <= '8')
        {
            $result = "<p style='color:red;'>Your Password Must Contain At Least 8 Characters!</p>";
        }
        elseif(!preg_match("#[0-9]+#",$new_pwd))
        {

            $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Number!</p>";
        }
        elseif(!preg_match("#[A-Z]+#",$new_pwd))
        {

            $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Capital Letter!</p>";
        }
        elseif(!preg_match("#[a-z]+#",$new_pwd))
        {

            $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Lowercase Letter!</p>";
        }
        else
        {
            if($new_pwd != $new_pwd_re)
            {
                $result = "<p style='color:red;'>The two password dosen't match!</p>";
            }
            else
            {
                $updated_pwd = "UPDATE TrainBooking SET password ='$new_pwd' WHERE id = '$id' ";
                $res = mysqli_query($conn,$updated_pwd);
                if($res)
                {
                    $result = "<p style='color:green;'>Password has been updated </p>";
                }

            }
        }

    }



}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Password change</title>
    <link rel="stylesheet" type="text/css" href="../../Styling/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-top" style="opacity: 50%;">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="../../Home/Home.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../../logout/logout.php" class="w3-bar-item w3-button">Logout</a>
        </div>
    </div>
</div>

<div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px; width: 500px; height: 480px; margin-top: 150px; margin-left: 500px;">

    <center>
        <div >
            <?php
            if(isset($result)) echo $result;
            ?>
            <h1>Update Password</h1>
            <form method="POST" action="#" style="opacity: 90%;">
                <input style="width: 350px;" class="w3-link w3-round-xlarge" type="password" name="old_pwd" placeholder="Old Password" required><br><br>
                <input style="width: 350px;" class="w3-link w3-round-xlarge" type="password" name="new_pwd" placeholder="New Password" required><br><br>
                <input style="width: 350px;" class="w3-link w3-round-xlarge" type="password" name="new_pwd_re" placeholder="Confirm New Password" required><br><br>
                <button type="submit" name="c_pwd" class="w3-button w3-red w3-margin-top" style="border-radius: 25px;">Change</button><br><br>
            </form>
            <a href="../WelcomeCustomer.php" style="color: white">Back to your Page</a>
            <a style="padding: 2%;color: white;" href="UpdateCustomer.php" > Edit Page</a><br><br>
        </div>
    </center>
</div>
</body>
<div style="margin-top: 50px;">
    <?php
    include '../../resources/footer.php'
    ?>
</div>
</html>