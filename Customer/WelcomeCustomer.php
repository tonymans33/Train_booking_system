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
    <title>Customer page</title>
    <link rel="stylesheet" type="text/css" href="../Styling/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        th
        {
            border-left: 1px solid red;
            border-bottom: 1px solid red;
            border-right: 1px solid red;
            border-top: 1px solid red;
            border-radius: 25px;
            background: red;

        }
        td
        {


            border-right: 1px solid white;
        }
        #editbtn
        {
            color : red;
        }

    </style>

</head>
<body>
<div class="w3-top"  style="opacity: 100%;" >
    <div class="w3-bar w3-white w3-wide w3-padding w3-card" >
        <a href="../Home/Home.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>

        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="Update Data/UpdateCustomer.php" class="w3-bar-item w3-button">Change Data</a>
            <div class="w3-dropdown-hover">
            <a class="w3-bar-item w3-button">Actions</a>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
                <a href="Actions/TripBooking.php" class="w3-bar-item w3-button">Display All Trips</a>
                <a href="Actions/PurchasedTrips.php" class="w3-bar-item w3-button">Purchased Trips</a>
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

        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="  border-radius: 25px;">
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
    <div class="w3-half w3-margin-bottom" style="opacity: 80%;width: 500px; border-radius: 25px;">

        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;" >
            <h3>Mountains, Austria</h3>
            <p class="w3-opacity">One-way from $39</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>
    <div class="w3-half w3-margin-bottom" style="opacity: 80%;width: 400px;border-radius: 25px;">

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
    <div class="w3-half w3-margin-bottom" style="opacity: 80%; width: 500px;border-radius: 25px;">

        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;">
            <h3>Mountains, Austria</h3>
            <p class="w3-opacity">One-way from $39</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>

    <div class="w3-half w3-margin-bottom" style="  width: 500px;border-radius: 25px;">

        <div class="w3-panel w3-padding-16 w3-white w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px;">
            <h3>Mountains, Austria</h3>
            <p class="w3-opacity">One-way from $39</p>
            <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
            <button class="w3-button w3-margin-bottom">Buy Tickets</button>
        </div>
    </div>
</div>



<div class="w3-row-padding" style=" border-radius: 25px;">
    <div class="w3-half w3-margin-bottom" style=" border-radius: 25px; width: 500px;">

        <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="  border-radius: 25px;height: 500px;">
            <center>
                <h2 style="color: white; font-family: 'Droid Sans'">Where Do You Want To Travel ?</h2>
                <h3 style="color: white; font-family: 'Droid Sans'">Just select your own trip </h3>
                <br>
                <form action="#" method="POST" style="opacity: 90%; margin-right: 15px; " >

                    <div class="row">
                        <div class="col">
                            <!-- From -->
                            <label>From :</label>
                            <input style="width: 140px;" type="date" class="w3-link w3-round-xlarge" name="From_date" required>
                            <label>To :</label>
                            <input style="width: 140px;" type="date" class="w3-link w3-round-xlarge" name="To_date" required>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <label>From :</label>
                            <input style="width: 140px;" class="w3-link w3-round-xlarge" type="time"  name="From_time" required>
                            <!-- To -->
                            <label>To :</label>
                            <input style="width: 140px;" class="w3-link w3-round-xlarge" type="time" name="To_time" >

                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <div class="col">

                            <label>From :</label>
                            <select style="width: 140px;" required name="From_country"  class="w3-link w3-round-xlarge">
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                            </select>

                                <label>To :</label>
                            <select style="width: 140px;" required name="To_country" class="w3-link w3-round-xlarge">
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                            </select>

                        </div>
                    </div>
                    <br>


                    <div style="margin-left: 15px; ">
                        <label>Number of seats:</label>
                        <br>
                        <input style="width :250px; height: 2px;" class="w3-link w3-round-xlarge" type="text" name="NumOfSeats" required placeholder="Number of seats "><br>
                    </div>


                    <br>
                    <button style="border-radius: 25px;" type="submit" class="w3-button w3-red w3-margin-top" name="Search_trip_submit" >Search</button><br>
                </form>

            </center>
        </div>
    </div>
    <div class="w3-half w3-margin-bottom" style=" border-radius: 25px;">
       <center>
        <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px; width: 985px;height: 500px;">
            <h1 style="color: white; font-family:'Droid Sans' ">Results Found !</h1>
            <table  style="margin-top: 20px; opacity: 80%; ">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>From Date </th>
                    <th>To Date</th>
                    <th>From Time </th>
                    <th>To Time </th>
                    <th>From Country </th>
                    <th>To Country</th>
                    <th>Maximum Weight</th>
                    <th>Train Id</th>
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
                </thead>
                <!--<tfoot>
                <tr>
                    <td colspan="12">
                        <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
                    </td>
                </tr>
                </tfoot>-->



                <?php




                if(isset($_POST['Search_trip_submit']))
                {
                    require_once "../resources/conn.php";
                    $From_date = $_POST['From_date'];
                    $To_date = $_POST['To_date'];
                    $From_time = $_POST['From_time'];
                    $To_time = $_POST['To_time'];
                    $From_country = $_POST['From_country'];
                    $To_country = $_POST['To_country'];
                    $NumOfSeats= $_POST['NumOfSeats'];
                    $sql = "SELECT * FROM trip WHERE From_date = '$From_date' AND To_date = '$To_date' AND  From_country = '$From_country' AND  To_country = '$To_country' AND maxSize-$NumOfSeats >=0";
                    $result = mysqli_query($conn, $sql);
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            echo "<tr><td>".$row['id']."</td><td>"."<center>".$row['From_date']."</center>"."</td><td>"."<center>".$row['To_date']."</center>"."</td><td>"."<center>".$row['From_time']."</center>"."</td><td>"."<center>".$row['To_time']."</center>"."</td><td>"."<center>".$row['From_country']."</center>"."</td><td>"."<center>".$row['To_country']."</center>"."</td><td>"."<center>".$row['maxWegith']."</center>"."</td><td>"."<center>".$row['trainId']."</center>"."</td><td>"."<center>".$row['ticket']."</center>"."</td>";
                            echo "<td>"; ?><center><a  style="color: red; text-decoration: none;" href="Actions/TripBookingFromWelcome.php?id=<?php echo $row['id'];?>&&NumOfSeats=<?php echo $NumOfSeats; ?>">Book</a></center><?php echo "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        $conn-> close();
                    }

                    }
                    ?>


            </table>
        </div>
       </center>
        </div>
    </div>




<!-- Newsletter -->
<center>


    <div class="w3-container" style="width: 1000px;border-radius: 25px;">
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







