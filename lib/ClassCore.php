<?php


    class Core {

        function __construct(){
            $config = self::getconfig();
            $this->extra_kilo_cost  = $config->extra_kilo_cost;
            $this->first_kilo_cost  = $config->first_kilo_cost;
            $this->seguro           = $config->seguro;
            $this->maximo_asegurado = $config->maximo_asegurado;
            $this->manejo_fijo      = $config->manejo_fijo;
            $this->iva              = $config->iva;
        }
        public static function UpdateGeneralConfig(){
            foreach($_POST as $key => $val){
                $_POST[$key] = noCurrency($val);
            }
            $data = self::retrumOBJ($_POST);

            query("UPDATE config SET 
                extra_kilo_cost  = '$data->extra_kilo_cost',
                first_kilo_cost  = '$data->first_kilo_cost',
                seguro           = '$data->seguro',
                maximo_asegurado = '$data->maximo_asegurado',
                manejo_fijo      = '$data->manejo_fijo',
                iva              = '$data->iva' WHERE 1"
            );
        }
    
        private static function getconfig(){
            $config = query("SELECT * FROM config");

            return $config;
        }
        public static function HTMLComent($id, $type = ''){
            switch($type){
                case 'end':
                    return '<!--' . $id . ' @end-->';
                    break;
                default:
                    return '<!--' . $id . ' @start-->';
            }
        }
        public static function json($arr = ''){
            if(is_array($arr)){
                print(json_encode($arr));
            }else{
                print(json_encode(array('success' => true)));
            }
        }
        public static function RequiereInc($path){
            return 'inc/'. $path . '.php';
        }
        public static function SidebarMenuGrupItem(){
            $headig = query("SELECT item_grup as grup FROM sidebar_menu WHERE status = 1 GROUP BY item_grup", 'ALL');
            return $headig;
        }
        
        public static function SidebarMenuElementItem($type = 'item', $grup = '%'){
            $item = query("SELECT * FROM sidebar_menu WHERE status = 1 and type = '$type' and item_grup LIKE '$grup' ORDER BY orden ASC", 'ALL');
            return $item;
        }
        public static function DataraFrom($key , $msg = ''){
            return (object) array('key' => $key, 'msg' => $msg);
        }
        public static function ValidateForm($arr = array()){
            $error['error'] = array();
            

            foreach($arr as $post){
                if(!empty($post->msg)){
                    $msg   = $post->msg;
                }else{
                    $msg   = 'Campo no puede quedar vacio';
                }
                if(empty($_POST[$post->key])){
                    array_push($error['error'], array('key' => $post->key, 'msg' => $msg));
                }
            }
            return $error;
        }
        public static function PASSWORD_ENCRIT($pass){
            $password = password_hash($pass, PASSWORD_DEFAULT, array('cost' => 12));

            return $password;
        }

        public static function retrumOBJ($arr){
            
            $obj = new ArrayObject($arr);
            $obj->setFlags(ArrayObject::ARRAY_AS_PROPS);
            
            return $obj;
        }
        
        public static function GetTypePackBySelec2(){
            $result['results'] = array();
    
            $text = '';
    
            if(isset($_POST['text'])){
                $text = $_POST['text'];
            }
    
            $typePack = query("SELECT type_name AS id, type_name as text  FROM packages_type WHERE type_status = 1 AND  type_name LIKE '$text%' limit 6", 'ALL');
        
            foreach($typePack as $val){
                array_push($result['results'], array('id' => $val->id, 'text' =>  $val->text));
            }
            Core::json($result);
        }
        public static function GetCityById($id){

            $city = query("SELECT ciudad_name AS name FROM ciudades WHERE ciudad_id = '$id'");

            return $city;
        }
        public static function GetCityAll(){
            $data  = array();
            $city = query("SELECT *FROM ciudades", 'ALL');

            foreach($city as $val){
                $arr = (object) array(
                    'id'     => $val->ciudad_id,
                    'name'   => $val->ciudad_name,
                    'envio'  => $val->ciudad_status_envio,
                    'pasaje' => $val->ciudad_status_pasaje,
                );
                array_push($data, $arr);
            }
            return $data;
        }
        public static function checked($val){
            if($val == 1){
                return 'checked';
            }
        }
        public static function GetTypePackAll(){
    
            $typePack = query("SELECT type_id as id, type_name as name, type_status AS status FROM packages_type", 'ALL');
            
            return $typePack;
        }
        public static function deleteTypePack(){

            $id = $_POST['type_pack_id'];

            $typePack = query("DELETE FROM packages_type WHERE type_id = '$id'");
            
            return $typePack;
        }
        public static function updateStatusTypePack(){

            $data = Core::retrumOBJ($_POST);

            $typePack = query("UPDATE packages_type SET type_status = '$data->val' WHERE type_id = '$data->id_type_pack'");
            
            return $typePack;
        }
        public static function addTypePack(){
            $name = $_POST['type_pack_name'];
            if(!empty($name)){
                query("INSERT INTO packages_type ( type_name ) VALUES ('$name')");
            }
        }
        public static function GetCompanyCurierSelec2(){
            $result['results'] = array();
    
            $text = '';
    
            if(isset($_POST['text'])){
                $text = $_POST['text'];
            }
    
            $typePack = query("SELECT curier_name AS id, curier_name as text  FROM company_curier WHERE curier_status = 1 AND  curier_name LIKE '$text%' limit 6", 'ALL');
        
            foreach($typePack as $val){
                array_push($result['results'], array('id' => $val->id, 'text' =>  $val->text));
            }
            Core::json($result);
        }

        public static function settingsOptions(){
            $Option = query("SELECT * FROM settings_options", 'ALL');

            return $Option;
        }

        public static function GenerateBarcode($str){
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();

            $barcode = 'temp/barcode/' . md5($str) .'.png';
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            file_put_contents($barcode, $generator->getBarcode($str, $generator::TYPE_CODE_128, 3, 50, [0,0,0]));
    
            $barcode = URL . $barcode;

            return $barcode;
        }

        public static function GenerateQR($str){
            $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
            $PNG_WEB_DIR = 'temp/';

            $filename = $PNG_TEMP_DIR.'test.png';
            $errorCorrectionLevel = 'H';    
            $matrixPointSize = 10;
            $data = $str;
        
            $namefile = 'test'.md5($data).'.png';
            $filename = 'temp/qr/'. $namefile;
            QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
        
            $qr = URL . 'temp/qr/' . $namefile;

            return $qr;
        }

        public static function PrintPDF($data, $filename, $margin = array()){
            $mpdf = new \Mpdf\Mpdf($margin);
            $mpdf->WriteHTML($data);
            $mpdf->Output($filename . '.pdf', 'I');
        }

    }