<?php
  require_once 'config/parameter.php';
  require_once LAYOUT."header.php";
  require_once LAYOUT."menu.php";
  require_once CLASSES."shipper.php";
?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Company Name</th>
      <th scope="col">Phone</th>
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
          echo ("<tr><th scope='row'>". $seq ."</th>
          <td>". $line['ShipperID'] ."</td>
          <td>". $line['CompanyName'] ."</td>
          <td>". $line['Phone'] ."</td></tr>");
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