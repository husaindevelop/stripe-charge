<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <h1>Register</h1>

    <?php
    foreach ($errors->all () as $error)
    {
    echo $error."<br>";
    
    }
    ?>
<form  action="{{ route ('registerPost') }}"  method="post">
@csrf
    <!-- Name -->
    <label for="name">Name</label>
    <input type="text" name="name" id="name"  />

    <!-- Email-->
    <label for="email">Email</label>
    <input type="email" name="email" id="email"  />

    <!-- Password -->
    <label for="password">Password</label>
    <input type="password" name="password" id="password"  />

    <!-- Confirm password -->
    <label for="password_confirmation">Confirm password</label>
    <input type="password" name="password_confirmation"  id="password_confirmation" />

    <!-- Submit button -->
    <button type="submit">Register</button>
</form>
    </body>
</html>