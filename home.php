<?php 
    session_start();
    $title = "Homepage";
    include("./dbconnect.php");
?>

<!DOCTYPE html>
<html>
    <body>
        <div>
            <h3>User Information</h3>
            <div align="right">
                <button><a href="./SignUp.php">+</a></button>
            </div>
        </div>
        <table style="width: 100%; border: 1px solid black; border-collapse: collapse;">

            <tr>
                <th style="border: 1px solid black; border-collapse: collapse;">Username</th>
                <th style="border: 1px solid black; border-collapse: collapse;">Register Date</th>
                <th style="border: 1px solid black; border-collapse: collapse;">Status</th>
            </tr>

            <tr>
                <td style="border: 1px solid black; border-collapse: collapse;"><?php echo $_SESSION["username"] ?></td>
                <td style="border: 1px solid black; border-collapse: collapse;"><?php echo $_SESSION["register-date"] ?></td>
                <td style="border: 1px solid black; border-collapse: collapse;"><?php echo $_SESSION["login-status"] ?></td>
            </tr>

        </table>
    </body>
    
</html>

<?php
    
    
?>