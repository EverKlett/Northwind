<?php
    require_once 'config/parameter.php';
    require_once LAYOUT."header.php";
    require_once CLASSES."shipper.php";

    try {
        if (isset($_GET['ID']) && (int)$_GET['ID'] > 0) {
            $shipper = new shipper((int)$_GET['ID']);
        } else {
            throw new Exception('Not defined shipper ID to edit.');
        }
    } catch (Exception $e) {
        echo "<br>".
        "<div class='alert alert-danger' role='alert'>
          Error: {$e->getMessage()}
        </div>";
        exit();
    }
?>

<h1 style="font-size: 20px; margin-top: 50px;">Editing shipper</h1>
<form method="POST">
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="CompanyName">Company name</label>
            <input type="text" class="form-control" id="CompanyName" aria-describedby="CompanyName" name="CompanyName" value="<?php echo $shipper->CompanyName ?>">
        </div>
        <div class="form-group col-md-4">
            <label for="Phone">Phone</label>
            <input type="text" class="form-control" id="Phone" aria-describedby="Phone" name="Phone" value="<?php echo $shipper->Phone ?>">
        </div>
    </div>
    <button type="submit" class="btn btn-primary" name="confirm">Confirm editing</button>
</form>

<?php
    if (isset($_POST['confirm'])) {
        try {
            $shipper->update([$_POST['CompanyName'], $_POST['Phone']]);
            
            header("Location:./qry_shipper.php");
        } catch (Exception $e) {
            echo "<br>".
            "<div class='alert alert-danger' role='alert'>
            Error updating shipper: {$e->getMessage()}
            </div>";
            exit();
        }
    }
    require_once LAYOUT."footer.php";
?>