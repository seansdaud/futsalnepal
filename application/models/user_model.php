<?php
 class User_model extends CI_Model{
	 	function signup($data){
			$this->db->insert('user',$data);
			return;
	 	}

	 	function user_validate($data){
			$array = array('username' => $data['username'], 'password' => $data['password']);
			$this->db->where($array);
			$result=$this->db->get('user')->num_rows();
			return $result; 
	 	}
	 	function check_status($data){
	 		$array=array('username'=>$data['username'], 'password'=>$data['password'],'status'=>'1');
	 		$this->db->where($array);
	 		$result=$this->db->get('user')->num_rows();
	 		return $result;
	 	}

	 	function status_validation($data){
	 		$array = array('activation_code' => $data, 'status' =>'1');
	 		$check_verification=$this->db->where($array)->get('user')->num_rows();
	 		if($check_verification==1){
	 			return 2;
	 		}
	 		else{
	 			$confirm=$this->db->where('activation_code',$data)->get('user')->num_rows();
		 		if($confirm==1){
		 			$status = array(
		 					'status'=>'1'
		 				);
		 			$this->db->where('activation_code',$data)->update('user',$status);
		 			return 1;
		 		}
		 		else{
		 			return 0;
		 		}
	 		}
	 	}


		function do_upload($data){
			$this->db->insert('images',array('image_name' => $data['image_name']));
			echo "saved";
			return;
		}

		function change_psw(){
			$this->db->where('password', sha1($this->input->post('current_password')));
			if($this->db->get('user')->num_rows() == 1){
				$data=array(
						'password' =>sha1($this->input->post('new_password'))
					);
				$this->db->where('username',$this->session->userdata('username'));
				if($this->db->update('user',$data)){
					return 1;
				}
				else{
					return 2;
				}
				
			}

			else{
				return 0;
			}
		}
}
