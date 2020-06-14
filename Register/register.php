<?php
if(isset($_POST["sign_submit"]))
{
    include_once "../resources/conn.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $pwd_re = $_POST['pwd-re'];
    $usertype = $_POST['usertype'];

    $sql = "SELECT * FROM TrainBooking WHERE email = '$email'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 1)
    {
        $result =  "<p style='color:red;'>Email is Already taken!</p>";
    }
    else
    {
        if(!preg_match('/[a-zA-Z0-9 ]/', $name))
        {
            $result =  "<p style='color:red;'>Invalid Characters in Username!</p>";
        }
        else
        {
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $result =  "<p style='color:red;'>Invalid E-mail!</p>";
            }
            else
            {
                if (strlen($_POST["pwd"]) <= '8')
                {
                    $result = "<p style='color:red;'>Your Password Must Contain At Least 8 Characters!</p>";
                }
                elseif(!preg_match("#[0-9]+#",$pwd))
                {

                    $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Number!</p>";
                }
                elseif(!preg_match("#[A-Z]+#",$pwd))
                {

                    $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Capital Letter!</p>";
                }
                elseif(!preg_match("#[a-z]+#",$pwd))
                {

                    $result = "<p style='color:red;'>Your Password Must Contain At Least 1 Lowercase Letter!</p>";
                }
                else
                {
                    if($pwd != $pwd_re)
                    {
                        $result =  "<p style='color:red;'>The two password dosen't match!</p>";
                    }
                    else
                    {
                        $reg = "INSERT INTO TrainBooking (name, password, email,usertype) VALUES ('$name', '$pwd', '$email','$usertype') ";

                        $result = mysqli_query($conn,$reg);

                        $result =  "<p style='color:green;'>Registration Successful</p>";
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration page</title>
    <link rel="stylesheet" type="text/css" href="../Styling/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-top" style="opacity: 50%;">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card" >
        <a  href="../Home/Home.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../Register/register.php" class="w3-bar-item w3-button">Register</a>
            <a href="../Login/login.php" class="w3-bar-item w3-button">Login</a>
            <a href="#" class="w3-bar-item w3-button">About</a>
        </div>
    </div>
</div>

<div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin-top: 120px; width: 450px; border-radius: 25px; margin-left: 530px;">
    <center>
        <?php
        if(isset($result)) echo $result;
        ?>
        <div>
        <h1>Register</h1>

        <form action="#" method="POST" style="opacity: 90%;" >
            <input style="width: 350px;" class="w3-link w3-round-xlarge" type="text" name="name" placeholder="Username" required><br><br>
            <input style="width: 350px;" class="w3-link w3-round-xlarge" type="text" name="email" placeholder="E-mail" required><br><br>
            <input style="width: 350px;" class="w3-link w3-round-xlarge" type="password" name="pwd" placeholder="Password" required=><br><br>
            <input style="width: 350px;" class="w3-link w3-round-xlarge" type="password" name="pwd-re" placeholder="Confirm Password" required=><br><br>
            <div class="radio_group">
                <label for="usertype" >I'm a :</label>
                <input type="radio" name="usertype" value="Admin"  required>&nbsp;Admin |
                <input type="radio" name="usertype" value="Customer" required>&nbsp;Customer
            </div>
            <br>
            <button type="submit"  class="w3-button w3-red w3-margin-top" style="border-radius: 25px;" name="sign_submit" id="but">Register</button><br>
        </form>
        <br>
        <a href="../Login/login.php" style="color: white;">Aleady have an account</a>
        <br><br>
        </div>
        </div>

    </center>
</div>

</body>
<?php
include '../resources/footer.php'
?>
</html>