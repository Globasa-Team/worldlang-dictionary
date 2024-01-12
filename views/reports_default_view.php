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

<main id="features">

<h1><?=$config->getTrans('tools button');?></h1>


<section>
    <header>
        <h2><a href="<?=WorldlangDictUtils::makeUri($config, 'reports/parse', $request);?>"><?=$config->getTrans('report parse title');?></a></h2>
    </header>
    <p><?=$config->getTrans('report parse description');?></p>
</section>

</main>

<? require_once($config->templatePath . "partials/page-footer.php"); ?>

</body>

</html>
        
