<?php
require 'connect.php';
$sql = "SELECT * FROM data WHERE id=". $_REQUEST['id'];
$result = $conn->query($sql);
if ( $result->num_rows == 1 ){
    $row = $result->fetch_assoc();
}
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
        <form action="<?php echo "mod.php?id=".$_REQUEST[id] ?>" method="post" name="form1">
            account : <input type="text" name ="account1" value="<?php echo $row['account'];?>" /><br><br>
            password : <input type="password" name="password1" /><br><br>
            email : <input type="text" name="email1" value="<?php echo $row['email'];?>" /><br><br>
            phone : <input type="text" name="phone1" value="<?php echo $row['phone'];?>" /><br><br>
            <input type="submit" value="submit" /><br><br>
        </form>
        <?php }else{
                  $account = $_POST['account1'];
                  $password = $_POST['password1'];
                  $email = $_POST['email1'];
                  $phone = $_POST['phone1'];
                  $stmt = $conn->prepare("UPDATE data SET account=?, password=?, email=?, phone=? WHERE id = ?;");
                  $stmt->bind_param("ssssi", $account, $email, $email, $phone, $_REQUEST[id]);                     
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