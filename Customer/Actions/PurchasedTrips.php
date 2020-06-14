<!DOCTYPE html>
<html>
<title>Show trips Page</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../Styling/style.css">
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
    #Edit : hover
    {
        color: white;

    }

</style>

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
<br><br><br>
<center><h1 style=" font-family: 'Droid Sans';  ">Purchased Trips</h1>
<div class="w3-half w3-margin-bottom" style=" border-radius: 25px;">

    <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px; width: 1080px;height: 300px; margin-left: 225px; margin-top: 10px;">
        <?php
        if(isset($result)) echo $result;
        ?>
        <table  style="margin-top: 20px; opacity: 80%;">
            <thead>
            <tr>
                <th>Id</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>From Country</th>
                <th>To Country</th>
                <th>Max weight</th>
                <th>Num of seats</th>
                <th>Train Id</th>
                <th>Action </th>
                <th>Payment</th>
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
            require_once "../../resources/conn.php";
            session_start();

            $UserId = $_SESSION['id'];

            $SelectName = "SELECT * FROM Trainbooking WHERE id ='$UserId' ";

            $ResultSelectName = mysqli_query($conn, $SelectName);

            if(mysqli_num_rows($ResultSelectName) > 0) {
                while ($row = mysqli_fetch_assoc($ResultSelectName)) {
                    $name = $row["name"];
                }
            }

            $SelectTipBelongsToUser = "SELECT * FROM tripbooked WHERE booker = '$name' ";

            $ResultUserTrip = mysqli_query($conn, $SelectTipBelongsToUser);

            if(mysqli_num_rows($ResultUserTrip) > 0) {
                while ($roww = mysqli_fetch_assoc($ResultUserTrip)) {
                    $TripID = $roww['tripId'];
                    $NumOfSeats = $roww['numofseats'];

                }
            }

            $SelectTrip = "SELECT From_date , To_date , From_time , To_time , From_country , To_country ,id ,maxWegith , trainId FROM trip WHERE id='$TripID' ";

            $resultSelectTrip = mysqli_query($conn, $SelectTrip);
            if($resultSelectTrip->num_rows > 0)
            {
                while ($row = $resultSelectTrip->fetch_assoc())
                {
                    echo "<tr><td>"."<center>".$row['id']."</center>"."</td><td>"."<center>".$row['From_date']."</center>"."</td><td>"."<center>".$row['To_date']."</center>"."</td><td>"."<center>".$row['From_time']."</center>"."</td><td>"."<center>".$row['To_time']."<div></center>"."</td><td>"."<center>".$row['From_country']."</center>"."</td><td>"."<center>".$row['To_country']."</center>"."</td><td>"."<center>".$row['maxWegith']."</center>"."</td><td>"."<center>".$NumOfSeats."</center>"."</td><td>"."<center>".$row['trainId']."</center>"."</td>";
                    echo "<td>"; ?><center><a style="color: red; text-decoration: none;" id="cancel" href="TripCancelation.php?id=<?php echo $row['id'];?>&&NumOfSeats=<?php echo $NumOfSeats; ?>">Cancel</a></center><?php echo "</td>";
                    echo "<td>"; ?><center><a style="color: red; text-decoration: none;" id="cancel" href="TripPayment.php?id=<?php echo $row['id'];?>&&NumOfSeats=<?php echo $NumOfSeats; ?>">Pay</a></center><?php echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            $conn-> close();
            ?>
            </tbody>
        </table>

    </div>

</div>
</body>
</html>


