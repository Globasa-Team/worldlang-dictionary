<?php
namespace WorldlangDict;

class Word_controller
{
    public static function output_entry($config, $request, &$page)
    {
        if (!isset($request->arguments[0])) {
            self::randomWord($config, $request, $page);
        }
        
        $term = strtolower($request->arguments[0]);
        $file = $config->api2Path.'terms/'.$term.'.yaml';
        if (!file_exists($file)) throw new Error_404_Exception("Entry Not Found");
        $entry = yaml_parse_file($file);

        $page->setTitle($entry['term']);
        
        include("views/entry_view.php");
        
    }
    
    /**
     * Show reverse lookup. Eg, searching ENG: child.
     */
    public static function addNatWord($config, $request, $lang, &$page)
    {
        if (!file_exists($config->search_terms_location.$lang.".yaml")) {
            throw new Error_404_Exception("Language not availble");
        }
        $search_terms = yaml_parse_file($config->search_terms_location.$lang.".yaml");

        $term = isset($request->arguments[0]) ? $request->arguments[0] : null;

        if (is_null($term)) {
            WorldlangDictUtils::redirect($config, $request, "");
        }
        if (!isset($search_terms[$term])) {
            throw new Error_404_Exception("Word not found");
        }
        $page->setTitle($term.': '.$config->getTrans('natlang search title bar'));
        $results = &$search_terms[$term];
        // SearchView::results($config, $search_terms[$term], 'glb', $request, $page);
        require_once("views/search_results_view.php");
    }


    public static function getWordList($config, $request, $listLang, &$page)
    {
        $list = [];
        if ($listLang == $config->worldlang) {
            // NOTE Should this be in the Word class?
            foreach ($config->dictionary->words as $word=>$wordData) {
                $list[strtolower($word)] = new Word($config, $wordData);
            }
        } else {
            // NOTE Should this be in the Word class?
            foreach ($config->dictionary->index as $word=>$wordData) {
                $wLWords = explode(',', $wordData);
                if (sizeof($wLWords)==1) {
                    $this->list[$word] = new Word($config, $config->dictionary[$config->worldlang][$wLWords[0]]);
                } else {
                    foreach ($wLWords as $wLWord) {
                        $this->list[$word][$glbWord] = new Word($config, $config->dictionary[$config->worldlang][trim($wLWord)]);
                    }
                }
            }
        }

        $page->setTitle($config->getTrans('all words button'));
        WordListView::addList($config, $request, $list, $page);
    }

    public static function randomWord($config, $request, &$page)
    {
        $index = yaml_parse_file($config->min_location.$config->lang.".yaml");
        $wordIndex = array_rand($index);
        WorldlangDictUtils::redirect($config, $request, "lexi/".$wordIndex);
        // WordController::addEntry($config, $request, $wordIndex, $page);
        // $page->setTitle("Random word");
    }
}
