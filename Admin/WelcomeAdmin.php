<?php
require_once "../resources/conn.php";

session_start();

$id = $_SESSION['id'];

$name = $pwd = $email = $usertype =  '';

$sql = "SELECT * FROM Trainbooking WHERE id ='$id' ";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        $name = $row["name"];
        $usertype = $row["usertype"];
        $pwd = $row["password"];
        $email = $row["email"];

    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin page</title>
    <link rel="stylesheet" type="text/css" href="../Styling/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<div class="w3-top"  style="opacity: 100%;" >
    <div class="w3-bar w3-white w3-wide w3-padding w3-card" >
        <a href="../Home/Home.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>

        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="Update Data/UpdateAdmin.php" class="w3-bar-item w3-button">Change Data</a>
            <div class="w3-dropdown-hover">
            <a class="w3-bar-item w3-button">Actions</a>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="Actions/Trip/AddTrip.php" class="w3-bar-item w3-button" >Add Trip</a>
                    <a href="Actions/Train/AddTrain.php" class="w3-bar-item w3-button">Add Train</a>
                    <a href="Actions/Trip/DispalyTrips.php" class="w3-bar-item w3-button">Display All Trips</a>
                    <a href="Actions/Train/DisplayTrains.php" class="w3-bar-item w3-button">Display All Trains</a>
                </div>
            </div>

            <a href="../logout/logout.php" class="w3-bar-item w3-button">Logout</a>

        </div>

    </div>
</div>
<br><br>
    <!-- Explore Nature -->
    <div class="w3-container" style=" border-radius: 25px; margin-top: 50px;">

    </div>
    <div class="w3-row-padding" style=" border-radius: 25px;">
        <div class="w3-half w3-margin-bottom" style=" border-radius: 25px;">

            <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style=" border-radius: 25px;">
                <h3>West Coast, Norway</h3>
                <p class="w3-opacity">Roundtrip from $79</p>
                <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                <button class="w3-button w3-margin-bottom">Buy Tickets</button>
            </div>
        </div>
        <div class="w3-half w3-margin-bottom" style=" border-radius: 25px;">

            <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;">
                <h3>Mountains, Austria</h3>
                <p class="w3-opacity">One-way from $39</p>
                <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
                <button class="w3-button w3-margin-bottom">Buy Tickets</button>
            </div>
        </div>
    </div>


<div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom" style="width: 600px;">
        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style=" border-radius: 25px;">
            <h3>West Coast, Norway</h3>
            <p class="w3-opacity">Roundtrip from $79</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>
    <div class="w3-half w3-margin-bottom" style="width: 500px; border-radius: 25px;">

        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;" >
            <h3>Mountains, Austria</h3>
            <p class="w3-opacity">One-way from $39</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>
    <div class="w3-half w3-margin-bottom" style="width: 400px;border-radius: 25px;">

        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;">
            <h3>Mountains, Austria</h3>
            <p class="w3-opacity">One-way from $39</p>
            <p>Praesent tincidunt sed tellus ut rutrum sea.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>
</div>


<div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom" style=" width: 500px;" >
        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;">
            <h3>West Coast, Norway</h3>
            <p class="w3-opacity">Roundtrip from $79</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>
    <div class="w3-half w3-margin-bottom" style=" width: 500px;border-radius: 25px;">

        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;">
            <h3>Mountains, Austria</h3>
            <p class="w3-opacity">One-way from $39</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>

    <div class="w3-half w3-margin-bottom" style=" width: 500px;border-radius: 25px;">

        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;">
            <h3>Mountains, Austria</h3>
            <p class="w3-opacity">One-way from $39</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>
</div>



    <!-- Newsletter -->
<center>

    <div class="w3-container" style="width: 1000px;" style="border-radius: 25px;">
        <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;">
            <center>
            <h2>Get the best offers first!</h2>
            <p>Join our newsletter.</p>
            <label>E-mail</label>
            <input style="width: 400px; border-radius: 25px; margin-right: 40px; " class="w3-input w3-border" type="text" placeholder="Your Email address"><br>
            <button style="border-radius: 25px;" type="button" class="w3-button w3-red w3-margin-top">Subscribe</button>
            </center>
        </div>
    </div>
</center>
<br>
<br>
<footer class="w3-container w3-center w3-opacity w3-margin-bottom w3-black" style="height: 90px;" >
    <br>
    <h5>Find Us On</h5>
    <div class="w3-xlarge w3-padding-16" style="color: white;">
    </div>
</footer>


</body>
</html>

