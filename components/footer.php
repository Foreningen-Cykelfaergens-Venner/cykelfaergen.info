<?php
  /* $root = preg_replace('/\W\w+\s*(\W*)$/', '$1', $_SERVER["DOCUMENT_ROOT"]) . "/public_html"; */
  $root = $_SERVER["DOCUMENT_ROOT"];
  include($root . "/language/" . $region . "/footer.php");
?>