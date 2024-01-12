<?php

namespace WorldlangDict;

class Tags_controller {
    public static function addTags($config, $request, &$page)
    {
        $tags = yaml_parse_file($config->tag_location);            
        if (empty($request->arguments[0])) {
            // If the controller argument is empty, show all tags
            $defs = yaml_parse_file($config->basic_location . "{$config->lang}.yaml");
            $page->setTitle($config->getTrans('tags title'));
            include_once('views/tags_default_view.php');
            
        } else {
            // If the argument is set, determine if valid
            
            if (array_key_exists($request->arguments[0], $tags)) {
                // show valid tag
                $defs = yaml_parse_file($config->basic_location . "{$config->lang}.yaml");
                $tag = $request->arguments[0];
                $page->setTitle($tag . ' &mdash; ' . $config->getTrans('single tag view'));
                include_once('views/tags_display_view.php');
            } else {
                // 404 invalid tag requests
                throw new Error_404_exception("tag not found");
            }
        }
    }
}