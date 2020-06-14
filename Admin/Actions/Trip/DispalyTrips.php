


<!DOCTYPE html>
<html>
<head>
    <title>Display All Trips page</title>
    <link rel="stylesheet" type="text/css" href="../../../Styling/style.css">
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
        #Edit
        {
            color : red;
            text-decoration: none;
        }
        #Edit : hover
        {
            color: white;

        }
        #del
        {
            color : red;
        }
        #deleteEdit
        {
            padding: 0%;
        }
    </style>

</head>
<body>
<div class="w3-top"  style="opacity: 70%;" >
    <div class="w3-bar w3-white w3-wide w3-padding w3-card" >
        <a href="../../WelcomeAdmin.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>

        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../../Update%20Data/UpdateAdmin.php" class="w3-bar-item w3-button">Change Data</a>
            <div class="w3-dropdown-hover">
                <a class="w3-bar-item w3-button">Actions</a>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="AddTrip.php" class="w3-bar-item w3-button" >Add Trip</a>
                    <a href="../Train/AddTrain.php" class="w3-bar-item w3-button">Add Train</a>
                    <a href="DispalyTrips.php" class="w3-bar-item w3-button">Display All Trips</a>
                    <a href="../Train/DisplayTrains.php" class="w3-bar-item w3-button">Display All Trains</a>
                </div>
            </div>

            <a href="../../../logout/logout.php" class="w3-bar-item w3-button">Logout</a>

        </div>

    </div>
</div>
<br><br><br>
<center><h1 style=" font-family: 'Droid Sans';">All The Trips</h1>
    <div class="w3-half w3-margin-bottom" style=" border-radius: 25px;">
        <center>
            <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px; width: 1130px;height: 300px; margin-left: 190px;">
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
                        <th>Cost</th>
                        <th>Action </th>
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
                    if(isset($_POST['Edit_submit'])) {
                        include_once "../../../resources/conn.php";

                    }
                    require_once "../../../resources/conn.php";
                    $sql = "SELECT * FROM trip ";
                    $result = mysqli_query($conn, $sql);
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                    echo "<tr><td>"."<center>".$row['id']."</center>"."</td><td>"."<center>".$row['From_date']."</center>"."</td><td>"."<center>".$row['To_date']."</center>"."</td><td>"."<center>".$row['From_time']."</center>"."</td><td>"."<center>".$row['To_time']."<div></center>"."</td><td>"."<center>".$row['From_country']."</center>"."</td><td>"."<center>".$row['To_country']."</center>"."</td><td>"."<center>".$row['maxWegith']."</center>"."</td><td>"."<center>".$row['maxSize']."</center>"."</td><td>"."<center>".$row['trainId']."</center>"."</td><td>"."<center>".$row['ticket']."</center>"."</td>";
                    echo "<td>"; ?><center><a id="Edit" href="EditTrip.php?id=<?php echo $row['id']; ?>">Edit</a></center><?php echo "</td>";
                    echo "</tr>";
                        }
                        echo "</table>";
                    }
                    $conn-> close();
                    ?>
                    </tbody>
                </table>
            </div>
        </center>
    </div>
</center>
</body>
<div style="margin-top: 550px;">
<?php
include '../../../resources/footer.php'
?>
</div>
</html>