<?php
require_once "../../../resources/conn.php";

$id = $_GET['id'];

$sql = "SELECT * FROM trip WHERE id ='$id' ";

$resultquery = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultquery) > 0)
{
    while($row = mysqli_fetch_assoc($resultquery))
    {
        $trainId = $row['trainId'];
        $From_date = $row['From_date'];
        $To_date =  $row['To_date'];
        $From_time = $row['From_time'];
        $To_time =  $row['To_time'];
        $From_country = $row['From_country'];
        $To_country =  $row['To_country'];
        $maxWegith = $row['maxWegith'];
        $maxSize = $row['maxSize'];
        $ticketCost = $row['ticket'];
    }
}

?>
<?php
if(isset($_POST["up_trip_submit"])) {
    include_once "../../../resources/conn.php";

    $new_maxSize = $_POST['new_maxSize'];
    $new_maxWegith = $_POST['new_maxWegith'];
    $new_trainId = $_POST['new_trainId'];
    $new_From_date = $_POST['new_From_date'];
    $new_To_date = $_POST['new_To_date'];
    $new_From_time = $_POST['new_From_time'];
    $new_To_time = $_POST['new_To_time'];
    $new_From_country = $_POST['new_From_country'];
    $new_To_country = $_POST['new_To_country'];
    $new_ticketCost = $_POST['new_ticketCost'];

    $trip_update_checker = "SELECT * FROM trip WHERE From_date = '$new_From_date' AND To_date = '$new_To_date' AND From_time = '$new_From_time' AND  To_time = '$new_To_time' AND  From_country = '$new_From_country' AND  To_country = '$new_To_country' AND trainId = '$new_trainId' ";

    $trip_result_checker = mysqli_query($conn,$trip_update_checker);

    if(mysqli_num_rows($trip_result_checker) == 1)
    {
        $result =  "<p style='color:red;'>There Will be a conflict between trips!</p>";
    }
    else
    {
        $maxSize_update = "UPDATE trip SET maxSize = '$new_maxSize' WHERE id = '$id' ";

        $maxWegith_update = "UPDATE trip SET maxWegith = '$new_maxWegith' WHERE id = '$id' ";

        $From_date_update = "UPDATE trip SET From_date = '$new_From_date' WHERE id = '$id' ";

        $To_date_update = "UPDATE trip SET To_date = '$new_To_date' WHERE id = '$id' ";

        $From_time_update = "UPDATE trip SET From_time = '$new_From_time' WHERE id = '$id' ";

        $To_time_update = "UPDATE trip SET To_time = '$new_To_time' WHERE id = '$id' ";

        $From_country_update = "UPDATE trip SET From_country = '$new_From_country' WHERE id = '$id' ";

        $To_country_update = "UPDATE trip SET To_country = '$new_From_country' WHERE id = '$id' ";

        $trainId_update = "UPDATE trip SET trainId = '$new_trainId' WHERE id = '$id' ";

        $ticketCost_update = "UPDATE trip SET ticket = '$new_ticketCost' WHERE id = '$id' ";



        $From_date_result = mysqli_query($conn,$From_date_update);

        $To_date_result = mysqli_query($conn,$To_date_update);

        $From_time_result = mysqli_query($conn, $From_time_update);

        $To_time_result = mysqli_query($conn,$To_time_update);

        $From_country_result = mysqli_query($conn,$From_country_update);

        $To_country_result = mysqli_query($conn,$To_country_update);

        $maxSize_result = mysqli_query($conn,$maxSize_update);

        $maxWegith_result = mysqli_query($conn,$maxWegith_update);

        $trainId_result = mysqli_query($conn,$trainId_update);

        $ticketCost_result = mysqli_query($conn,$ticketCost_update);

        if($maxSize_result || $maxWegith_result  || $trainId_result || $From_date_result || $To_date_result || $From_time_result || $To_time_result || $From_country_result || $To_country_result || $ticketCost_result)
        {
            $result =  "<p style='color:green;'>Trip is Successfully Updated</p>";
        }

    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Trip Page</title>
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

<div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin-top : 90px;  width:450px;height: 690px;margin-left: 525px; border-radius: 25px;" >
    <center>

        <div style="margin-top:30px;" >
            <?php
            if(isset($result)) echo $result;
            ?>
            <center>
                <form action="#" method="POST" style="opacity: 90%;" >
                    <h1 style="margin-left: 20px; ">Edit Trip</h1>

                    <div class="row">
                        <div class="col">
                            <!-- From -->
                            <label>From :</label>
                            <input style="width: 140px;" type="date" class="w3-link w3-round-xlarge" name="new_From_date" value="<?php echo $From_date; ?>" >
                            <label>To :</label>
                            <input style="width: 140px;" type="date" class="w3-link w3-round-xlarge" name="new_To_date" value="<?php echo $To_date; ?>" >
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col">
                            <label>From :</label>
                            <input style="width: 140px;" class="w3-link w3-round-xlarge" type="time"  name="new_From_time" value="<?php echo $From_time; ?>" required>
                            <!-- To -->
                            <label>To :</label>
                            <input style="width: 140px;" class="w3-link w3-round-xlarge" type="time" name="new_To_time"  value="<?php echo $To_time; ?>">

                        </div>
                    </div>
                    <br>

                            <label>From : <?php echo $From_country; ?></label><br>
                            <select style="width: 245px;margin-left: 15px;"  name="new_From_country"   class="w3-link w3-round-xlarge">
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>

                            </select><br>

                            <label>To : <?php echo $To_country; ?></label><br>
                            <select style="width: 245px;margin-left: 15px;"  name="new_To_country" class="w3-link w3-round-xlarge">
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                            </select>

                                <br>

                    <div style="margin-left: 20px;">
                        <label>Maximum Capacity :</label><br>
                        <input style="width :250px; height: 2px;" class="w3-link w3-round-xlarge" type="text" name="new_maxSize"  placeholder="<?php echo $maxSize; ?>"><br>
                        <!-- To -->


                        <label>Maximum Weight :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="new_maxWegith"  placeholder="<?php echo $maxWegith; ?>">


                        <br>
                        <label>Train ID :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="new_trainId"  placeholder="<?php echo $trainId; ?>">

                        <br>
                        <label>Cost :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="new_ticketCost"  placeholder="<?php echo $ticketCost; ?>">
                    </div>



                    <button style="margin-left: 20px;border-radius: 25px; width: 200px;" type="submit"  class="w3-button w3-red w3-margin-top" name="up_trip_submit" >Update</button><br>
                </form>

            </center>
            <br>
            <a style="margin-left: 20px;color: white;" href="../../WelcomeAdmin.php">Back to your Page</a><br><br>
            <br>
            <br><br>
        </div>
    </center>
</div>
<br><br>

</body>
<?php
include '../../../resources/footer.php'
?>
</html>




