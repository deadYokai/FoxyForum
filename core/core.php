<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])){
    die(header('HTTP/1.1 403 Forbidden', true, 403));
}

require(dirname(__FILE__)."/config.php");
require_once dirname(__FILE__).'/yml.php';

$langYml = yamlLoader::yamlLoad(dirname(__FILE__).'/langs/'.Config::$lang.'.yml');
$langRank = $langYml['rank'];

$top = <<<HTML
<!DOCTYPE >
<html>
    <head>
        <title>FoxyForum</title>
        <link rel="stylesheet" href="/core/styles/main.css">
    </head>
    <body>
    <div class="top-wrapper">
        <div class="title">FoxyForum</div>
        <div class="member">
            <div class="mblock">
                <div class="micon">Icon</div>
                <div class="tinfo">
                    <div class="mname">deadYokai</div>
                    <div class="rank">$langRank[admin]</div>
                </div>
                <div class="arr"><span>></span></div>
            </div>
        </div>
    </div>   
HTML;

$bottom = <<<HTML
    
    <div class="bot-wrapper">
        <div class="copy">Powered by <a href="http://github.com/OneGameKoTT/FoxyForum" target="_blank">FoxyForum</a></div>
    </div>
    </body>
</html>
HTML;