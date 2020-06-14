<?php
require_once "../../../resources/conn.php";

$id = $_GET['id'];

$sql = "SELECT * FROM train WHERE id ='$id' ";

$resultquery = mysqli_query($conn, $sql);

if(mysqli_num_rows($resultquery) > 0)
{
    while($row = mysqli_fetch_assoc($resultquery))
    {
        $maxSize = $row["maxSize"];
        $maxWegith = $row["maxWegith"];
        $trainId = $row["trainId"];
        $mainStation = $row["mainStation"];
    }
}
?>
<?php
if(isset($_POST['up_train_submit']))
{
    include_once "../../../resources/conn.php";

    $new_maxSize = $_POST['new_maxSize'];
    $new_maxWegith = $_POST['new_maxWegith'];
    $new_trainId = $_POST['new_trainId'];
    $new_mainStation = $_POST['new_mainStation'];



    $trainId_update_checker = "SELECT * FROM train WHERE trainId = '$new_trainId' ";
    $trainId_result_checker = mysqli_query($conn,$trainId_update_checker);

    if(mysqli_num_rows($trainId_result_checker) == 1)
    {
        $result =  "<p style='color:red;'>There is a Train With the same Id !</p>";
    }
    else
    {
        $maxSize_update = "UPDATE train SET maxSize = '$new_maxSize' WHERE id = '$id' ";

        $maxWegith_update = "UPDATE train SET maxWegith = '$new_maxWegith' WHERE id = '$id' ";

        $trainId_update = "UPDATE train SET trainId = '$new_trainId' WHERE id = '$id' ";

        $mainStation_update = "UPDATE train SET mainStation = '$new_mainStation' WHERE id = '$id' ";

        $maxSize_result = mysqli_query($conn,$maxSize_update);

        $maxWegith_result = mysqli_query($conn,$maxWegith_update);

        $mainStation_result = mysqli_query($conn,$mainStation_update);

        $trainId_result = mysqli_query($conn,$trainId_update);

        if($maxSize_result || $maxWegith_result || $mainStation_result || $trainId_result )
        {
            $result =  "<p style='color:green;'>Train is Successfully Updated</p>";
        }

    }


}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Train Page</title>
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

<div class="w3-panel w3-padding-16 w3-black w3-opacity w3-card w3-hover-opacity-off" style="margin-left: 580px; width: 350px; height: 510px; border-radius: 25px; margin-top: 120px;">
    <center>

        <div style="margin-top:30px;" >
            <?php
            if(isset($result)) echo $result;
            ?>
            <center>
                <form action="#" method="POST" style="opacity: 90%; margin-right: 15px;" >
                    <h1 style="margin-left: 20px;">Edit Train</h1>



                    <div style="margin-left: 20px;">
                        <label>Maximum Capacity :</label>
                        <br>
                        <input style="width :250px; height: 2px;" class="w3-link w3-round-xlarge" type="text" name="new_maxSize"  placeholder="<?php echo $maxSize; ?>"<br>
                        <!-- To -->


                        <label>Maximum Weight :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="new_maxWegith"  placeholder="<?php echo $maxWegith;?>">


                        <br>
                        <label>Train ID :</label><br>
                        <input style="width: 250px;height: 2px;" class="w3-link w3-round-xlarge" type="text" name="new_trainId"  placeholder="<?php echo $trainId; ?>">

                        <br>
                        <label>Main Station : <?php echo $mainStation; ?></label><br>
                        <select style="width: 250px; height: 25px;" name="new_mainStation"  class="w3-link w3-round-xlarge">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
                            <option value="Andorra">Andorra</option>
                        </select>
                    </div>


                    <button style="margin-left: 20px;border-radius: 25px; width: 200px;" type="submit"  class="w3-button w3-red w3-margin-top" name="up_train_submit" >Update</button><br>

                </form>

            </center>
            <br>
            <a style="margin-left: 20px;color: white;" href="../../WelcomeAdmin.php">Back to your Page</a><br><br>
            <br>
            <br><br>
        </div>
    </center>
</div>

</body>
<?php
include '../../../resources/footer.php';
?>
</html>

