<?php
defined('BASEPATH') OR exit('No direct script allowed');

class M_user extends CI_Model{

	function __construct()
		{
			parent::__construct();
			$this->load->database();
			// $this->target='mst_target';
			// $this->message='message_conf';
			// $this->sending='send_process';
			$this->user='user';
            date_default_timezone_set("Asia/Jakarta");
		}

 function UserData($offset=0, $limit=100, $scope='', $search='', $order, $count=0){
        if ($count == 0) {
            $sql = "SELECT * FROM user WHERE id > 0 ";
        }else{
            $sql = "SELECT count(*) as jml from user WHERE id > 0 ";
        }

        // if ($search != '') {
        //     $search = $this->db->escape_str($search);
        //     $num = (int) $search;
        //     $orderid = '';
        //     if($num > 0){
        //         $orderid = " OR id = $num ";
        //     }
        //     $sql .= " AND ( id  like '%$search%' OR Name like '%$search%' OR Username like '%$search%' $orderid ) ";
        // }

        // if( strlen($phone) > 0 ){
        //     $sql .= " AND target_phone like '%".$this->db->escape_str($phone)."%' ";
        // }

        // $count = count($this->db->escape_str($order));
        // $coloumn = array('', 'First_Name', 'Username', 'Role', 'created_by', 'updated_by', '');
        // if($count > 0){
        //     $sql .= " ORDER BY ";
        //     for ($i=0; $i < $count; $i++) { 
        //         $index = $order[$i];
        //         $sql .= " ".$coloumn[$index['column']]." ".$index['dir']." ";
        //         if($i < ($count-1)){
        //             $sql .= " , ";
        //         }
        //     }
        // }

        if ($scope != 'all') {
            $sql .= " LIMIT $offset, $limit ";
        }

        $query = $this->db->query($sql);
        //print_r($query);die()
        //echo $this->db->last_query();die();
        return $query->result();
    }

    public function createIdUser(){
        $this->db->select('RIGHT(user.id_user,5) as kode', FALSE);
        $this->db->order_by('id_user','DESC');
        $this->db->limit(1);

        $query=$this->db->get('user');

        if ($query->num_rows()!=0) 
        {
           $data=$query->row();
           $kode=intval($data->kode)+1;
        } 
        else
        {
            $kode=1;
        }
        $kode_max=str_pad($kode,5,"0",STR_PAD_LEFT);
        $kode_jadi="USR".$kode_max;
        return $kode_jadi;
    }

    function addUser($first_name,$username,$password,$status) {
        $cek = $this->db->query("SELECT * FROM user where Username ='".$username."'")->num_rows();
        //print_r($cek);die();
        // if($cek == 0){//jika data belum ada
        //     $var = 5;
        //     return $var;
        // }
        if($cek == 1){//jika data sudah ada
            $var = 2;
            return $var;
        }
        elseif($cek < 2 OR $cek == 0){//jika data ada == 1
            // $pass = md5($password);
            $data = array(
                    'Name' => $first_name,
                    'Username' => $username,
                    'Password' => $password,
                    'Role' => $status,
                    'created_by' => 'Created by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
                );
            $this->db->insert($this->user, $data);
            return $this->db->affected_rows();
            if($var == 1){
                $var = 1;
                return $var;
            }else{
                $var = 3;
                return $var;
            }
        }elseif($cek > 1){//jika data lebih dari 1
            $var = 2;
            return $var;
        }else{//jika process pengecekan gagal
            $var = 4;
            return $var;
        }
    }

    function data_editUser($Id=''){
        $sql = $this->db->query("SELECT a.id, a.Name, a.Username, a.Password, a.Role FROM user a WHERE a.id='".$Id."'");
        //echo $this->db->last_query();die();
        return $sql->result_array();   
    }

    function checkDataUser($username=''){
        $cek = $this->db->query("SELECT * FROM user where Username ='".$username."'")->num_rows();
        if($cek == 0){//jika data username belum ada
            $varCek = 0;
            return $varCek;
        }elseif($cek == 1){//jika data ada == 1
            $varCek = 1;
            return $varCek;
        }else{//jika process pengecekan gagal
            $varCek = 4;
            return $varCek;
        }
    }

    function checkOldPassword($password_old,$id){
        $ID = $this->db->escape_str($id);
        $PasswordOld = $this->db->escape_str($password_old);
        //PENGECEKAN OLD ACCESS KEY
        $getoldaccesskey = "SELECT Password FROM user WHERE id = '" . $this->db->escape_str($ID) . "' ";
        $query = $this->db->query($getoldaccesskey);
        $getoldaccesskey = $query->result();

        foreach ($getoldaccesskey as $value) {
            $oldKey = $value->Password;
        }
        //print_r($oldKey);
        //print_r($password_old);
        //die();

        if ($PasswordOld != $oldKey) {
            $CheckOldPass = 3;
            return $CheckOldPass;
        }elseif ($PasswordOld == $oldKey) {
            $CheckOldPass = 4;
            return $CheckOldPass; 
        }else {
            $CheckOldPass = 5;
            return $CheckOldPass;
        }
    }

    function checkUsername($username,$id){
        $cekUsername = $this->db->query("SELECT * FROM user where Username ='".$username."' AND id = '".$id."'")->num_rows();
        //echo $this->db->last_query();
        //print_r($cekUsername);die();
        if($cekUsername == 1){//jika data tidak ada yang sama
            $varUsername = 0;
            return $varUsername;
        }else{//jka action cek username gagal
            $varUsername = 1;
            return $varUsername;
        }
    }

    function checkUsernameLevelTwo($username='',$id=''){
        $cekUsername = $this->db->query("SELECT * FROM user where Username ='".$username."'")->num_rows();
        //echo $this->db->last_query();
        //print_r($cekUsername);die();
        //Get data username
        $getIdUsername = "SELECT id FROM user WHERE Username = '" . $this->db->escape_str($username) . "' ";
        $query = $this->db->query($getIdUsername);
        $getIdUsername = $query->result();

        foreach ($getIdUsername as $value) {
            $IDUser = $value->id;
        }

        if($cekUsername == 0 OR $id == $IDUser){//jika data tidak ada yang sama
            $varUsernameTwo = 0;
            return $varUsernameTwo;
        }
        // elseif($cekUsername == 0 OR $id != $IDUser){//jika data ada = 1 atau lebih
        //     $varUsernameTwo = 2;
        //     return $varUsernameTwo;
        // }
        else{//jka action cek username gagal
            $varUsernameTwo = 1;
            return $varUsernameTwo;
        }
    }

    // function editUser($id,$nama,$username,$saldo,$price_email,$price_phone,$password='',$status) {
    function editUser($id,$first_name,$username,$password='',$status) {
        $UserName = $username;
        $cek = $this->db->query("SELECT * FROM user where Username ='".$username."'")->num_rows();
        //print_r($cek);die();
        // if($cek == 0){//jika data belum ada
        //     $var = 5;
        //     return $var;
        // }
        // if($cek > 0){//jika data sudah ada
        //     $var = 2;
        //     return $var;
        // }
        if($cek < 2 OR $cek == 0 AND $UserName == $username){//jika data ada == 1
            // if($password_new==''){//jika password new tidak di isi

            // }elseif($password_new!=''){//jika password new di isi

            // }else{

            // }
            // $password = $user['password'];
			// $key = 'secreatM07';
        	// $pass = sha1(md5($password) . $key);
            $data = array(
                'Name' => $first_name,
                'Username' => $username,
                'Password' => $password,
                'Role' => $status,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => 'Updated by - '.$this->session->userdata('nama').' ('.$this->session->userdata('username').')'
            );
            $this->db->where('id', $id);
            $this->db->update('user', $data);
            //echo $this->db->last_query();die();
            $var = $this->db->affected_rows();
            if($var == 1){
                $var = 1;
                return $var;
            }else{
                $var = 3;
                return $var;
            }
        }
        // elseif($cek > 1){//jika data lebih dari 1
        //     $var = 2;
        //     return $var;
        // }
        else{//jika process pengecekan gagal
            $var = 4;
            return $var;
        }
    }

    function deleteUser($id) {
        $delete_user= "DELETE FROM user WHERE id = '" . $this->db->escape_str($id) . "'";
        $this->db->query($delete_user);
        $var = $this->db->affected_rows();
        if($var == 1){//jika berhasil
            $var = 1;
            return $var;
        }else{
            $var = 0;//jika gagal
            return $var;
        }
    }
    //END CODING BAGIAN MANAJEMEN USER

}