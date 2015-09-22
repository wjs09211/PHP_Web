<?php
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "member";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query('SET NAMES "UTF8"');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
    <center>
        <?php if($_SERVER['REQUEST_METHOD'] != "POST" ){
        ?>
        <form action="add.php" method="post" name="form1">
            account : <input type="text" name ="account1" /><br><br>
            password : <input type="password" name="password1" /><br><br>
            email : <input type="text" name="email1" /><br><br>
            phone : <input type="text" name="phone1" /><br><br>
            <input type="submit" value="submit" /><br><br>
        </form>
        <?php }else{
                  $account = $_POST['account1'];
                  $password = $_POST['password1'];
                  $email = $_POST['email1'];
                  $phone = $_POST['phone1'];
                  $stmt = $conn->prepare("INSERT INTO data (account, password, email, phone) VALUES (?, ?, ?, ?);");
                  $stmt->bind_param("ssss", $account, $email, $email, $phone);                     
                  $stmt->execute();
                  header('Location: index.php');
              } 
        ?>
    </center>
    </body>
</html>
<?php
$conn->close();
?>
