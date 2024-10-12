<?php
defined('BASEPATH') OR exit('No direct script allowed');

Class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('M_user');
		// $this->load->model('MasterModel');
		if($this->session->userdata('masuk') != TRUE){
			redirect(base_url("login"));
		}
		// if($this->session->userdata('role') == 1){
		// 	redirect(base_url("login"));
		// }
	}

	public function index(){
		// $data['User'] = $this->M_User->tampil_data()->result();
		$data['url_save'] = base_url().'User/user_save';
		// $data['kode_jabatan'] = $this->MasterModel->getKodeJabatan();
		// $this->load->view('Tamplates/header');
		$this->load->view('User/User',$data);
		// $this->load->view('Tamplates/footer');
	}

//START CODING BAGIAN MANAJEMEN USER UNTUK ADMIN
    public function UserData($offset=0, $limit=100)
    {
        $draw   = $_REQUEST['draw'];
        $length = $_REQUEST['length'];
        $start  = $_REQUEST['start'];
        $search = $_REQUEST['search']["value"];
        $order  = $_REQUEST['order'];

        //$phone  = $_POST['phone'];

        // print_r($_POST);die();

        $output = array();
        $output['draw'] = $draw;
        $output['data'] = array();

        if ($length == -1){
            $data = $this->M_user->UserData($start, $length, 'all', $search, $order, 0);
        }else{
            $data = $this->M_user->UserData($start, $length, 'limitdata', $search, $order, 0);
        }

        if($search != ''){
            $countdata = $this->M_user->UserData($offset, $limit, 'all', $search, $order, 1);
            $output['recordsTotal']=$output['recordsFiltered'] = $countdata[0]->jml;
        }else{
              
            $countdata = $this->M_user->UserData($offset, $limit, 'all', $search, $order, 1);
            $output['recordsTotal']=$output['recordsFiltered'] = $countdata[0]->jml;
        }

        $nomor_urut = $start+1;
        foreach ($data as $row){
            // $trim = str_replace(' ','', $row->Order_Id."/".$row->User_id."/".$row->Product_code);
            // $trim_resend = str_replace(' ','', $row->Order_Number."/".$row->Order_Id."/".$row->Product_code."/".$row->User_id.'/'.$row->Order_date);
            $btn = '';
                $btn .= '<a href="'.base_url()."User/user_form/".$row->id.'"><button class="btn bg-blue btn-block waves-effect">Edit</button></a> ';
                $btn .= '<a href="'.base_url('User/deleteUser/?id='.$row->id).'" class="text text-danger" onclick="return confirm(\'Delete this data ?\');"><button class="btn bg-red btn-block waves-effect">Delete</button></a>';
            if($row->Role == 0){
                $Status = "Admin Kasir";
            }elseif($row->Role == 1){
                $Status = "Pemilik";
            }elseif($row->Role == 2){
                $Status = "Pelanggan";
            }elseif($row->Role == 00){
                $Status = "Di Blokir";
            }
            else{
                $Status = "Undifined.";
            }

            if($row->updated_at == '0000-00-00 00:00:00' OR $row->updated_at == Null){
                $UpdatedAtBy = "-";
            }else{
                $UpdatedAtBy = $row->updated_at.' ('.$row->updated_by.')';
            }

            $output['data'][] = array(
                $nomor_urut,
                $nestedData[] = $row->Name,
                $nestedData[] = $row->Username,
                $nestedData[] = $Status,
                $nestedData[] = $row->created_at.'('.$row->created_by.')',
                $nestedData[] = $UpdatedAtBy,
                $nestedData[] = $btn,
            );
            $nomor_urut++;
        }
        echo json_encode($output);
    }

    public function user_save(){
        $first_name = $this->input->post('first_name', TRUE);
        // $last_name = $this->input->post('last_name', TRUE);
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $status = $this->input->post('status', TRUE);
        $var = $this->M_user->addUser($first_name,$username,$password,$status);
        if($var == 1){
            echo "<script>alert('Success Insert Username : ".$username.".');</script>";
            redirect('User','refresh');
        }elseif($var == 2){
            echo "<script>alert('Failed, Insert Username : ".$username.". Data Already Exist.');</script>";
            redirect('User','refresh');
        }elseif($var == 3){
            echo "<script>alert('Failed, Insert Username : ".$username.".');</script>";
            redirect('User','refresh');
        }elseif($var == 4){
            echo "<script>alert('Failed, Cannot Process Check Data Username : ".$username.".');</script>";
            redirect('User','refresh');
        }elseif($var == 5) {
            echo "<script>alert('Failed Username : ".$username.", Data belum di input.');</script>";
            redirect('User','refresh');
        }else{
            echo "<script>alert('Failed Process Insert.');</script>";
            redirect('User','refresh');
        }
    }

	public function user_form($Id=''){
		if($this->session->userdata('level') == 1){
			if($Id==''){
				echo "<script>alert('Failed Get ID User.');</script>";
	            redirect('User','refresh');
			}else{
				$data["Id"]=$Id;
				$data["header"] = $this->M_user->data_editUser($Id);
		        $test = $this->M_user->data_editUser($Id);
		        //print_r($test);die();
		        $this->load->view("User/edit_user",$data);			
			}
		}else{
			redirect(base_url("login"));
		}
	} 

    function edit_user(){
        //print_r($_POST);die();
        $id=$this->input->post('EditUserID', TRUE);
        $first_name=$this->input->post('EditUserFirstName', TRUE);
        // $last_name=$this->input->post('EditUserLastName', TRUE);
        $username=$this->input->post('EditUserUsername', TRUE);
        $old_username=$this->input->post('OldUserUsername', TRUE);
        $password_old=$this->input->post('EditUserPasswordOld', TRUE);
        $password_new=$this->input->post('EditUserPasswordNew', TRUE);
        $status=$this->input->post('EditUserStatus', TRUE);
        $lastvisited = site_url() . 'User/user_form/'.$id;

        $varUsernameTwo = $this->M_user->checkUsernameLevelTwo($username,$id);
        if($varUsernameTwo == 0){//jika data tidak ada yang sama
            $varUsername = $this->M_user->checkUsername($old_username,$id);
            if($varUsername == 0){
                $CheckOldPass = $this->M_user->checkOldPassword($password_old,$id);
                if($CheckOldPass == 3){
                    echo "<script>alert('Wrong Old Password. Please input the correct old password.');</script>";
                    redirect($lastvisited,'refresh');
                }elseif($CheckOldPass == 4){
                    if($password_new==''){
                        $var = $this->M_user->editUser($id,$first_name,$username,$password_old,$status);
                    }elseif($password_new!=''){
                        $var = $this->M_user->editUser($id,$first_name,$username,$password_new,$status);
                    }else{
                        echo "<script>alert('Failed Action.');</script>";
                        redirect($lastvisited,'refresh');
                    }
                        if($var == 1){
                            echo "<script>alert('Success Update Username : ".$username.".');</script>";
                            redirect('User','refresh');
                        }
                        // elseif($var == 2){
                        //     echo "<script>alert('Failed, Username : ".$username.". Already Registered.');</script>";
                        //     redirect('Menu/user_list','refresh');
                        // }
                        elseif($var == 3){
                            echo "<script>alert('Failed, Update Username : ".$username.".');</script>";
                            redirect('User','refresh');
                        }elseif($var == 4){
                            echo "<script>alert('Failed, Cannot Process Check Data Username : ".$username.".');</script>";
                            redirect('User','refresh');
                        }elseif($var == 5) {
                            echo "<script>alert('Failed Username : ".$username.", Data belum di input.');</script>";
                            redirect('User','refresh');
                        }else{
                            echo "<script>alert('Failed Process Update Username.');</script>";
                            redirect('User','refresh');
                        }
                }else{
                    echo "<script>alert('Action Check Old Password Failed.');</script>";
                    redirect($lastvisited,'refresh');
                }
            }else{
                echo "<script>alert('Failed, Username : ".$username.". Action Check Level One Failed.');</script>";
                redirect($lastvisited,'refresh');
            }
        }else{
            echo "<script>alert('Failed, Username : ".$username.". Already Registered.');</script>";
            redirect($lastvisited,'refresh');
        }
    }

    public function deleteUser() {
        if($this->session->userdata('level') == 1){
            $id = $_REQUEST['id'];
            $var = $this->M_user->deleteUser($id);
            if($var == 1){
                echo "<script>alert('Success Delete User.');</script>";
                redirect('User','refresh');
            }else{
                echo "<script>alert('Failed Delete User.');</script>";
                redirect('User','refresh');
            }
        }else{
            redirect('login');
        }
    }
    //END CODING BAGIAN MANAJEMEN USER UNTUK ADMIN

}


?>