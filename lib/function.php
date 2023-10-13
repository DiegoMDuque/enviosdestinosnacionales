<?php

    function input($param = array()){
        
        $arr = array(
            'type'         => 'text',
            'col'          => '6',
            'name'         => '',
            'id'           => '',
            'label'        => '',
            'icon'         => '',
            'classInput'   => '',
            'classSelect'  => '',
            'classCol'     => '',
            'placeholder'  => '',
            'value'        => '',
            'option'       => array(),
            'argument'     => array(),
        );

        $option   = '';
        $argument = '';
        $icon     = '';
        $label    = '';

        

        foreach($param as $key => $val){
            $arr[$key] = $val;
        }
        foreach ($arr['argument'] as $argumentValue) {
            $argument .= $argumentValue .' ';
        }

        foreach($arr['option'] as $options){
            $default = '';
            $disabled = '';
            if(isset($options->val) and isset($options->text)){
                if(isset($options->default)){
                    $default = 'selected';
                }
                if(isset($options->disabled)){
                    $disabled = 'disabled';
                }
                $option .='<option '.$default.' '.$disabled.' value="'.$options->val.'">'.$options->text.'</option>'."\n";
            }
        }
        if($arr['label']){
            $label    = '<label class="form-label" id="'.$arr['id'].'_label" for="'.$arr['id'].'">'.$arr['label'].'</label>';
        }

        if(is_array($arr['icon'])){
            if(isset($arr['aling'])){
                if($arr['aling'] == 'left'){
                    $aling = 'left';
                }else{
                    $aling = 'right';
                }
                
            }else{
                $aling = 'left';
            }
            $icon = '<div class="form-icon form-icon-'.$aling.'">
                        <em class="icon '.$arr['icon']['icon'].'"></em>
                    </div>';
        }

        $input = '<div class="col-sm-'.$arr['col'].' '. $arr['classCol'] .'">
                    <div class="form-group">
                        '.$label.'
                        <div class="form-control-wrap">
                            '.$icon.'
                            <input type="'.$arr['type'].'" name="'.$arr['name'].'" id="'.$arr['id'].'" class="form-control '.$arr['classInput'].'" placeholder="'.$arr['placeholder'].'" value="'.$arr['value'].'" '. $argument .'>
                        </div>
                    </div>
                </div>';
        $select = '<div class="col-sm-'.$arr['col'].'">
                        <div class="form-group">
                            <label class="form-label" for="'.$arr['id'].'">'.$arr['label'].'</label>
                            <div class="form-control-wrap">
                                '.$icon.'
                                <select  name="'.$arr['name'].'" id="'.$arr['id'].'" class="form-select '.$arr['classSelect'].'" placeholder="'.$arr['placeholder'].'" '. $argument .'>
                                    '.$option.'
                                </select>
                            </div>
                        </div>
                    </div>';
        switch($arr['type']){
            default: echo $input;
                break;

            case 'select': echo $select;
                break;
        }
    }

    function currency($amount){
        $amount = str_replace(' ', '', $amount);
        return '$ ' . number_format($amount,2,',','.');
    }
    function noCurrency($amount){

        $amount = str_replace('$', '', $amount);
        $amount = str_replace('.', '', $amount);
        $amount = str_replace(',', '.', $amount);
        $amount = str_replace(' ', '', $amount);
        $amount = preg_replace('([^0-9.])', '', $amount);

        return $amount;
    }
    function usCal($get, $default = ''){

        if(isset($_GET['calculadora'])){

            if(isset($_GET[$get])){
                echo $_GET[$get];
            }else{
                echo $default;
            }
        }else{
            echo $default;
        }
    }
    function usGET($sentencia, $get, $default = ''){

        if(isset($_GET[$sentencia])){

            if(isset($_GET[$get])){
                return $_GET[$get];
            }else{
                return $default;
            }
        }
    }
    function checkedGet($get, $sentencia = ''){
        if(!$sentencia == ''){
            if(isset($_GET[$sentencia])){
                if(isset($_GET[$get])){
                    echo "checked";
                }
            }
        }else{
            if(isset($_GET[$get])){
                echo "checked";
            }
        }
    }
    function noShowClassGet($get, $class, $sentencia = ''){
        if(!$sentencia == ''){
            if(isset($_GET[$sentencia])){
                if(!isset($_GET[$get])){
                    echo $class;
                }
            }else{
                echo $class;
            }
        }else{
            if(!isset($_GET[$get])){
                echo $class;
            }else{
                
            }
        }
    }

    function selectedGetValue($get, $value, $sentencia = ''){
        
        if(!$sentencia == ''){
            if(isset($_GET[$sentencia])){
                if(isset($_GET[$get])){
                    if($_GET[$get] == $value){
                        echo 'selected';
                    }
                }
            }

        }else{

        }
    }
    function selectedValue($val, $value){
        
        if($val == $value){
            echo 'selected';
        }


    }
    function activeBydata($data, $argument){
        if($data == $argument){
            echo 'active';
        }
    }
    function removeTextGuia($str){
        $min = array('a', 'b', 'c', 'd', 'e',
                     'f', 'g', 'h', 'i', 'j',
                     'k', 'l', 'm', 'n', 'o', 
                     'p', 'q', 'r', 's', 't',
                     'u', 'v', 'w', 'x', 'y',
                     'z', 'A', 'B', 'C', 'D',
                     'E', 'F', 'G', 'H', 'I',
                     'J', 'K', 'L', 'M', 'N',
                     'O', 'P', 'Q', 'R', 'S',
                     'T', 'U', 'V', 'W', 'X',
                     'Y', 'Z', '-', ' '
        );

        $str = str_replace($min, '', $str);

        return $str;

    }

    function getTemplate($file, $extencion){
        return file_get_contents('template/'.$file.'.'. $extencion);
    }

    function showTypeServices($data, $type){
        switch($type){
            case 'icon':
                switch ($data) {
                    case 'pickup': return '<em class="icon fa-solid fa-truck-fast"></em>'; break;
                    case 'shop':  return '<em class="icon fa-solid fa-basket-shopping"></em>'; break;
                    default: return false; break;
                }
            break;
        }
    }
    function SedeName($code){
        $sede = query("SELECT sede_name as name FROM sedes WHERE sede_code = '$code' ");

        if($sede){
            return $sede->name;
        }else{
            return '';
        }
    }

    function statusShippingName($id){
        $status = query("SELECT name FROM shipments_status WHERE id = '$id'");

        return $status->name;
    }
    function statusDispatchedName($id){
        $status = query("SELECT name FROM dispatched_status WHERE id = '$id'");

        return $status->name;
    }

    function queryDay($id){
        $year = date("Y");
        $mes = date("n");

        $data = array();
        $dayEnd =   date('Y-m-d');
        $dayStart = date('Y-m-d', strtotime('-' . $id));
        
        for ($i = $dayStart; $i <= $dayEnd; $i = date('Y-m-d', strtotime($i . '+1 days'))) {
            array_push($data, $i);
        }
        
        return $data;
    }

    function UserName($id){
        $user = query("SELECT CONCAT(user_fname, ' ', user_lname) AS name FROM users WHERE user_id = '$id'");

        return $user->name;
    }
    function showDate($date){
        $fecha = date("d-M-Y", strtotime($date));

        $fecha = str_replace('Jan', 'Ene', $fecha);
        $fecha = str_replace('Apr', 'Abr', $fecha);
        $fecha = str_replace('Aug', 'Ago', $fecha);
        $fecha = str_replace('Dec', 'Dic', $fecha);

        return $fecha;
    }
    function reportesGraficas($get, $default = ''){

        if(isset($_GET[$get])){
            echo $_GET[$get];
        }else{
            echo $default;
        }
    }
    function rAcBtn($get, $data){
      // $data = str_replace('%20', ' ', $data);

        if(isset($_GET[$get])){
            if($_GET[$get] == $data){
                echo 'active';
            }
        }else{
            if($data == '6 days' ){
                echo 'active';
            }
        }
    }
    function showNameCity($id){
        $city = query("SELECT ciudad_name as name FROM ciudades WHERE ciudad_id = '$id' limit 1");

        return $city->name;
    }

    function ShowNameCiteBySede($code){
        $city = query("SELECT  ciudades.ciudad_name as name FROM sedes INNER JOIN ciudades on sedes.sede_city = ciudades.ciudad_id and sedes.sede_code = '$code'");
        return $city->name;
    }
    
    function sumaPost($post){

        if($post){
            $total = 0;
            foreach($post as $val){
                $val = str_replace(',', '.', $val);
                $total = $total + $val;
               
            }
            return $total;
        }else{
            return $post;
        }
    }

    function OBJ($arr){
            
        $obj = new ArrayObject($arr);
        $obj->setFlags(ArrayObject::ARRAY_AS_PROPS);
        
        return $obj;
    }
    function ventasDiariasLoader($element = 1){
        $html = '<tr class="tb-odr-item">
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        <td class="tb-odr-info">
            <span class="item-loader tb-odr-id"></span>
        </td>
        
    </tr>';
    
    for ($i = 1; $i <= $element; $i++) {
        echo $html;
    }
    }
    function setDate($date){
        $date = str_replace('/', '-', $date);
        $date = date("Y-m-d", strtotime($date));
        return $date;
    }
    function showUrlQuery($url, $query = array(), $getType = 0){
        $url = $url . '?' . http_build_query($query);
        switch($getType){
            default: return $url;
                break;
            case 1: echo $url;
                break;

        }
    }