<?php
if(isset($_POST["app_train_submit"])) {
    include_once "../../../resources/conn.php";

    $trainId = $_POST['trainId'];
    $maxSize= $_POST['maxSize'];
    $maxWegith = $_POST['maxWegith'];
    $mainStation = $_POST['mainStation'];

    $sql = "SELECT * FROM train WHERE trainId = '$trainId' ";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res) == 1)
    {
        $result =  "<p style='color:red;'>There is a Train With the same Id !</p>";
    }
    else
    {
        $reg = "INSERT INTO train ( trainId , maxSize , maxWegith , mainStation) VALUES ('$trainId', '$maxSize' , '$maxWegith','$mainStation') ";

        $Inresult = mysqli_query($conn,$reg);

        $result =  "<p style='color:green;'>Train is Successfully Added</p>";

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

<div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin-left: 600px;margin-top : 130px;width:310px;height: 500px;border-radius: 25px;">
    <center>

        <div style="margin-top:30px;" >
            <?php
            if(isset($result)) echo $result;
            ?>
            <center>
                <form action="#" method="POST" style="opacity: 90%; " >
                    <h1 style="margin-left: 20px;">Add Train</h1>

                    <br>


                    <div style="margin-left: 15px;">
                        <label>Maximum Capacity :</label>
                        <br>
                        <input style="width :250px; height: 2px;" class="w3-link w3-round-xlarge" type="text" name="maxSize" required ><br>
                        <!-- To -->


                        <label>Maximum Weight :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="maxWegith" required >


                        <br>
                        <label>Train ID :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="trainId" required >

                        <br>
                        <label>Main Station :</label><br>
                        <select style="width: 250px; height: 25px;" required name="mainStation" class="w3-link w3-round-xlarge">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                        </select>
                    </div>


                    <button style="margin-left: 20px;border-radius: 25px;" type="submit"   class="w3-button w3-red w3-margin-top" name="app_train_submit" >Add Train</button><br>
                </form>

            </center>
            <br>
            <a style="margin-left: 20px;color: white;" href="../../WelcomeAdmin.php" >Back to your Page</a><br><br>
            <br>
            <br><br>
        </div>
    </center>
</div>

</body>
<br>
<?php
include '../../../resources/footer.php'
?>
</html>


