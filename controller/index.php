<?php
$sql = "select unit, nama from kodeunit where deleted='no'";
$result = $con->query($sql);
require "view/index.view.php";
