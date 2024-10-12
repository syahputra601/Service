<?php 

class M_login extends CI_Model{	
	function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

	function getuser($user)
		{ 
			$password = $user['password'];
			$key = 'secreatM07';
        	$pass = sha1(md5($password) . $key);
			$this->db->where('Username', $user['username']);
			$this->db->where('Password', $password);
			$this->db->from('user');
			$this->db->select('*');
			$sql = $this->db->get();
			//echo $this->db->last_query();die();
			if ($sql->num_rows() > 0) {
				return $sql->result();
			}
			else{
				return '';
			}
		}

	// function ambilsession($data)
	// 	{
	// 		$this->db->where('username', $data['username']);
	// 		$this->db->where('password', $data['password']);
	// 		$this->db->from('partner');
	// 		$this->db->select('*');
	// 		$sql = $this->db->get();
	// 		if ($sql->num_rows() > 0) {
	// 			foreach ($sql->result() as $row) {
	// 				// $this->username = $data['username'];
	// 				 $this->nama = $data['client_id'];
	// 			}
	// 		}
	// 	}

}