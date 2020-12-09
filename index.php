<?php
    require_once 'config/parameter.php';
    require_once LAYOUT."header.php";
    session_start();
?>
<div class="container">
<h1 style="font-size: 20px; margin-top: 50px;">Fill the blanks below to register your user</h1>
<form method="post" action="authentication.php">
    <div class="form_row">
        <div class="form-group col-md-3">
            <label for="Login">Login</label>
            <input type="text" class="form-control" id="Login" aria-describedby="Login" name="Login" placeholder="Insert your login here" required>
        </div>
        <div class="form-group col-md-3">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" aria-describedby="Password" name="Password" placeholder="Insert your password here" required>
        </div>
    </div>
    <button type="submit" class="btn btn-success" name="session">Confirm</button>
</form>

<?php
    require_once LAYOUT."footer.php";
?>