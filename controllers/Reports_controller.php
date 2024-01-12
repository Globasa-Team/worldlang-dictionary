<?php

namespace WorldlangDict;

class Reports_controller
{
    public static function run($config, $request, $page)
    {
        $arg = isset($request->arguments[0]) ? $request->arguments[0] : '';

        // TODO: i18n
        $page->description = "Globasa reports";
        $page->title = "Reports";

        switch($arg) {
            case 'parse':
                $data = yaml_parse_file($config->api2Path.'reports/parse_report.yaml');
                require_once('views/reports_parse_view.php');
                break;
            case 'changelog':
                require_once('models/Changelog.php');
                $data = Changelog::recent_changes($config);
                require_once('views/reports_changelog_view.php');
                break;
            case '':
                require_once('views/reports_default_view.php');
                break;
            default:
                throw new Error_404_exception("Reports module not found.");
                break;
        }
    }
}
