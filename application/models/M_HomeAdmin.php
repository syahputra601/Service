<?php
defined('BASEPATH') OR exit('No direct script allowed');

class M_HomeAdmin extends CI_Model{

    public function get_result_voucher(){
        $sql = "SELECT voucher_code, COUNT(id) as jumlah
                FROM voucher";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function get_result_voucher_perdana(){
        $sql = "SELECT phone, COUNT(id) as jumlah
                FROM voucher_perdana";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

}

?>