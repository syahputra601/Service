<?php 

class M_register extends CI_Model{	
	function __construct(){
			parent::__construct();
			$this->load->database();
			$this->user='user';
            date_default_timezone_set("Asia/Jakarta");
		}

	function addUser($username,$nama,$password) {
        $cek = $this->db->query("SELECT * FROM user where Username ='".$username."'")->num_rows();
        //print_r($cek);die();
        if($cek == 1){//jika data sudah ada
            $var = 2;
            return $var;
        }
        elseif($cek == 0){//jika data ada == 0
            $data = array(
                    'Name' => $nama,
                    'Username' => $username,
                    'Password' => $password,
                    'Role' => 2,
                    'created_by' => 'Created by Form Register'
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

}
?>