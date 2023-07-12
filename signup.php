<?php 
    session_abort();
?>

<!DOCTYPE html>
<html>
    <head>
        <script type="text/javascript">
            function ValidateInput(){
                var username = document.form.username.value;
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
                if (password_again == ''){
                    document.getElementById("passwordAgainError").innerHTML = "*Please fill up this field";
                    return false;
                }
                else{
                    document.getElementById("passwordAgainError").innerHTML ="";
                }

                if (password != '' && password_again != '' && password != password_again){
                    //alert("Password doesn't match, please check again!");
                    document.getElementById("passwordError").innerHTML ="*Password doesn't match";
                    document.getElementById("passwordAgainError").innerHTML = "*Password doesn't match";
                    return false;
                }
                else{
                    document.getElementById("passwordError").innerHTML ="";
                    document.getElementById("passwordAgainError").innerHTML = "";
                }

                return true;
            }

        </script>
    </head>

    <body>
        <a href="index.php" >< Go back</a>
        <div>
            <h3>SIGN UP PAGE!</h3>
        </div>
        <form name="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" onsubmit="return ValidateInput()">
            <lable>User Name:</lable> <br />
            <input type="Text" name="username" /> <br />
            <span id="usernameError" style="color:red"></span>  <br />
            <lable>Password:</lable> <br />
            <input type="Password" name="password"/> <br />
            <span id="passwordError" style="color:red"></span>  <br />
            <lable>Input Password Again:</lable> <br />
            <input type="Password" name="password_again"/> <br />
            <span id="passwordAgainError" style="color:red"></span>  <br />
            <button type="submit" name="submit" value="submit">Sign Up</button>
        </form>


    </body>
</html>


<?php
//Active when call submit
    include("./dbconnect.php");
    $username; $password;
    
    if (!empty($_POST["submit"])){
        $username = $_POST["username"];

        //check if username has been exist
        $sql_query = "SELECT COUNT(*) FROM USER WHERE Username = '{$username}'";
        try{
            $result = mysqli_query($connectionString, $sql_query);
            if(mysqli_fetch_array($result)[0] > 0){
                echo "<script> alert('This username has been exist, please try to use new username'); </script>";
                return;
            }
        }
        catch(Exception $e){
            echo "<script> alert('Has exception in the processing, please try again'); </script>";
            return;
        }


        //run next for insert new user
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $sql_query = "INSERT INTO USER(Username, Password) VALUES('{$username}', '{$password}')";

        try{
            $result = mysqli_query($connectionString, $sql_query);
        }
        catch(Exception $e){
            echo "<script> alert('Has exception in the processing, please try again'); </script>";
            return;
        }

        setcookie("temp-message", "Signup successfully", time() + 30);
        header("location: index.php");
        
        
    }
    
?>