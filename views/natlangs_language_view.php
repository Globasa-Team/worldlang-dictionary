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

<main id="natlangs_language">

<h1><?= $arg; ?></h1>
<p>Words that are taken from this language.</p>

<dl>
<? foreach($data as $term) { ?>

    <div>
        <dt><?=
            WorldlangDictUtils::makeLink(
                $config,
                'lexi/'.urlencode($term),
                $request,
                $term
            );?>
<? if (isset($dict[$term]['class']) && !empty($dict[$term]['class'])) : ?>
            
<? endif; ?>
        </dt>
        <dd>
            <span class="wordClass">(<a href="https://xwexi.globasa.net/<?=$config->lang;?>/gramati/lexiklase"><?=$dict[$term]['class'];?></a>)</span>
            <?=$dict[$term]['translation']?>
        </dd>
    </div>


<? } ?>
</dl>


</main>

<? require_once($config->templatePath . "partials/page-footer.php"); ?>

</body>

</html>
