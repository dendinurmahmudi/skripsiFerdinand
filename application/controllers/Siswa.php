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
			$email = $data['siswa']['email'];
			$foto = $data['siswa']['foto'];
		}
		else{
			$nama = 'default';
			$email = 'email@mail.com';
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
			$data['email'] = $email;
			$data['judul'] = 'Beranda';
			$data['rata210'] = $this->siswa_models->nilairata2($id,'10');
			$data['rata211'] = $this->siswa_models->nilairata2($id,'11');
			$data['rata212'] = $this->siswa_models->nilairata2($id,'12');
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
			$email = $data['siswa']['email'];
			$foto = $data['siswa']['foto'];
		}
		else{
			$nama = 'default';
			$email = 'email@mail.com';
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
			$data['email'] = $email;
			$data['judul'] = 'Data Nilai';
			$data['nilai10'] = $this->siswa_models->getnilai($id,'10');
			$data['nilai11'] = $this->siswa_models->getnilai($id,'11');
			$data['nilai12'] = $this->siswa_models->getnilai($id,'12');
			$data['rata210'] = $this->siswa_models->nilairata2($id,'10');
			$data['rata211'] = $this->siswa_models->nilairata2($id,'11');
			$data['rata212'] = $this->siswa_models->nilairata2($id,'12');
			$data['kelas'] = $this->siswa_models->getdetkelas($id);
			$this->load->view('templates/header',$data);
			$this->load->view('siswa/sidebar',$data);
			$this->load->view('siswa/datanilai',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datamapel()
	{
		$data['siswa'] = $this->db->get_where('tbl_siswa', ['nis'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['siswa']['nis'];
			$nama = $data['siswa']['nama'];
			$email = $data['siswa']['email'];
			$foto = $data['siswa']['foto'];
		}
		else{
			$nama = 'default';
			$email = 'email@mail.com';
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
			$data['email'] = $email;
			$kls = $this->db->query('select * from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where nis="'.$id.'"')->row_array();
			$data['judul'] = 'Data Mapel kelas '.$kls['kelas'].' '.$kls['kd_jurusan'].' '.$kls['detail_kelas'];
			$data['datamapel'] = $this->siswa_models->getmapel($kls['kelas'],$kls['jurusan'],$kls['detail_kelas']);
			$this->load->view('templates/header',$data);
			$this->load->view('siswa/sidebar',$data);
			$this->load->view('siswa/datamapel',$data);
			$this->load->view('templates/footer',$data);
		}
	}
}
?>