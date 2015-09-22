<?php
require 'connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <center>            
        <table border="1" cellpadding="5" cellspacing="0" align="center">
            <tr>
                <th>ID</th><th>account</th><th>password</th><th>email</th><th>phone</th><th>reg_time</th>
            </tr>
            <?php
            if ( @$_REQUEST['page'] == null ){
                $page = 1;    
            }
            else{
                $page = $_REQUEST['page'];
            }
            echo "$page";
            $sql = 'SELECT * FROM data;';
            $result = $conn->query($sql);
            $num  = $result->num_rows;
            if( $num > 0 ){
                for( $i = 0 ; $i < 5*($page-1) ; $i++ ){
                    $row = $result->fetch_assoc();
                }
                $i = 0;
                while ( $row = $result->fetch_assoc() ){                    
                    echo '<tr>';
                    foreach( $row as $name => $value ){
                        echo '<td>' . $value . '</td>';
                    }
                    echo "<td> <input type='button' onclick=location.href='mod.php?id=".$row['id'] ."' value='mod'> </td>";
                    echo "<td> <input type='button' onclick=location.href='delete.php?id=".$row['id'] ."' value='delete'> </td>";
                    echo '</tr>';
                    $i++;
                    if( $i == 5 )
                        break;
                }
            }    
            ?>
        </table>
            <a href="add.php"> add </a><br>
            <?php
                if( $page == 1 ){
                    for ( $i = 1 ; $i <= ( $num )/5 +1; $i++ ){
                        echo '<a href="index.php?page='.$i.'">'. $i .'</a> ';
                        if ( $i > 5 )
                            break;
                    }
                }
                else{
                    for ( $i = 1 ; $i <= ( $num )/5 +1; $i++ ){
                        echo '<a href="index.php?page='.$i.'">'. $i .'</a> ';
                        if ( $i > 5 )
                            break;
                    }
                }
            ?>
        </center>
    </body>
</html>
<?php
$conn->close();
?>