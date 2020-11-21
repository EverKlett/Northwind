<?php
    require_once '../config/parameter.php';
    require_once LAYOUT."header.php";
    require_once LAYOUT."menu.php";

    echo "<p>Hello World</p>";

    $shipper = new staticShipper;

    $qryShippers = $shipper->GetShippers();
?>

<div class="container">
  <div class="row">
    <div class="col">
      1 of 3
    </div>
    <div class="col">
      2 of 3
    </div>
    <div class="col">
      3 of 3
    </div>
  </div>
</div>

<?php
    require_once LAYOUT."footer.php";
?>