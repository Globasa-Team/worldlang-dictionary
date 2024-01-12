<?php

namespace WorldlangDict;

// TODO: i18n
?>
<!doctype html>
<html class="no-js" lang="">
<? require_once($config->templatePath . "partials/html-head.php"); ?>
<body id="htmlBody">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

<? require_once($config->templatePath . "partials/page-header.php"); ?>

<main id="natlangs">

<h1><?=$config->getTrans('natlangs title');?></h1>


<ul>
<? foreach($data['source langs'] as $natlang=>$count) { ?>
  <li><strong><?= WorldlangDictUtils::makeLink($config, "natlangs/".$natlang, $request, $natlang); ?></a></strong> (<?= $count; ?>)</li>
<? } ?>
</ul>



</main>

<? require_once($config->templatePath . "partials/page-footer.php"); ?>

</body>

</html>
        
