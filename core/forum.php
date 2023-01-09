<?php

require(dirname(__FILE__)."/core.php");

if(isset($_GET['forum']) and !isset($_GET['topic'])){
    $content = <<<HTML
    $top
    <div class="content-wrapper">
        <div class="content">
            <div class="tree">
                <ul>
                    <li><a href="/">$langYml[home]</a></li>
                    <li><a href="#">Category one</a></li>
                </ul>
            </div>
            <div class="cblock">
                <div class="bcat">
                    <div class="title">Category one</div>
                    <div class="bcatc">
                        <div class="tname">
                            <div class="bcatci">Icon</div>
                            <div class="subd">
                                <span>Offtop</span>
                                <div class="tsubcat">
                                    <a href="#" class="tsubcata">DRM</a>
                                    <a href="#" class="tsubcata">Foxies</a>
                                    <a href="#" class="tsubcata">Dogs</a>
                                    <a href="#" class="tsubcata">Cats</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bcatc">
                        <div class="tname">
                            <div class="bcatci">Icon</div>
                            <div class="subd">
                                <span>Offtop</span>
                                <div class="tsubcat">
                                    <a href="#" class="tsubcata">DRM</a>
                                    <a href="#" class="tsubcata">Foxies</a>
                                    <a href="#" class="tsubcata">Dogs</a>
                                    <a href="#" class="tsubcata">Cats</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    $bottom
    HTML;
    echo $content;
}elseif(!isset($_GET['forum']) and isset($_GET['topic'])){
    $content = <<<HTML
    $top
    <div class="content-wrapper">
        <div class="content">
            <div class="tree">
                <ul>
                    <li><a href="/">$langYml[home]</a></li>
                    <li><a href="#">Category one</a></li>
                    <li><a href="#">Offtop</a></li>
                    <li><a href="#">DRM</a></li>
                    <li><a href="#">Steam</a></li>
                </ul>
            </div>
            <div class="cblock">
                <div class="btopic">
                    <div class="theader">
                        <div class="title"></div>
                        <div class="btn-create-post">Write answer</div>
                    </div>
                    <div class="tmsg">
                        <div class="leftblock">
                            <div class="member">
                                <div class="mblock">
                                    <div class="msblock">
                                        <div class="micon">Icon</div>
                                        <div class="tinfo">
                                            <div class="mname">deadYokai</div>
                                            <div class="rank">$langRank[admin]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="msg">Example message</div>
                            <div class="msg-bottom">
                                <div class="datetime">11.08.22 22:13</div>
                                <div class="msgnum">Message: <a href="#">#1</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="tmsg">
                        <div class="leftblock">
                            <div class="member">
                                <div class="mblock">
                                    <div class="msblock">
                                        <div class="micon">Icon</div>
                                        <div class="tinfo">
                                            <div class="mname">deadYokai</div>
                                            <div class="rank">$langRank[admin]</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="msg">Example message 2</div>
                            <div class="msg-bottom">
                                <div class="datetime">11.08.22 22:13</div>
                                <div class="msgnum">Message: <a href="#">#2</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    $bottom
    HTML;
    echo $content;
}else{
    die(header('HTTP/1.1 403 Forbidden', true. 403));
}
