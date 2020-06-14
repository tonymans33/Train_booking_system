<?php

require_once "../../resources/conn.php";

session_start();

$IdUser = $_SESSION['id'];
$email = $_SESSION['email'];


$SelectUserName = "SELECT name FROM trainbooking WHERE id ='$IdUser'";

$ResultSelectIdUSer = mysqli_query($conn , $SelectUserName);

if(mysqli_num_rows($ResultSelectIdUSer) > 0)
{
    while($row = mysqli_fetch_assoc($ResultSelectIdUSer))
    {
        $booker = $row['name'];
    }
}


$id = $_GET['id'];

$NumOfSeats = $_GET['NumOfSeats'];

$SelectMaxSize = "SELECT maxSize FROM trip WHERE id ='$id' ";

$ResultSelectMaxSize = mysqli_query($conn, $SelectMaxSize);

if(mysqli_num_rows($ResultSelectMaxSize) > 0)
{
    while($row = mysqli_fetch_assoc($ResultSelectMaxSize))
    {
        $maxSize = $row['maxSize'];
    }
}

$new_maxSize = $maxSize + $NumOfSeats;

$UpdateTrip = "UPDATE trip SET maxSize = '$new_maxSize' WHERE id= '$id'";

$ResultUpdateTrip = mysqli_query($conn , $UpdateTrip);


$DeleteTripBooked = "DELETE FROM tripbooked WHERE tripId = '$id'";

$ResultDelete = mysqli_query($conn , $DeleteTripBooked);

if(!$ResultDelete || !$ResultUpdateTrip)
{
    echo "Error";
}
$to = "tonymansour66@yahoo.com";
$subject = "Confirmation email";
$massage = "Thank you for using BrTrain.com ..You have canceled you reservations tickets For trip number : ".$id;
$headers = "From : mansourtony44@gmail.com" . "\r\n" .
    "CC: Tony mansour";
mail($to, $subject, $massage, $headers);

?>
<!DOCTYPE html>
<html>
<title>confirmation Page</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../Styling/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>


<!-- Navbar (sit on top) -->
<div class="w3-top" style="opacity: 50%;">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="../WelcomeCustomer.php" class="w3-bar-item w3-button" ><b>BR</b> Train</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../../logout/logout.php" class="w3-bar-item w3-button">Logout</a>

        </div>
    </div>
</div>
<br><br>
<div class="w3-half w3-margin-bottom" style=" border-radius: 25px;">

    <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px; width: 985px;height: 330px; margin-left: 275px; margin-top: 100px;">
        <center>
            <h1><strong><?php echo $booker; ?></strong> You have Canceled your reservations tickets For trip number : <strong><?php echo $id; ?></strong></h1>
            <h3>We will send you a confirmation e-mail at <strong><?php echo $email; ?></strong> </h3>
            <br>
            <img style="width: 170px; height: 110px;" src="../../resources/mail6.png">

        </center>
    </div>

</div>


</body>
<div style="margin-top: 610px;">
    <?php
    include '../../resources/footer.php'
    ?>
</div>
</html>
