<?php
namespace WorldlangDict;
?>
<!doctype html>
<html class="no-js" lang="">
<? require_once($config->templatePath . "partials/html-head.php"); ?>
<body id="htmlBody">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

<? require_once($config->templatePath . "partials/page-header.php"); ?>

<main id="content">

<h1>Globasa Stats</h1>
<div class="flexy" style="display:flex; flex-direction: row; gap: 2em;">


<!--Lang count-->
<section>
<table>
  <thead>
    <tr><th>Language</th><th>Words</th></tr>
  </thead>
<?php
foreach($stats['source langs'] as $lang=>$count) {?>
    <tr><td><?=$lang?></td><td><?=$count?></td></tr>
<?}?>
</table>
</section>


<section style="display:flex; flex-direction: column; gap:2em;">


<p><?=$stats['terms count']?> dictionary entries</p>


<!--Word categoy (affix, etc)-->
<table>
  <thead>
    <tr><th>Word Category</th><th>Words</th></tr>
  </thead>
  <tbody>
<?php
foreach($stats['categories'] as $name=>$count) {?>
    <tr><td><?=$name?></td><td><?=$count?></td></tr>
<?}?>
</tbody>
</table>

</section>
</div> <!--/flexy-->

</main>

<? require_once($config->templatePath . "partials/page-footer.php"); ?>

</body>

</html>
