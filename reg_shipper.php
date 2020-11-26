<?php
  require_once 'config/parameter.php';
  require_once LAYOUT."header.php";
  require_once LAYOUT."menu.php";
  require_once CLASSES."shipper.php";
?>

<h1 style="font-size: 20px; margin-top: 50px;">Fill the blanks below to register a new shipper</h1>
<form method="post">
  <div class="form-group">
    <label for="CompanyName">Company name</label>
    <input type="text" class="form-control" id="CompanyName" aria-describedby="CompanyName" name="CompanyName" placeholder="Insert the company name here" required>
  </div>
  <div class="form-group">
    <label for="Phone">Phone</label>
    <input type="text" class="form-control" id="Phone" aria-describedby="Phone" name="Phone" placeholder="Insert the company phone here" required>
  </div>
  <button type="submit" class="btn btn-success" name="register">Confirm</button>
</form>

<?php
    if(isset($_POST['register'])) {
        $staticShipper = new staticShipper();
        $staticShipper->insert([$_POST['CompanyName'],
                                $_POST['Phone']]);
    }

    require_once LAYOUT."footer.php";
?>