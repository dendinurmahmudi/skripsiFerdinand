<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('siswa_models');
	}

	public function index()
	{
		$data['siswa'] = $this->db->get_where('tbl_siswa', ['nis'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['siswa']['nis'];
			$nama = $data['siswa']['nama'];
			$foto = $data['siswa']['foto'];
		}
		else{
			$nama = 'default';
			$id ='0';
			$foto = 'default.png';
		}
		if($this->session->userdata('id') == null){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
			redirect('auth');
		}else{
			$data['nama'] = $nama;
			$data['id'] = $id;
			$data['foto'] = $foto;
			$data['judul'] = 'Beranda';
			$this->load->view('templates/header',$data);
			$this->load->view('siswa/sidebar',$data);
			$this->load->view('siswa/index',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datanilai()
	{
		$data['siswa'] = $this->db->get_where('tbl_siswa', ['nis'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['siswa']['nis'];
			$nama = $data['siswa']['nama'];
			$foto = $data['siswa']['foto'];
		}
		else{
			$nama = 'default';
			$id ='0';
			$foto = 'default.png';
		}
		if($this->session->userdata('id') == null){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda harus masuk terlebih dulu!</div');
			redirect('auth');
		}else{
			$data['nama'] = $nama;
			$data['id'] = $id;
			$data['foto'] = $foto;
			$data['judul'] = 'Data Nilai';
			$data['datanilai'] = $this->siswa_models->getnilai($id);
			$data['rata2nilai'] = $this->siswa_models->nilairata2($id);
			$data['kelas'] = $this->siswa_models->getdetkelas($id);
			$this->load->view('templates/header',$data);
			$this->load->view('siswa/sidebar',$data);
			$this->load->view('siswa/datanilai',$data);
			$this->load->view('templates/footer',$data);
		}
	}
}
?>