<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('guru_models');
	}

	public function index()
	{
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
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
			$data['email'] = $email;
			$data['id'] = $id;
			$data['foto'] = $foto;
			$data['judul'] = 'Beranda';
			$this->load->view('templates/header',$data);
			$this->load->view('guru/sidebar',$data);
			$this->load->view('guru/index',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datakelas()
	{
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
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
			$data['email'] = $email;
			$data['id'] = $id;
			$data['foto'] = $foto;
			$data['judul'] = 'Data Kelas';
			$data['datakelas'] = $this->guru_models->getkelasajar($id);
			$this->load->view('templates/header',$data);
			$this->load->view('guru/sidebar',$data);
			$this->load->view('guru/datakelas',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datasiswa($kls,$jrsn,$dtkls)
	{
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
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
			$data['email'] = $email;
			$data['id'] = $id;
			$data['foto'] = $foto;
			$kdjrsn = $this->guru_models->getkdjurusan($jrsn);
			$pljrn = $this->db->query('select * from tbl_nilai where nip="'.$this->session->userdata('id').'"')->row_array();
			$data['judul'] = 'Data siswa kelas '.$kls.' '.$kdjrsn['kd_jurusan'].' '.$dtkls;
			if($this->db->query('select * from tbl_nilai join tbl_siswa on tbl_nilai.nis=tbl_siswa.nis where nip="'.$pljrn['nip'].'" and id_mapel="'.$pljrn['id_mapel'].'" and tbl_siswa.jurusan="'.$jrsn.'" and kelas="'.$kls.'" and detail_kelas="'.$dtkls.'"')->row_array()){
				$data['datasiswa'] = $this->guru_models->getsiswaajar($kls,$jrsn,$dtkls,$pljrn['id_mapel']);
				$data['nilai'] = 1;
			}else{
				$data['datasiswa'] = $this->guru_models->getsiswakelas($kls,$jrsn,$dtkls);
				$data['nilai'] = null;
			}
			$data['kelas'] = $this->guru_models->getdetkelas($kls,$jrsn,$dtkls);
			$data['mapel'] = $this->db->query('select * from tbl_pelajaran join tbl_mata_pelajaran on tbl_pelajaran.id_mapel=tbl_mata_pelajaran.id_mapel where nip="'.$this->session->userdata('id').'"')->row_array();
			$this->load->view('templates/header',$data);
			$this->load->view('guru/sidebar',$data);
			$this->load->view('guru/datasiswa',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function tambahnilai()
	{
		$pljrn = $this->db->query('select * from tbl_pelajaran where nip="'.$this->session->userdata('id').'"')->row_array();
		$nilai = $this->input->post('nilai',true);
		$kelas = $this->input->post('kelas',true);
		$jurusan = $this->input->post('jurusan',true);
		$detailkelas = $this->input->post('detailkelas',true);
		$jml = count($nilai);
		for ($i=0; $i < $jml; $i++) { 
			if($this->db->query('select * from tbl_nilai where nis="'.$_POST['nis'][$i].'" and nip="'.$pljrn['nip'].'" and id_mapel="'.$pljrn['id_mapel'].'"')->row_array()){
				$this->db->query('update tbl_nilai set nilai="'.$_POST['nilai'][$i].'", grade="'.$this->guru_models->grade($_POST['nilai'][$i]).'", keterangan="'.$this->guru_models->keterangan($_POST['nilai'][$i]).'" where nis="'.$_POST['nis'][$i].'" and nip="'.$pljrn['nip'].'"');
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil mengubah nilai
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div');
			}
			else{
				$data = [
					'id_mapel' => $pljrn['id_mapel'],
					'nis' => $_POST['nis'][$i],
					'nip' => $pljrn['nip'],
					'nilai' => $_POST['nilai'][$i],
					'grade' => $this->guru_models->grade($_POST['nilai'][$i]),
					'keterangan' => $this->guru_models->keterangan($_POST['nilai'][$i])
				];		
				$this->db->insert('tbl_nilai',$data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil menambah nilai
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div');
			}
		}
		redirect('Guru/datasiswa/'.$kelas.'/'.$jurusan.'/'.$detailkelas);
	}
	

}
?>