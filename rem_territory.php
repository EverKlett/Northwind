<?php
    require_once 'config/parameter.php';
    require_once LAYOUT."header.php";
    require_once CLASSES."territory.php";

    try {
        if (isset($_GET['ID']) && $_GET['ID'] > 0) {
            $territory = new territory((int)$_GET['ID']);
        } else {
            throw new Exception('Not defined territory ID to remove.');
        }
    } catch (Exception $e) {
        echo "<br>".
        "<div class='alert alert-danger' role='alert'>
          Error: {$e->getMessage()}
        </div>";
        exit();
    }
?>

<h1 style="font-size: 20px; margin-top: 50px;">Do you want to remove the territory?</h1>
<form method="post">
  <div class="form-group">
    <label for="TerritoryDescription">Terrotory Description</label>
    <input type="text" class="form-control" id="TerritoryDescription" aria-describedby="TerritoryDescription" name="TerritoryDescription" value="<?php echo $territory->TerritoryDescription ?>" disabled>
  </div>
  <button type="submit" class="btn btn-success" name="confirm">Confirm</button>
</form>

<?php
    if (isset($_POST['confirm'])) {
        try {
            $static = new staticTerritory;
            $static->remove((int)$_GET['ID']);

            echo "<br>".
            "<div class='alert alert-success' role='alert'>
            Successfully removed territory!
            </div>";
            exit();
        } catch (Exception $e) {
            echo "<br>".
            "<div class='alert alert-danger' role='alert'>
            Error removing territory: {$e->getMessage()}
            </div>";
            exit();
        }
    }

    require_once LAYOUT."footer.php";
?>