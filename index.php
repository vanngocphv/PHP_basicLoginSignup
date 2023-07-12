<?php 
    session_start();
    include("dbconnect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            function OnValidInput(){
                var username = document.form.username.value;
                var password = document.form.password.value;
                if (username == ''){
                    //alert("Username cannot be emptied, please check again!");
                    document.getElementById("usernameError").innerHTML = "*Please fill up this field";
                    return false;
                }
                else{
                    document.getElementById("usernameError").innerHTML = "";
                }
                var password = document.form.password.value;
                var password_again = document.form.password_again.value;
                if (password == ''){
                    document.getElementById("passwordError").innerHTML ="*Please fill up this field";
                    return false;
                }
                else{
                    document.getElementById("passwordError").innerHTML ="";
                }
            }
        </script>
    </head>

    <body>
        <?php
            //check temp message
            if ( isset($_COOKIE["temp-message"]) && !empty($_COOKIE["temp-message"])){
                echo "<span style='color:green'>{$_COOKIE["temp-message"]}</span>";
                unset($_COOKIE['temp-message']); 
                setcookie("temp-message", "", -1);
            }
        ?>
        <div>
            <h3>LOGIN PAGE!</h3>
        </div>
        <form name="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" onsubmit="return OnValidInput()">
            <lable>User Name:</lable> <br />
            <input type="Text" name="username" /> <br />
            <span id="usernameError" style="color:red"></span>  <br />
            <lable>Password:</lable> <br />
            <input type="Password" name="password"/> <br />
            <span id="passwordError" style="color:red"></span>  <br />
            <button type="submit" name="submit" value="submit">Login</button>
            <a href="signup.php">Sign Up</a>
        </form>
    </body>
    
</html>


<?php
//Active when call submit
    $username; $password;
    if (!empty($_POST["submit"])){
        //if the submit button has been clicked
        
        if(!empty($_POST["username"] && !empty($_POST["password"]))){
            $username = $_POST["username"];

            $sqlQuery = "SELECT password, reg_date FROM USER WHERE Username = '{$username}'";

            $result = mysqli_query($connectionString, $sqlQuery);
            $fetchResult = mysqli_fetch_assoc($result);
            
            if (mysqli_num_rows($result) > 0){
                if (password_verify($_POST["password"], $fetchResult["password"])){
                    $_SESSION["username"] = $username;
                    $_SESSION["login-status"] = true;
                    $_SESSION["register-date"] = $fetchResult["reg_date"];

                    header("location: home.php");
                }
            }
            else{
                echo "Login Failed";
            }

        }


    }
    if (!empty($_POST["signup"]))
        header("location: signup.php");

    mysqli_close($connectionString);
    
?>
