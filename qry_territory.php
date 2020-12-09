<?php
  require_once "./config/parameter.php";
  require_once LAYOUT."header.php";
  require_once LAYOUT."menu.php";
  require_once CLASSES."territory.php";
  require_once CLASSES."region.php";
?>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th style="width:10%" scope="col">#</th>
      <th style="width:10%" scope="col">ID</th>
      <th style="width:30%" scope="col">Territory Description</th>
      <th style="width:30%" scope="col">Region Description</th>
      <th style="width:20%" scope="col">Options</th>
    </tr>
  </thead>
  <tbody>

<?php
    try {
      $territory = new staticTerritory;
      $qryTerritory = $territory->getTerritory();

      $seq = 0;
    
      if ($qryTerritory) {
        foreach ($qryTerritory as $line) {
          $region = new region((int)$line['RegionID']);
          $seq++;
?>

<tr>
  <th scope="row"><?php echo $seq ?></th>
  <td><?php echo $line['TerritoryID'] ?></td>
  <td><?php echo $line['TerritoryDescription']?></td>
  <td><?php echo $region->RegionDescription?></td>
  <td>
      <a style="width:48%" class ="btn btn-primary" href="./edt_territory.php?ID=<?php echo $line['TerritoryID'] ?>">Edit</a>
      <a style="width:48%" class ="btn btn-danger" href="./rem_territory.php?ID=<?php echo $line['TerritoryID'] ?>">Remove</a>
  </td>
</tr>

<?php
        }
      }
    } catch (PDOException $PDOe) {
      echo 'SQL error :' . $PDOe->getMessage();
    }
?>

  </tbody>
</table>

<?php
    require_once LAYOUT."footer.php";
?>