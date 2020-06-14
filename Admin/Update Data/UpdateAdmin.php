
<?php
require_once "../../resources/conn.php";

session_start();

$id = $_SESSION['id'];

$name  = $email  =  '';

$sql = "SELECT * FROM Trainbooking WHERE id ='$id' ";

$resultquery = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultquery) > 0)
{
    while($row = mysqli_fetch_assoc($resultquery))
    {
        $name = $row["name"];
        $email = $row["email"];

    }
}
?>
<?php
if(isset($_POST["update_submit"]))
{
    include_once "../../resources/conn.php";

    $new_name = $_POST['new_name'];
    $new_email = $_POST['new_email'];

    if(!empty($new_name) && !empty($new_email))
    {
        $sqlupdateselect = "SELECT * FROM TrainBooking WHERE email = '$new_email'";
        $res = mysqli_query($conn,$sqlupdateselect);
        if(mysqli_num_rows($res) == 1)
        {
            $result =  "<p style='color:red;'>Email is Already taken!</p>";
        }
        else
        {
            if(!preg_match('/[a-zA-Z0-9 ]/', $new_name))
            {
                $result =  "<p style='color:red;'>Invalid Characters in Username!</p>";
            }
            else
            {
                $nameUp = "UPDATE TrainBooking SET name ='$new_name' WHERE id = '$id' ";

                $emailUp = "UPDATE TrainBooking SET email ='$new_email' WHERE id = '$id' ";

                $result = mysqli_query($conn,$nameUp);
                $result = mysqli_query($conn,$emailUp);
                //header("location:../logout/logout.php");
                $result =  "<p style='color:green;'>Your Name and Email are Successfully Updated </p>";
            }
        }
    }
    else if(!empty($new_name) && empty($new_email))
    {
        if(!preg_match('/[a-zA-Z0-9 ]/', $new_name))
        {
            $result =  "<p style='color:red;'>Invalid Characters in Username!</p>";
        }
        else
        {
            $nameUp = "UPDATE TrainBooking SET name ='$new_name' WHERE id = '$id' ";

            $new_email = $email;
            $emailUp = "UPDATE TrainBooking SET email ='$new_email' WHERE id = '$id' ";

            $result = mysqli_query($conn,$nameUp);
            $result = mysqli_query($conn,$emailUp);
            //header("location:../logout/logout.php");
            $result =  "<p style='color:green;'>Your Name is Successfully Updated </p>";
        }


    }
    else if(empty($new_name) && !empty($new_email))
    {
        $sqlupdateselect = "SELECT * FROM TrainBooking WHERE email = '$new_email'";
        $res = mysqli_query($conn,$sqlupdateselect);
        if(mysqli_num_rows($res) == 1)
        {
            $result =  "<p style='color:red;'>Email is Already taken!</p>";
        }
        else
        {

            $new_name = $name;
            $nameUp = "UPDATE TrainBooking SET name ='$new_name' WHERE id = '$id' ";

            $emailUp = "UPDATE TrainBooking SET email ='$new_email' WHERE id = '$id' ";

            $result = mysqli_query($conn,$nameUp);
            $result = mysqli_query($conn,$emailUp);
            //header("location:../logout/logout.php");
            $result =  "<p style='color:green;'>Your Email is Successfully Updated </p>";
        }

    }



}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Admin page</title>
    <link rel="stylesheet" type="text/css" href="../../Styling/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-top" style="opacity: 50%;">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="../WelcomeAdmin.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../../logout/logout.php" class="w3-bar-item w3-button">Logout</a>
        </div>
    </div>
</div>

<div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px; width: 500px; height: 400px; margin-top: 150px; margin-left: 510px;" >
    <center>

        <div >
            <?php
            if(isset($result)) echo $result;
            ?>

            <h1>Update</h1>
            <form action="#" method="POST" style="opacity: 90%;">
                <input style="width: 350px;" class="w3-link w3-round-xlarge" type="text" name="new_name" placeholder="<?php echo $name; ?>" ><br><br>
                <input style="width: 350px;" class="w3-link w3-round-xlarge" type="text" name="new_email" placeholder="<?php echo $email; ?>" ><br><br>
                <button type="submit" class="w3-button w3-red w3-margin-top" style="border-radius: 25px; " name="update_submit" >Update</button><br>
                <br>
                <a href="ChangePasswordAdmin.php" style="color: white;">Change Password ?</a>
                <a href="../WelcomeAdmin.php" style="color: white;">Back to your Page</a><br><br>
            </form>
            <br>

            <br>

            <br><br>
        </div>


    </center>
</div>

</body>
<br><br><br><br>
<?php
include '../../resources/footer.php'
?>
</html>