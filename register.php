<?php include('server.php') ?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link href="resources/style.css" rel="stylesheet" type="text/css">
        <title>rEDUce - Register</title>
    </head>

    <body class="text-center loginbody">
        <!-- <div class="header">
            <h2>Register</h2>
        </div> -->

        <form class="form-signin" method="post" action="register.php">
            <img class="mb-4" src="./resources/images/logo.png" alt="" width="72" height="72">
            <?php include('errors.php'); ?>
            <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required
                autofocus>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required>
            <input type="text" id="inputCity" class="form-control" placeholder="Home City" name="city" required>
            <input type="text" id="inputState" class="form-control" placeholder="Home State" name="state" required>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password_1"
                required>
            <input type="password" id="inputPassword" class="form-control" placeholder="Repeat Password" name="password_2"
                required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="reg_user">Sign in</button>
            <p class="mt-5 mb-3 text-muted">2018</p>
        </form>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
        </script>
    </body>

</html>