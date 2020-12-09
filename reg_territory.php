<?php
  require_once 'config/parameter.php';
  require_once LAYOUT."header.php";
  require_once LAYOUT."menu.php";
  require_once CLASSES."territory.php";
  require_once CLASSES."region.php";

  $staticRegion = new staticRegion;

?>

<h1 style="font-size: 20px; margin-top: 50px;">Fill the blanks below to register a new territory</h1>
<form method="post">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="TerritoryDescription">Territory description</label>
      <input type="text" class="form-control" id="TerritoryDescription" aria-describedby="TerritoryDescription" name="TerritoryDescription" placeholder="Insert the territory description here" required>
    </div>
    <div class="form-group col-md-4">
        <label for="RegionID">Region</label>
        <select id="RegionID" name="RegionID" class="form-control">
          <option selected>Region</option>
<?php
  $qry = $staticRegion->getRegions();

  foreach ($qry as $line) {
    echo "<option value='{$line['RegionID']}' >{$line['RegionDescription']}</option>"; 
  }
?>
        </select>
      </div>
    </div>
  <button type="submit" class="btn btn-success" name="register">Confirm</button>
</form>

<?php
    if(isset($_POST['register'])) {
      try {
        $staticTerritory = new staticTerritory();

        $array = array(
          'TERRITORYDESCRIPTION' => $_POST['TerritoryDescription'],
          'REGIONID' => $_POST['RegionID']
        );

        $staticTerritory->insert($array);
        
        echo "<br>".
        "<div class='alert alert-success' role='alert'>
        Territory successfully included!
        </div>";
      } catch (PDOException $e) {
        echo "<br>".
        "<div class='alert alert-danger' role='alert'>
          Error including territory: {$e->getMessage()}
        </div>";
      }
        
    }

    require_once LAYOUT."footer.php";
?>