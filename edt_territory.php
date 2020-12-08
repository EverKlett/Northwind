<?php
    require_once 'config/parameter.php';
    require_once LAYOUT."header.php";
    require_once CLASSES."territory.php";
    require_once CLASSES."region.php";

    try {
        if (isset($_GET['ID']) && (int)$_GET['ID'] > 0) {
            $territory = new territory((int)$_GET['ID']);
            $region = new region((int)$territory->RegionID);
            $staticRegion = new staticRegion;
        } else {
            throw new Exception('Not defined territory ID to edit.');
        }
    } catch (Exception $e) {
        echo "<br>".
        "<div class='alert alert-danger' role='alert'>
          Error: {$e->getMessage()}
        </div>";
        exit();
    }
?>

<h1 style="font-size: 20px; margin-top: 50px;">Editing territory</h1>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="TerritoryDescription">Territory description</label>
            <input type="text" class="form-control" id="TerritoryDescription" aria-describedby="TerritoryDescription" name="TerritoryDescription" value="<?php echo trim($territory->TerritoryDescription) ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="RegionID">Region</label>
            <select id="RegionID" name="RegionID" class="form-control">
            <option value="<?php echo $region->RegionID ?>" selected><?php echo $region->RegionDescription ?></option>
            <?php
            $qry = $staticRegion->getRegions();

            foreach ($qry as $line) {
                    echo "<option value='{$line['RegionID']}'>{$line['RegionDescription']}</option>"; 
            }
            ?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="confirm">Confirm editing</button>
</form>

<?php
    if (isset($_POST['confirm'])) {
        try {
            $territory->update([$_POST['TerritoryDescription'],
                                $_POST['RegionID']]);
            
            header("Location:./qry_territory.php");
        } catch (Exception $e) {
            echo "<br>".
            "<div class='alert alert-danger' role='alert'>
            Error updating territory: {$e->getMessage()}
            </div>";
            exit();
        }
    }
    require_once LAYOUT."footer.php";
?>