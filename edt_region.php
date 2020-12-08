<?php
    require_once 'config/parameter.php';
    require_once LAYOUT."header.php";
    require_once CLASSES."region.php";

    try {
        if (isset($_GET['ID']) && (int)$_GET['ID'] > 0) {
            $region = new region((int)$_GET['ID']);
        } else {
            throw new Exception('Not defined region ID to edit.');
        }
    } catch (Exception $e) {
        echo "<br>".
        "<div class='alert alert-danger' role='alert'>
          Error: {$e->getMessage()}
        </div>";
        exit();
    }
?>

<h1 style="font-size: 20px; margin-top: 50px;">Editing region</h1>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="RegionDescription">Region description</label>
            <input type="text" class="form-control" id="RegionDescription" aria-describedby="RegionDescription" name="RegionDescription" value="<?php echo trim($region->RegionDescription) ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="confirm">Confirm editing</button>
</form>

<?php
    if (isset($_POST['confirm'])) {
        try {
            $region->update([$_POST['RegionDescription']]);
            
            header("Location:./qry_region.php");
        } catch (Exception $e) {
            echo "<br>".
            "<div class='alert alert-danger' role='alert'>
            Error updating region: {$e->getMessage()}
            </div>";
            exit();
        }
    }
    require_once LAYOUT."footer.php";
?>