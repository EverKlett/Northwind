<?php
  require_once 'config/parameter.php';
  require_once LAYOUT."header.php";
  require_once CLASSES."region.php";
?>

<h1 style="font-size: 20px; margin-top: 50px;">Fill the blanks below to register a new region</h1>
<form method="post">
  <div class="form-group">
    <label for="RegionDescription">Region Description</label>
    <input type="text" class="form-control" id="RegionDescription" aria-describedby="RegionDescription" name="RegionDescription" placeholder="Insert the region description here" required>
  </div>
  <button type="submit" class="btn btn-success" name="register">Confirm</button>
</form>

<?php
    if(isset($_POST['register'])) {
      try {
        $staticRegion = new staticRegion();
        $staticRegion->insert(
          $_POST['RegionDescription']);
        
        echo "<br>".
        "<div class='alert alert-success' role='alert'>
          Region successfully included!
        </div>";
      } catch (PDOException $e) {
        echo "<br>".
        "<div class='alert alert-danger' role='alert'>
          Error including region: {$e->getMessage()}
        </div>";
      }
        
    }

    require_once LAYOUT."footer.php";
?>