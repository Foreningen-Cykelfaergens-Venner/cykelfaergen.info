<?
  $root = preg_replace('/\W\w+\s*(\W*)$/', '$1', $_SERVER["DOCUMENT_ROOT"]) . "/public_html";
  include($root . "/language/" . $region . "/footer.php");
?>