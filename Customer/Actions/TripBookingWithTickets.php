<?php
if(isset($_POST['numofseates'])) {

    require_once "../../resources/conn.php";

    $NumOfSeats = $_POST['numofseates'];

    session_start();

    $IdUser = $_SESSION['id'];
    $email = $_SESSION['email'];

    $SelectUserName = "SELECT name FROM trainbooking WHERE id ='$IdUser'";

    $ResultSelectIdUSer = mysqli_query($conn, $SelectUserName);

    if (mysqli_num_rows($ResultSelectIdUSer) > 0) {
        while ($row = mysqli_fetch_assoc($ResultSelectIdUSer)) {
            $booker = $row['name'];
        }
    }

    $id = $_GET['id'];


    $InTripBooked = "INSERT INTO tripbooked(booker , tripid , numofseats) VALUES('$booker' , '$id' ,'$NumOfSeats' ) ";

    $ResultInTripBooked = mysqli_query($conn, $InTripBooked);

    $SelectMaxSize = "SELECT maxSize FROM trip WHERE id ='$id' ";

    $ResultSelectMaxSize = mysqli_query($conn, $SelectMaxSize);

    if (mysqli_num_rows($ResultSelectMaxSize) > 0) {
        while ($row = mysqli_fetch_assoc($ResultSelectMaxSize)) {
            $maxSize = $row['maxSize'];
        }
    }

    $new_maxSize = $maxSize - $NumOfSeats;

    $UpdateTrip = "UPDATE trip SET maxSize = '$new_maxSize' WHERE id= '$id'";

    $ResultUpdateTrip = mysqli_query($conn, $UpdateTrip);

    if (!$InTripBooked || !$UpdateTrip) {
        echo "Error";
    }


    echo"<center>";
    echo"<div class=\"w3-half w3-margin-bottom\" id=\"confirm\" style=\"  border-radius: 25px;  margin-left: 290px; \"><div class=\"w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off\" style=\"border-radius: 25px; width: 985px;height: 320px;margin-top: 300px;\"><center><h1><strong> $booker</strong> You have purchased a <strong>$NumOfSeats</strong> tickets For trip number : <strong>$id</strong></h1>";
            echo "<h3>We will send you a confirmation e-mail at <strong>$email</strong> </h3>";
            echo "<br>";
            echo "<img style=\"width: 170px; height: 110px;\" src=\"../../resources/mail6.png\">";
        echo"</center>";
    echo "</div>";

echo"</div>";
    echo"</center>";

}
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

<div class="w3-half w3-margin-bottom" style=" border-radius: 25px; ">
    <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin-top: 150px; width: 430px; border-radius: 25px; margin-left: 550px; ">
        <center>


            <form action="#" method="POST" style="opacity: 80%;">

                <input style="width: 350px;" class="w3-link w3-round-xlarge" type="text" required name="numofseates" placeholder="Number Of Seats" ><br><br>

                <button type="submit" name="numofseates" style="width: 100px; border-radius: 25px; "  onclick="myFunction()" class="w3-button w3-red w3-margin-top" >Buy</button><br>
            </form>

        </center>
    </div>
</div>

</body>

</html>



