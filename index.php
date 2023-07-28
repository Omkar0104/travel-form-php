<?php
$server = "localhost";
$username = "root";
$password = "";
$dbName = "trip";
$con = mysqli_connect($server,$username,$password,$dbName);
$insert = false;
if(!$con ){
    die("Connection to this database failed due to " . mysqli_connect_error());
   
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from $_POST superglobal
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $travel_date = $_POST["travel_date"];
    $gender = $_POST["gender"];
    $sql ="INSERT INTO `trip` ( `name`, `email`, `phone`, `date`, `gender`) VALUES ( '$name', '$email', '$phone', '$travel_date', '$gender')";
    if (mysqli_query($con, $sql)) {
    // echo "Data inserted successfully.";
    // flag for successful insertion
    $insert = true;
} else {
    echo "Error: " . mysqli_error($conn);
}
$con->close();
}
 
?>


<!DOCTYPE html>
<html>
<head>
  <title>Travel Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <form method="post" action="index.php">
      <h2>Welcome to College Trip to US Form</h2>
      <?php
      if($insert){
      echo '<p style="color: green; font-size: 14px;" class="submitMsg">Thanks For Submitting your form. We are happy to see you joining us for the US Trip</p>';
      }
      ?>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      
      <div class="form-group">
        <label for="destination">Phone:</label>
        <input type="tel" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <label for="travel_date">Travel Date:</label>
        <input type="date" id="travel_date" name="travel_date" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="male"> Male <input type="radio" name="gender" value="female"> Female
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>

</html>
