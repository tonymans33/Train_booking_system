<?php
require_once "../../resources/conn.php";

session_start();

$IdUser = $_SESSION['id'];

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

$SelectTicketCost = "SELECT ticket FROM trip WHERE id = '$id'";

$SelectTicketCost_result = mysqli_query($conn , $SelectTicketCost);

if(mysqli_num_rows($SelectTicketCost_result) > 0) {
    while ($row = mysqli_fetch_assoc($SelectTicketCost_result))
    {
        $ticketCost = $row['ticket'];
    }
}

$pill = $NumOfSeats * $ticketCost;

if(isset($_POST['Pay_submit']))
{
    $payed = 'YES';

    $Payment_update = "UPDATE tripbooked SET payed = '$payed' WHERE tripId = $id AND numofseats = '$NumOfSeats' AND booker = '$booker' ";

    $Payment_update_result = mysqli_query($conn , $Payment_update);

    if($Payment_update)
    {
        $result =  "<p style='color:green;'>You have payed your pill successfully </p>";
    }
}

?>

<!DOCTYPE html>

<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" type="text/css" href="../../Styling/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>

<div class="w3-top" style="opacity: 50%;">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="../WelcomeCustomer.php" class="w3-bar-item w3-button" ><b>BR</b> Train</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../../logout/logout.php" class="w3-bar-item w3-button">Logout</a>

        </div>
    </div>
</div>

<div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin-top: 150px; width: 430px; border-radius: 25px; margin-left: 540px;">
    <center>
        <?php
        if(isset($result)) echo $result;
        ?>
        <h1>Payment</h1>
        <h3>Your Pill is : <?php echo $pill;?></h3>
        <form action="#" method="POST" style="opacity: 80%;">
            <input style="width: 350px;" class="w3-link w3-round-xlarge" type="text" name="visa" placeholder="Visa card" required><br><br>
            <input style="width: 350px;" class="w3-link w3-round-xlarge" type="password" name="pwd" placeholder="Password" required><br><br>


            <button type="submit" style="width: 100px; border-radius: 25px; " class="w3-button w3-red w3-margin-top" name="Pay_submit" id="but">Pay</button><br>
        </form>
        <br>


    </center>
</div>
</body>
<div style="margin-top: 100px;">
    <?php
    include '../../resources/footer.php'
    ?>
</div>
</html>
