
<!DOCTYPE html>
<html>
<head>
    <title>Display All Trips page</title>
    <link rel="stylesheet" type="text/css" href="../../Styling/style.css">
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
        <a href="../WelcomeCustomer.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>

        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../Update Data/UpdateCustomer.php" class="w3-bar-item w3-button">Change Data</a>
            <div class="w3-dropdown-hover">

            <a href="../../logout/logout.php" class="w3-bar-item w3-button">Logout</a>

        </div>

    </div>
</div>
<br>
<center><h1 style=" font-family: 'Droid Sans'; ">All The Trips</h1>
    <div class="w3-container" style=" border-radius: 25px; ">
        <center>
            <div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style=" border-radius: 25px; width: 1150px;height: 300px; margin-left: 160px; position: absolute;">
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
                        <th>Max Size</th>
                        <th>Train Id</th>
                        <th>Cost</th>

                    </tr>
                    </thead>
                    <!--<tfoot>
                    <tr>
                        <td colspan="12">
                            <div class="links"><a href="#">&laquo;</a> <a class="active" href="#">1</a> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">&raquo;</a></div>
                        </td>
                    </tr>
                    </tfoot>-->
                    <tbody>


                    <?php
                    //if(isset($_POST['submit'])) {
                        //$NumOfSeats = $_POST['numofseats'];

                    require_once "../../resources/conn.php";
                    $sql = "SELECT * FROM trip ";
                    $result = mysqli_query($conn, $sql);
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            echo "<tr><td>"."<center>".$row['id']."</center>"."</td><td>"."<center>".$row['From_date']."</center>"."</td><td>"."<center>".$row['To_date']."</center>"."</td><td>"."<center>".$row['From_time']."</center>"."</td><td>"."<center>".$row['To_time']."</center>"."</td><td>"."<center>".$row['From_country']."</center>"."</td><td>"."<center>".$row['To_country']."</center>"."</td><td>"."<center>".$row['maxWegith']."</center>"."</td><td>"."<center>".$row['maxSize']."</center>"."</td><td>"."<center>".$row['trainId']."</center>"."</td><td>"."<center>".$row['ticket']."</center>"."</td>";


                        }
                        echo "</table>";
                    }

                    $conn-> close();
                    //}
                    ?>

                    </tbody>
                </table>
            </div>
        </center>
    </div>
    </div>

<div id="box" style="margin-top: 350px; position: absolute;" >
</div>

<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("box").innerHTML = this.responseText;
            }
        };
        xhttp.open("POST", "TripBookingWithTickets.php?id=<?php echo $row['id'];?>", true);
        xhttp.send();

    }

</script>
</body>
<br>

</html>


