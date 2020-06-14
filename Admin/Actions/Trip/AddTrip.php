<?php
if(isset($_POST["add_trip_submit"])) {
    include_once "../../../resources/conn.php";

    $From_date = $_POST['From_date'];
    $To_date = $_POST['To_date'];
    $From_time = $_POST['From_time'];
    $To_time = $_POST['To_time'];
    $From_country = $_POST['From_country'];
    $To_country = $_POST['To_country'];
    $trainId = $_POST['trainId'];
    $maxSize= $_POST['maxSize'];
    $maxWegith = $_POST['maxWegith'];
    $ticketCost = $_POST['Ticket'];

    $sql = "SELECT * FROM trip WHERE From_date = '$From_date' AND To_date = '$To_date' AND From_time = '$From_time' AND  To_time = '$To_time' AND  From_country = '$From_country' AND  To_country = '$To_country' AND trainId = '$trainId' ";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 1)
    {
        $result =  "<p style='color:red;'>There Will be a conflict between trips!</p>";
    }
    else
    {
        $reg = "INSERT INTO trip (From_date, To_date , From_time , To_time , From_country , To_country , trainId , maxSize , maxWegith,ticket) VALUES ('$From_date', '$To_date', '$From_time','$To_time','$From_country' ,'$To_country','$trainId', '$maxSize' , '$maxWegith','$ticketCost') ";



        $Inresult = mysqli_query($conn,$reg);

        $result =  "<p style='color:green;'>Trip is Successfully Added</p>";

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Trip Page</title>
    <link rel="stylesheet" type="text/css" href="../../../Styling/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="w3-top" style="opacity: 50%;">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="../../WelcomeAdmin.php" class="w3-bar-item w3-button"><b>BR</b> Train</a>
        <!-- Float links to the right. Hide them on small screens -->
        <div class="w3-right w3-hide-small">
            <a href="../../../logout/logout.php" class="w3-bar-item w3-button">Logout</a>
        </div>
    </div>
</div>

<div  class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin-top : 100px;  width:450px;height: 620px;margin-left: 520px; border-radius: 25px;" >
    <center>

        <div style="margin-top:30px;"  >
            <?php
            if(isset($result)) echo $result;
            ?>
            <center>
            <form action="#" method="POST" style="opacity: 90%; " >
                <h1 style="margin-left: 20px;">Add Trip</h1>

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

                        </select req req>

                        <label>To :</label>
                        <select style="width: 140px;" required name="To_country" class="w3-link w3-round-xlarge">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>

                        </select req req>

                    </div>
                </div>
                <br>


                <div style="margin-left: 20px;">
                    <label>Maximum Capacity :</label>
                    <br>
                        <input style="width :250px; height: 2px;" class="w3-link w3-round-xlarge" type="text" name="maxSize" required placeholder="Maximum Capacity "><br>
                        <!-- To -->


                    <label>Maximum Weight :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="maxWegith" required placeholder="Maximum Weight">


                    <br>
                    <label>Train ID :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="trainId" required placeholder="Train Id">

                    <br>
                    <label>Ticket :</label><br>
                    <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="Ticket" required placeholder="Ticket Cost">
                </div>



                <button style="margin-left: 20px;border-radius: 25px;" type="submit"   class="w3-button w3-red w3-margin-top" name="add_trip_submit" >Add Trip</button><br>
            </form>

            </center>
            <br>
            <a style="margin-left: 20px; color : white;" href="../../WelcomeAdmin.php">Back to your Page</a><br><br>
            <br>
            <br><br>
        </div>
    </center>
</div>

</body>
<?php
include '../../../resources/footer.php'
?>
</html>




