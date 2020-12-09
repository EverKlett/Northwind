<?php
  require_once "./config/parameter.php";
  require_once LAYOUT."header.php";
  require_once LAYOUT."menu.php";
  require_once CLASSES."region.php";
?>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th style="width:10%" scope="col">#</th>
      <th style="width:10%" scope="col">ID</th>
      <th style="width:60%" scope="col">Region Description</th>
      <th style="width:20%" scope="col">Options</th>
    </tr>
  </thead>
  <tbody>

<?php
    try {
      $region = new staticRegion;
      $qryRegion = $region->getRegions();

      $seq = 0;
    
      if ($qryRegion) {
        foreach ($qryRegion as $line) {
          $seq++;
?>

<tr>
  <th scope="row"><?php echo $seq ?></th>
  <td><?php echo $line['RegionID'] ?></td>
  <td><?php echo $line['RegionDescription']?></td>
  <td>
      <a style="width:48%" class ="btn btn-primary" href="./edt_region.php?ID=<?php echo $line['RegionID'] ?>">Edit</a>
      <a style="width:48%" class ="btn btn-danger" href="./rem_region.php?ID=<?php echo $line['RegionID'] ?>">Remove</a>
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