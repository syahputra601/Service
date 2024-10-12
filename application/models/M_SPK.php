<?php
defined('BASEPATH') OR exit('no direct sciprt allowed');

Class M_SPK extends CI_Model{
	function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->penitipan='spk';
            date_default_timezone_set("Asia/Jakarta");
		}

	function tampil_data(){
        $this->db->where('deleted', 0);
        $db = $this->db->get('penitipan_motor');
        return $db;
    }

}

?>