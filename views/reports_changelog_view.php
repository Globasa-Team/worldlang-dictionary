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

<main id="changelog_report">

<h1>Change log</h1>
<p>Updates to the word list.</p>

<table>
<? foreach($data as $cur) { ?>
  <tr>
    <td><strong><?= $cur['term']; ?></strong><br/><?= $cur['type']; ?><br/><?= substr($cur['timestamp'], 0, 10); ?></td>
    <td><?= $cur['message']; ?></td>
  </tr>
<? } ?>
</table>

</main>

<? require_once($config->templatePath . "partials/page-footer.php"); ?>

</body>

</html>
