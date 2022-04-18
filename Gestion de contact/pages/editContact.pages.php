<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Badr@2001";
$db = "ooplogin";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM contact WHERE id_cont='$id'";
    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);
    $fullName = $row['fullName_cont'];
    $job = $row['job_cont'];
    $phoneNumber = $row['phoneNumber_cont'];
    $fix = $row['fix_cont'];
}


?>

<?php
    if (isset($_POST['edit'])) {

        $fullName = $_POST["fullName_cont"];
        $job = $_POST["job_cont"];
        $phoneNumber = $_POST["phoneNumber_cont"];
        $fix = $_POST["fix_cont"];

        $id = $_GET['edit'];
        // $results = "SELECT * FROM `contact` WHERE id = $id";  
        // $res = mysqli_query($conn, $results);
        // $data = mysqli_fetch_assoc($res);



        $edit_contact = "UPDATE `contact` SET fullName_cont ='$fullName', 
        job_cont ='$job',
        phoneNumber_cont ='$phoneNumber',
        fix_cont = '$fix'
        where id_cont = '$id'";

        if ($conn->query($edit_contact)) {
            header("location: ./contact.pages.php");
            die();
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wid_contth=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/editContact.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->


        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Contact Details</div>
                    <div class="card-body">
                        <form method="POST">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Full Name</label>
                                <input name="fullName_cont" class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo "$fullName" ?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">Job</label>
                                    <input name="job_cont" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="<?php echo "$job" ?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Phone Number</label>
                                    <input name="phoneNumber_cont" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="<?php echo "$phoneNumber" ?>">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">fix Number</label>
                                    <input name="fix_cont" class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="<?php echo "$fix" ?>">
                                </div>
                                <!-- Form Group (location)-->
                                <!-- <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Location</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location" value="San Francisco, CA">
                            </div> -->
                            </div>

                            <!-- Save changes button-->

                            <button class="btn btn-primary" type="submit" name="edit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
