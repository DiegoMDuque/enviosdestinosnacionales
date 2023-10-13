<?php

    class Users{

        public static function getUser(){
            if(isset($_SESSION['ENVIOSNACIONALESADMIN'])){
                return  $_SESSION['ENVIOSNACIONALESADMIN'];
            }else{
                return 0;
            }
        }

        public static function LoginCheck($login = true, $arr = array()){
            
            if(!isset($_SESSION['ENVIOSNACIONALESADMIN'])){
                if($login){
                    Template::GetHeader($arr);    
                
                    require 'inc/login.php';
                    
                    Template::GetFoot();
                }
                
                die();
            }

        } 
        public static function Login(){

            $data = OBJ($_POST);
            
            $user = query("SELECT * FROM users WHERE user_username = '$data->username' limit 1");

            if($user){
                if(password_verify($data->password, $user->user_password)){

                    $_SESSION['ENVIOSNACIONALESADMIN'] = $user->user_id;
                   // self::setLogsLogin($user->user_id, date('Y-m-d'), 1);
                    Core::json(array('hello_user' => true));
                }else{
                   // self::setLogsLogin($user->user_id, date('Y-m-d'), 0);
                    Core::json(array('login_fail' => array('msg' => 'Usuario o contraseña son incorrectos', 'icon' => 'error')));
                }
            }else{
                Core::json(array('login_fail' => array('msg' => 'Usuario o contraseña son incorrectos', 'icon' => 'error')));
            }
        }

        public static function ChangePassword(){
            if(isset($_POST['id_user'])){
                $_POST['id'] = $_POST['id_user'];
            }else{
                $_POST['id'] = self::getUser();
            }
            $_POST['password'] = Core::PASSWORD_ENCRIT($_POST['new_password']);

            $data = Core::retrumOBJ($_POST);

            query("UPDATE users SET user_password = '$data->password' WHERE user_id = $data->id");
        }
        
        public static function getUserById($id){

            $user = query("SELECT * FROM users WHERE user_id = '$id' LIMIT 1");

            $avatar = 'assets/img/avatar.png';

            if(!empty($user->user_avatar)){
                $avatar = '';
            }
            $userData = (object) array(

                'id'       => $user->user_id,
                'name'     => $user->user_fname . ' ' . $user->user_lname,
                'email'    => $user->user_username,
                'avatar'   => $avatar,
                'level'    => $user->user_level,
                'sede'     => $user->user_sede,
                'permisos' => self::getPermisosUsuarioById($user->user_id)

            );

            return $userData;
        }

        public static function showInfoUserBySession($key){
            $user_id = $_SESSION['ENVIOSNACIONALESADMIN'];

            $user = query("SELECT * FROM users WHERE user_id = '$user_id' LIMIT 1");
            $avatar = 'assets/img/avatar.png';
            if(!empty($user->user_avatar)){
                $avatar = '';
            }
            $userData = array(

                'id'     => $user->user_id,
                'name'   => $user->user_fname . ' ' . $user->user_lname,
                'email'  => $user->user_username,
                'avatar' => $avatar,
                'level'  => $user->user_level

            );
            echo $userData[$key];
        }
        public static function GetInfoUserBySession($key){
            $user_id = $_SESSION['ENVIOSNACIONALESADMIN'];

            $user = query("SELECT * FROM users WHERE user_id = '$user_id' LIMIT 1");
            $avatar = 'assets/img/avatar.png';
            if(!empty($user->user_avatar)){
                $avatar = '';
            }
            $userData = array(

                'id'       => $user->user_id,
                'name'     => $user->user_fname . ' ' . $user->user_lname,
                'email'    => $user->user_username,
                'avatar'   => $avatar,
                'level'    => $user->user_level,
                'permisos' => self::getPermisosUsuarioById($user->user_id)

            );
            return $userData[$key];
        }
        public static function CheckPermisosUser($access, $metodo = '', $permisos = ''){
            
            if(!is_array($permisos)){
                $permisos = self::GetInfoUserBySession('permisos');
            }

            if(isset($permisos[$access])){
                $result = true;
            }else{
                $result = false;
            }
            switch($metodo){
                default: return $result;

                case 'checked':
                    switch ($result) {
                        case true:
                            echo 'checked';
                        break;
                    }
                    
                    break;
                case 'page':
                    switch ($result) {
                        case false:
                            header("HTTP/1.1 401 Unauthorized");
                            require 'inc/error/nopermiso.php';
                            die();
                        break;
                    }
                    
            }
        } 
        public static function getList(){
            $data = array();
            $users = query("SELECT * FROM users", 'ALL');

            foreach($users as $val){
                $avatar = 'assets/img/avatar.png';
                $status = (object) array('color' => 'danger', 'text' => 'inactivo');
                if(!empty($val->user_avatar)){
                    $avatar = '';
                }
                if($val->user_status == 1){
                    $status = (object) array('color' => 'succes', 'text' => 'Activo');
                }
                array_push($data, (object) array(
                    'id'     => $val->user_id,
                    'name'   => $val->user_fname . ' ' . $val->user_lname,
                    'email'  => $val->user_username,
                    'avatar' => $avatar,
                    'status' => $status,
                    'sede'   => $val->user_sede,
                    'level'  => $val->user_level
                ));
            }

            return $data;
        }
        public static function AddNewUser(){
           

            if(empty($_FILES['avatar'])){
                $_POST['avatar'] = '';
            }else{
                $_POST['avatar'] = $_FILES['avatar']['name'];
            }
            $_POST['password'] = Core::PASSWORD_ENCRIT($_POST['password']);

            $user = Core::retrumOBJ($_POST);

            query("INSERT INTO users (
                user_dni,
                user_fname,
                user_lname,
                user_username,
                user_password,
                user_avatar,
                user_sede
                ) VALUES (
                    '$user->dni',
                    '$user->fname',
                    '$user->lname',
                    '$user->username',
                    '$user->password',
                    '$user->avatar',
                    '$user->sede')
            ",);
            $Result = self::GetUserByDNI($user->dni);
            Core::json(array('success' => true, 'id' => $Result->user_id));
        }
        public static function validateUserExiten(){
            $user  = Core::retrumOBJ($_POST);
            $error['error'] = array();
            $dni      = query("SELECT * FROM users WHERE user_dni = '$user->dni' LIMIT 1");
            $username = query("SELECT * FROM users WHERE user_username = '$user->username' LIMIT 1");

            if($dni == true){
                array_push($error['error'], array('key' => 'dni', 'msg' =>'ya existe un usuario con este DNI'));
            }
            if($username == true){
                array_push($error['error'], array('key' => 'username', 'msg' => 'ya existe un usuario con este usuario'));
            }

            return $error;
        }
        public static function GetUserByDNI($dni){
            $user = query("SELECT * FROM users WHERE user_dni = '$dni'");
            return $user;
        }
        public static function GetInfoUserById($id){
            $user = query("SELECT * FROM users WHERE user_id = '$id' LIMIT 1");
            $avatar = 'assets/img/avatar.png';
            if(!empty($user->user_avatar)){
                $avatar = '';
            }
            $userData = array(

                'id'         => $user->user_id,
                'name'       => $user->user_fname . ' ' . $user->user_lname,
                'email'      => $user->user_username,
                'avatar'     => $avatar,
                'level'      => $user->user_level,
                'permisos'   => self::getPermisosUsuarioById($user->user_id)

            );

            return $userData;
        }
        public static function getInfoUserByget(){
            
            if(isset($_GET['user'])){
                $id = $_GET['user'];
            }elseif(isset($_GET['permisos'])){
                $id = $_GET['permisos'];
            }elseif(isset($_GET['edit_user'])){
                $id = $_GET['edit_user'];
            }elseif(isset($_GET['edit_permisos'])){
                $id = $_GET['edit_permisos'];
            }else{
            }
            $user = query("SELECT * FROM users WHERE user_id = '$id' LIMIT 1");
            $avatar = 'assets/img/avatar.png';
            if(!empty($user->user_avatar)){
                $avatar = '';
            }
            if($user->user_status == 1){
                $status = 'Activo';
            }else{
                $status = 'Inactivo';
            }
            $userData = (object)array(

                'id'         => $user->user_id,
                'dni'        => $user->user_dni,
                'fname'      => $user->user_fname,
                'lname'      => $user->user_lname,
                'name'       => $user->user_fname . ' ' . $user->user_lname,
                'email'      => $user->user_username,
                'avatar'     => $avatar,
                'level'      => $user->user_level,
                'username'   => $user->user_username,
                'sede'       => $user->user_sede,
                'status'     => $status,
                'status_val' => $user->user_status,
                'permisos'   => self::getPermisosUsuarioById($user->user_id)

            );
            return $userData;
        }
        public static function getUserStatus($unset = ''){
            $status = Core::retrumOBJ(array('Inactivo','Activo'));

            if(!$unset == ''){
                foreach($status as  $key => $st){
                    if($st == $unset){
                        $status->offsetUnset($key);
                    }
                }
            }

            return $status;
        }
        public static function UpdateUser(){
            if(isset($_POST['infouser'])){
                self::UpdateInfoUser();
            }elseif(isset($_POST['permisos'])){
                self::UpdatePermisosUser();
            }
        }

        private static function UpdateInfoUser(){
            $user = Core::retrumOBJ($_POST['infouser']);
            $update = query("UPDATE users SET
                user_fname    = '$user->fname',
                user_lname    = '$user->lname',
                user_sede     = '$user->sede',
                user_status   = '$user->status' WHERE user_id = '$user->id' 
                ");
        }
        private static function UpdatePermisosUser(){
            $id = $_POST['permisos']['id'];
            $permisos = Core::retrumOBJ($_POST['permisos']);
            $permisos->offsetUnset('id');
            query("DELETE FROM permissions_user WHERE id_user = '$id'");

            foreach($permisos as $key => $val){
                query("INSERT INTO permissions_user(
                    id_permissions,
                    id_user
                    ) VALUES (
                        '$key',
                        '$id'
                    )
                ");
            }
        }
        private static function getPermisosUsuarioById($id){
            $datos = array();
            $permisos  = query("SELECT * FROM permissions_user WHERE id_user ='$id'", 'ALL');

            foreach($permisos as $permiso){
                $datos[$permiso->id_permissions] = true;
            }
            return $datos;
        }
        
        public static function GetListPermisos(){
            $permisos =  query("SELECT * FROM permisos_list", 'ALL');

            return $permisos; 
        }

        public static function getUserByLinkName(){
            $result['results'] = array();

            $text = '';

            if(isset($_POST['text'])){
                $text = $_POST['text'];
            }

            $users = query("SELECT user_id AS id, CONCAT(user_fname, ' ', user_lname) as text  FROM users WHERE user_fname LIKE '$text%' or user_lname LIKE  '$text%'  limit 5", 'ALL');
        
            foreach($users as $val){
                array_push($result['results'], array('id' => $val->id, 'text' =>  $val->text));
            }
            Core::json($result);
        }

        public static function getUserGraficEnvios(){
            $user = query("SELECT CONCAT(users.user_fname, ' ', users.user_lname) as name,  COUNT(users.user_id) envios FROM users INNER JOIN envios ON  users.user_id = envios.envio_asesor GROUP BY users.user_id ORDER BY envios DESC", 'ALL');

            return $user;
        }

        public static function getAsesorActive(){
            $users = query("SELECT * FROM users WHERE user_status = 1 and user_level = 'Asesor'", 'ALL');

            return $users;
        }

        public static function getArqueoByID(){
            $_POST['date']   = date('Y-m-d');
            $_POST['asesor'] = self::getUser();

            $data = core::retrumOBJ($_POST);

            $result = query("SELECT TRUNCATE(SUM(invoices.total),2) as total  FROM shipments INNER JOIN invoices ON shipments.id = invoices.id_envio and shipments.date_sender = '$data->date' and shipments.status != 3 AND shipments.asesor = '$data->asesor' GROUP BY shipments.asesor;");

            $total = ($result) ? $result->total : 0;

            core::json(array('total' => currency($total)));
        }
        private static function setLogsLogin($id_user, $date_logs, $type){

            query("INSERT INTO logs_login(
                id_user,
                date_logs,
                type
                ) VALUES (
                    '$id_user',
                    '$date_logs',
                    '$type')
            ");
        }
    }