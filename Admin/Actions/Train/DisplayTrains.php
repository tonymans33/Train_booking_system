
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
                    <a href="../Trip/AddTrip.php" class="w3-bar-item w3-button" >Add Trip</a>
                    <a href="AddTrain.php" class="w3-bar-item w3-button">Add Train</a>
                    <a href="../Trip/DispalyTrips.php" class="w3-bar-item w3-button">Display All Trips</a>
                    <a href="#" class="w3-bar-item w3-button">Display All Trains</a>
                </div>
            </div>

            <a href="../../../logout/logout.php" class="w3-bar-item w3-button">Logout</a>

        </div>

    </div>
</div>
<br><br><br>
<center>
    <h1 style=" font-family: 'Droid Sans';">All The Trips</h1>
        <div class="w3-half w3-margin-bottom" style=" border-radius: 25px;">
            <center>
                <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="border-radius: 25px; width: 600px;height: 200px; margin-left: 450px;">
                    <table  style="margin-top: 20px; opacity: 80%;">
            <thead>
            <tr>
                <th>Id</th>
                <th>Max weight</th>
                <th>Max Size</th>
                <th>Train Id</th>
                <th>Main Station</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require_once "../../../resources/conn.php";
            $sql = "SELECT * FROM train ";
            $result = mysqli_query($conn, $sql);
            if($result->num_rows > 0)
            {
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td>"."<center>".$row['id']."</center>"."</td><td>"."<center>".$row['maxWegith']."</center>"."</td><td>"."<center>".$row['maxSize']."</center>"."</td><td>"."<center>".$row['trainId']."</center>"."</td><td>"."<center>".$row['mainStation']."</center>"."</td>";
                     echo "<td>"; ?><center><a style="color: red; text-decoration: none;" href="EditTrain.php?id=<?php echo $row['id']; ?>">Edit</a></center> <?php echo "</td>";
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
<div style="margin-top: 545px;">
    <?php
    include '../../../resources/footer.php'
    ?>
</div>
</html>

