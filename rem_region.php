<?php
    require_once 'config/parameter.php';
    require_once LAYOUT."header.php";
    require_once CLASSES."region.php";

    try {
        if (isset($_GET['ID']) && $_GET['ID'] > 0) {
            $region = new region((int)$_GET['ID']);
        } else {
            throw new Exception('Not defined region ID to remove.');
        }
    } catch (Exception $e) {
        echo "<br>".
        "<div class='alert alert-danger' role='alert'>
          Error: {$e->getMessage()}
        </div>";
        exit();
    }
?>

<h1 style="font-size: 20px; margin-top: 50px;">Do you want to remove the region?</h1>
<form method="post">
  <div class="form-group">
    <label for="RegionDescription">Region Description</label>
    <input type="text" class="form-control" id="RegionDescription" aria-describedby="RegionDescription" name="RegionDescription" value="<?php echo $region->RegionDescription ?>" disabled>
  </div>
  <button type="submit" class="btn btn-success" name="confirm">Confirm</button>
</form>

<?php
    if (isset($_POST['confirm'])) {
        try {
            $static = new staticRegion;
            $static->remove((int)$_GET['ID']);

            echo "<br>".
            "<div class='alert alert-success' role='alert'>
            Successfully removed region!
            </div>";
            exit();
        } catch (Exception $e) {
            echo "<br>".
            "<div class='alert alert-danger' role='alert'>
            Error removing region: {$e->getMessage()}
            </div>";
            exit();
        }
    }

    require_once LAYOUT."footer.php";
?>