<?php
  require_once "./config/parameter.php";
  require_once LAYOUT."header.php";
  require_once LAYOUT."menu.php";
  require_once CLASSES."shipper.php";
?>

<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th style="width:10%" scope="col">#</th>
      <th style="width:10%" scope="col">ID</th>
      <th style="width:30%" scope="col">Company Name</th>
      <th style="width:30%" scope="col">Phone</th>
      <th style="width:20%" scope="col">Options</th>
    </tr>
  </thead>
  <tbody>

<?php
    try {
      $shipper = new staticShipper;
      $qryShippers = $shipper->getShippers();

      $seq = 0;
    
      if ($qryShippers) {
        foreach ($qryShippers as $line) {
          $seq++;
?>

<tr>
  <th scope="row"><?php echo $seq ?></th>
  <td><?php echo $line['ShipperID'] ?></td>
  <td><?php echo $line['CompanyName']?></td>
  <td><?php echo $line['Phone']?></td>
  <td>
      <a style="width:48%" class ="btn btn-primary" href="./edt_shipper.php?ID=<?php echo $line['ShipperID'] ?>">Edit</a>
      <a style="width:48%" class ="btn btn-danger" href="./rem_shipper.php?ID=<?php echo $line['ShipperID'] ?>">Remove</a>
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