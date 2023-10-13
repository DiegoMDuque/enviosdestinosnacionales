<?php

    class Template{

        public static function GetHeader($arr = array()) {
            $header = '<!DOCTYPE html>'."\n".'<html lang="es" class="js">'."\n".'<head>'."\n".
            Self::BaseHeader($arr) .
            '   <meta charset="'.charset.'">'."\n".
            '   '.self::MetaHeader('author','IMT Solution')."\n".
            '   '.self::MetaHeader('viewport','width=device-width, initial-scale=1, shrink-to-fit=no"')."\n".
            '   '.self::MetaHeader('description','')."\n".
            '   <link rel="icon" href="assets/img/favicon.png">'."\n".
            '   '. self::CSS('EnviosNacionales'). "\n" .
            '   '. self::CSS('EnviosNacionales-Theme'). "\n" .
            '   '. self::CSS('FontAwesome'). "\n" .
            '   '. self::TitleHeader($arr). "\n" .
            "</head>\n".
            '<body class="nk-body bg-white npc-general pg-auth">' . "\n" .
            '   <div class="nk-app-root">'. "\n" .
            '      <div class="nk-main ">'. "\n";

            echo $header;
        }
        private static function CSS ($doc, $id = '', $type = ''){
            return '<link id="'.$id.'" rel="stylesheet" type="'.$type.'" href="assets/css/' . $doc .'.css?ver='.VERSION.'"/>';
        }
        private static function JS ($doc, $id = '', $type = ''){
            return '<script id="'.$id.'" type="'.$type.'" src="assets/js/' . $doc .'.js?ver='.VERSION.'"></script>';
        }
        private static function dataJS ($doc, $id = '', $type = ''){
            return '<script id="'.$id.'" type="'.$type.'" src="lib/dataJS/' . $doc .'.js?ver='.VERSION.'"></script>';
        }
        public static function GetFoot(){
            $foot = '      </div>'. "\n" .
                    '   </div>'. "\n" .
                    '   '.self::JS('bundle', 'bundle','text/javascript') . "\n" .
                    '   '.self::JS('scripts', 'bundle-scrip', 'text/javascript') ."\n" .
                    '   '.self::JS('datatable-btns', 'datatable', 'text/javascript') ."\n" .
                    '   '.self::dataJS('scripts', 'dataJS', 'module') .
                    "\n</body>".
                    "\n</html>";

            echo $foot;
        }
        private static function BaseHeader($arr){
            if(isset($arr['base'])){
                return '<base href="'.$arr['base'].'">' . "\n";
            }
        }
        private static function MetaHeader($name, $content){
            return '<meta name="'.$name.'" content="'.$content.'">';
        }
        private static function TitleHeader($arr = array()){
            if(isset($arr['title'])){
                return '<title>'.COMPANY_NAME. ' | '.$arr['title'].'</title>';
            }else{
                return '<title>' . COMPANY_NAME . '</title>';
            }
        }
        public static function ShowClassJudgmentGet($class, $get){
            if($_GET[$get]){
                echo $class;
            }
        }
    }