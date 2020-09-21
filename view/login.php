<?php
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/all_designs/login.css">
    <script type="text/javascript" src="../asset/js/logCheck.js"></script>
    <title>login</title>
</head>
<body>
   
    <header>
          <nav>
              <ul class="navigation">
                  <li class="links"><a href="login.php">Login</a></li>
                  <li class="links"><a href="registration.html">Sign Up</a></li>
              </ul>
          </nav>

    </header>

    <main>
        <form action="../php/logcheck.php" method="POST">
            <fieldset>
                <legend>LOGIN</legend>
                <br/>
               <table class="table1" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>User Name:</td>
                        <td><input id="uname" type="text" name="userName" onkeyup="uRemover()" onblur="ueMpty()" > </td>
                        <td><i id="unameMsg" style="color:red; font-size:10px;"></i></td>
                    </tr>
                    <tr> 
                        <td>Password :</td>
                        <td><input id="password" type="password" name="password" onkeyup="pRemover()" onblur="PeMpty()"></td>
                        <td><i id="passMsg" style="color:red; font-size:10px;"></i></td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                        <a href="forgotpass.html">Forgot Paswword?</a>
                        </td>
                    </tr>
               
                </table>
               
                <hr>
                <input  type="checkbox" name="checkRemember"><i class="RememberMe">Remember Me</i>
                <br><i style="font-size:10px; color:red;"> * For a month!</i>
                <br><br>
                <input type="submit" name="submit" value="Login"> <a href="registration.html">Register</a>
            </fieldset>
        </form>
      </main>

    <footer>

    </footer>
</body>
</html>

   
