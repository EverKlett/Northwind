<?php
    require_once 'config/parameter.php';
    require_once LAYOUT."header.php";
    require_once CLASSES."shipper.php";

    try {
        if (isset($_GET['ID']) && $_GET['ID'] > 0) {
            $shipper = new shipper((int)$_GET['ID']);
        } else {
            throw new Exception('Not defined shipper ID to remove.');
        }
    } catch (Exception $e) {
        echo "<br>".
        "<div class='alert alert-danger' role='alert'>
          Error: {$e->getMessage()}
        </div>";
        exit();
    }
?>

<h1 style="font-size: 20px; margin-top: 50px;">Do you want to remove the shipper?</h1>
<form method="post">
  <div class="form-group">
    <label for="CompanyName">Company name</label>
    <input type="text" class="form-control" id="CompanyName" aria-describedby="CompanyName" name="CompanyName" value="<?php echo $shipper->CompanyName ?>" disabled>
  </div>
  <button type="submit" class="btn btn-success" name="confirm">Confirm</button>
</form>

<?php
    if (isset($_POST['confirm'])) {
        try {
            $static = new staticShipper;
            $static->remove((int)$_GET['ID']);

            echo "<br>".
            "<div class='alert alert-success' role='alert'>
            Successfully removed shipper!
            </div>";
            exit();
        } catch (Exception $e) {
            echo "<br>".
            "<div class='alert alert-danger' role='alert'>
            Error removing shipper: {$e->getMessage()}
            </div>";
            exit();
        }
    }

    require_once LAYOUT."footer.php";
?>