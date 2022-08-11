<?php

if(isset($_GET['forum']) and !isset($_GET['topic'])){

}elseif(!isset($_GET['forum']) and isset($_GET['topic'])){

}else{
    die(header('HTTP/1.1 403 Forbidden', true. 403));
}
