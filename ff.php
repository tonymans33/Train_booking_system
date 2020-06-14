
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
                    require_once "resources/conn.php";
                    $From_date = $_POST['From_date'];
                    $To_date = $_POST['To_date'];
                    $From_time = $_POST['From_time'];
                    $To_time = $_POST['To_time'];
                    $From_country = $_POST['From_country'];
                    $To_country = $_POST['To_country'];
                    $NumOfSeats= $_POST['NumOfSeats'];
                    echo $From_date;
                    $sql = "SELECT * FROM trip WHERE From_date = '$From_date' AND To_date = '$To_date' AND  From_country = '$From_country' AND  To_country = '$To_country' AND maxSize-$NumOfSeats >=0";
                    $result = mysqli_query($conn, $sql);
                    if($result->num_rows > 0)
                    {
                        while ($row = $result->fetch_assoc())
                        {
                            echo "<tr><td>".$row['id']."</td><td>"."<center>".$row['From_date']."</center>"."</td><td>"."<center>".$row['To_date']."</center>"."</td><td>"."<center>".$row['From_time']."</center>"."</td><td>"."<center>".$row['To_time']."</center>"."</td><td>"."<center>".$row['From_country']."</center>"."</td><td>"."<center>".$row['To_country']."</center>"."</td><td>"."<center>".$row['maxWegith']."</center>"."</td><td>"."<center>".$row['trainId']."</center>"."</td>";
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

</div>
    </center>