<?php

class yamlLoader
{
    private $libyamlLoaded = false;

    private function spyc_init(){
        $path = dirname(__FILE__).'/plugins/';
        if (!file_exists($path)) {
            mkdir($path);
        }
        $out = $path.'spyc.php';
        if(!file_exists($out)){
            $curl = curl_init('https://raw.githubusercontent.com/mustangostang/spyc/master/Spyc.php');
            $fp = fopen($out, 'wb');
            curl_setopt($curl, CURLOPT_FILE, $fp);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_exec($curl);
            curl_close($curl);
            fclose($fp);
        }
    }    

    private function __construct(){
        //use Spyc(https://github.com/mustangostang/spyc) if libyaml not enabled
        if(!function_exists("yaml_parse")){
            $this->libyamlLoaded = false;
            $this->spyc_init();
        }else{
            $this->libyamlLoaded = true;
        }
    }

    private function _load($file){
        if($this->libyamlLoaded){
            return yaml_parse_file($file);
        }else{
            include("plugins/spyc.php");
            return Spyc::YAMLLoad($file);
        }
    }

    public static function yamlLoad($file){
        $s = new yamlLoader;
        return $s->_load($file);
    }

}