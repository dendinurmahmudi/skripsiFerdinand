<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('nis', 'nis', 'trim|required|is_natural', ['required' => '*Field Tidak Boleh Kosong', 'is_natural' => 'Karakter hanya terdiri dari angka']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required' => '*Field Tidak Boleh Kosong']);
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/index');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$nis = $this->input->post('nis');
		$password = $this->input->post('password');

		$guru = $this->db->get_where('tbl_pegawai',['nip'=>$nis])->row_array();
		$siswa = $this->db->get_where('tbl_siswa',['nis'=>$nis])->row_array();

		if($guru){
			if($password == $guru['password']){
				if ($guru['status'] == 1) {
					$data = [
						'id' => $guru['nip'],
						'nama' => $guru['nama']
					];
					$this->session->set_userdata($data);
					redirect('Guru');
				}
				else{
					$data = [
						'id' => $guru['nip'],
						'nama' => $guru['nama']
					];
					$this->session->set_userdata($data);
					redirect('Admin');
				}
			}
			else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Password salah!
					</div');
				redirect('auth');
			}
		}
		else if($siswa){
			if($password==$siswa['password']){
				$data = [
					'id' => $siswa['nis'],
					'nama' => $siswa['nama']
				];
				$this->session->set_userdata($data);
				redirect('Siswa');
			}
			else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Password salah!
					</div');
				redirect('auth');
			}
			
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
				NIS/NIP tidak ditemukan!
				</div');
			redirect('auth');
		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('pesan', '<div class=" alert alert-success" role="alert">
			Anda Berhasil Logout</div>');
		redirect('auth');
	}
	public function viewgantipass($nama,$id)
	{
		$data['id'] = $id;
		$data['nama'] = $nama;
		$this->load->view('auth/gantipassword',$data);
	}
	public function gantipassword()
	{
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'matches' => 'Pengulangan password tidak sama!',
			'min_length' => 'Minimal password terdiri dari 6 karakter!',
			'required' => 'Password tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->viewgantipass($_POST['nama'],$_POST['id']);
		} else {
			$guru = $this->db->get_where('tbl_pegawai',['nip'=>$_POST['id']])->row_array();
			$siswa = $this->db->get_where('tbl_siswa',['nis'=>$_POST['id']])->row_array();
			if ($guru) {
				$this->db->set('Password', $_POST['password1']);
				$this->db->where('nip',$guru['nip']);
				$this->db->update('tbl_pegawai');
			}else if ($siswa) {	
				$this->db->set('Password', $_POST['password1']);
				$this->db->where('nis',$siswa['nis']);
				$this->db->update('tbl_siswa');
			}
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('nama');
			$this->session->set_flashdata('pesan', '<div class=" alert alert-success" role="alert">
				Berhasil, Silahkan login menggunakan password baru</div>');
			redirect('auth');
		}
	}

}

?>