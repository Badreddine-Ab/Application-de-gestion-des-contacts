<?php
session_start();
if(!isset($_SESSION['user']))
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Badr@2001";
$db = "ooplogin";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

// $sql = "SELECT * FROM contact ";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "id: " . $row["id_cont"]. " - Name: " . $row["fullName_cont"]. " " . $row["phoneNumber_cont"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="wid_contth=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../styles/contact.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-light bg-light justify-content-between">
      <a class="navbar-brand">Gestion de contact</a>
      <div class="form-inline d-flex">
        <a href="../includes/logout.inc.php" class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</a>
      </div>
    </nav>
  </div>
  <div class="container">
    <div class="row">
        <div class="">
            <div class="people-nearby">
            <?php
            $id = $_SESSION["userid"];
             $result = $conn->query("SELECT * FROM contact WHERE users_id = $id "); 
             ?>
  
  <div class="nearby-user">
<?php while($contact = mysqli_fetch_array($result)) { ?>
    <div class="row">
      <div class="col-md-2 col-sm-2">
        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user" class="profile-photo-lg">
      </div>
      <div class="col-md-7 col-sm-7">
        <h5><p href="#" class="profile-link"><?php echo $contact['fullName_cont'] ?><p></h5>
        <p><?php echo $contact['job_cont'] ?></p>
        <p class="text-muted"><?php echo $contact['phoneNumber_cont'] ?></p>
        <p class="text-muted"><?php echo $contact['fix_cont'] ?></p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <a name="delete" href="delete.php?delete=<?php echo $contact['id_cont']; ?>" class="btn btn-primary pull-right">Delete Contact</a>
                    <a href="editContact.pages.php?edit=<?php echo $contact['id_cont'] ?>" class="btn btn-primary pull-right">Edit Contact</a>
                  </div>
                </div>
              </div>
            <?php }?>

                </div>
              </div>
            </div>
    	</div>
	</div>
</div>

</body>
</html>