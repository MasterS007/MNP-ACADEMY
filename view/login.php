<?php

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/all_designs/login.css">
    <title>login</title>
</head>
<body>

    <header>
          <nav>
              <ul class="navigation">
                  <li class="links"><a href="view/login.php">Login</a></li>
                  <li class="links"><a href="view/registration.html">Sign Up</a></li>
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
                        <td>User Name :</td>
                        <td><input type="text" name="userName"></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="password"></td>
                    </tr>
                    <tr>
                        <td colspan='2'>
                        <a href="forgotpass.html">Forgot Paswword?</a>
                        </td>
                    </tr>
               
                </table>
               
                <hr>
                <input  type="checkbox" name="checkRemember"><i class="RememberMe">Remember Me</i>
                <br><br>
                <input type="submit" name="submit" value="Login"> <a href="/registration.html">Register</a>
            </fieldset>
        </form>
      </main>

    <footer>

    </footer>
</body>
</html>

   
