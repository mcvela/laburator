<?php
$argument1 = $argv[1];
$pagina = file_get_contents('http://www.laburator.com/tripas/jb/rss_get.php?from='.$argument1);
exit;
?>
