<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin_models');
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
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['datasiswa'] = $this->admin_models->getjmlsiswa();
			$data['datapegawai'] = $this->admin_models->getjmlguru();
			$data['datamapel'] = $this->admin_models->getjmlmapel();
			$data['datajurusan'] = $this->admin_models->getjmljrsn();
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/index',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datasiswa($jrsn,$kelas,$dk) {
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$kdjrsn = $this->admin_models->getkdjurusan($jrsn);
			if ($kelas == 0 && $dk == 0) {
				$data['datasiswa'] = $this->admin_models->getallsiswa($jrsn);
				$data['judul'] = 'Data Siswa jurusan '.$kdjrsn['kd_jurusan'];
			}else{
				$data['datasiswa'] = $this->admin_models->getasiswabydetkelas($jrsn, $kelas, $dk);
				$data['judul'] = 'Data Siswa kelas '.$kelas.' '.$kdjrsn['kd_jurusan'].' '.$dk;
			}
			$data['datajurusan'] = $this->admin_models->getalljurusan();
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datasiswa',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datapegawai() {
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['judul'] = 'Data Pegawai';
			$data['datapegawai'] = $this->admin_models->getallguru();
			$data['datajurusan'] = $this->admin_models->getalljurusan();
			$data['datapelajaran'] = $this->admin_models->getallpelajaran();
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datapegawai',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datajurusan() {
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['judul'] = 'Data jurusan';
			$data['datajurusan'] = $this->admin_models->getalljurusan();
			$data['jumlahjurusan'] = $this->admin_models->getjumlahjurusan();
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datajurusan',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function tambahjurusan(){
		$jurusan = $this->input->post('namajurusan',true);
		$data = [
			'nama_jurusan' => $jurusan,
			'kd_jurusan' => $this->input->post('kodejurusan',true)
		];
		$this->db->insert('tbl_jurusan',$data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil menambah jurusan '.$jurusan.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datajurusan');
	}
	public function hapusjurusan($jrsn){
		$this->db->where('id_jurusan',$jrsn);
		$this->db->delete('tbl_jurusan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Berhasil menghapus jurusan
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datajurusan');
	}
	public function editjurusan(){
		$nama_jurusan = $this->input->post('namajurusan',true);
		$id_jurusan = $this->input->post('idjurusan',true);
		$this->db->set('nama_jurusan',$nama_jurusan);
		$this->db->set('kd_jurusan',$this->input->post('kodejurusan',true));
		$this->db->where('id_jurusan',$id_jurusan);
		$this->db->update('tbl_jurusan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil mengedit jurusan '.$nama_jurusan.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datajurusan');
	}
	public function tambahsiswa(){
		$this->form_validation->set_rules('nis', 'nis', 'trim|required|is_natural|is_unique[tbl_siswa.nis]', ['required' => '*Field Tidak Boleh Kosong', 'is_natural' => 'Karakter hanya terdiri dari angka','is_unique'=>'Nis sudah digunakan']);
		$this->form_validation->set_rules('namalengkap','Nama','required|trim',['required'=>'Nama belum diisi!']);
		$this->form_validation->set_rules('email','Email','required|trim|valid_email',['required'=>'Email belum diisi!','valid_email'=>'Format email salah!']);
		$this->form_validation->set_rules('ttl','Ttl','required|trim',['required'=>'TTL belum diisi!']);
		$this->form_validation->set_rules('detailkelas','detailkelas','required|trim|is_natural',['required'=>'Detail kelas belum diisi!','is_natural' => 'Karakter hanya terdiri dari angka']);
		$this->form_validation->set_rules('kelas','kelas','required',['required'=>'Kelas belum dipilih!']);
		$this->form_validation->set_rules('jurusan','jurusan','required',['required'=>'jurusan belum dipilih!']);
		if ($this->form_validation->run() == false) {
			$this->kelolasiswa();
		}else{
			$nama = $this->input->post('namalengkap',true);
			$data = [
				'nis' => $this->input->post('nis',true),
				'nama' => $nama,
				'email' => $this->input->post('email',true),
				'kelas' => $this->input->post('kelas',true),
				'jurusan' => $this->input->post('jurusan',true),
				'password' => $this->input->post('nis',true),
				'ttl' => $this->input->post('ttl',true),
				'detail_kelas' => $this->input->post('detailkelas',true),
				'ket_lulus' => "Belum lulus",
				'foto' => 'default.png'
			];
			$this->db->insert('tbl_siswa',$data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Berhasil menambah data siswa bernama '.$nama.'
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div');
			redirect('Admin/kelolasiswa');
		}
	}
	public function editsiswa(){
		$nama = $this->input->post('nama',true);
		$jurusan = $this->input->post('jurusan',true);
		$kelas = $this->input->post('kelas',true);
		$detail_kelas = $this->input->post('detailkelas',true);
		$this->db->set('nama',$nama);
		$this->db->set('email',$this->input->post('email',true));
		$this->db->set('jurusan',$jurusan);
		$this->db->set('kelas',$kelas);
		$this->db->set('ttl',$this->input->post('ttl',true));
		$this->db->set('detail_kelas',$detail_kelas);
		$this->db->where('nis',$this->input->post('nis',true));
		$this->db->update('tbl_siswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil mengedit data '.$nama.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datasiswa/'.$jurusan.'/'.$kelas.'/'.$detail_kelas);
	}
	public function hapussiswa($nis,$jrsn){
		$this->db->where('nis',$nis);
		$this->db->delete('tbl_siswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Berhasil menghapus data siswa
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datasiswa/'.$jurusan.'/'.$kelas.'/'.$detail_kelas);
	}
	public function datakelas($kls) {
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			if ($kls == 13) {
				$data['judul'] = 'Data lulusan per jurusan';
			}else{
				$data['judul'] = 'Data jurusan kelas '.$kls;
			}
			$data['datakelas'] = $this->admin_models->getkelas($kls);
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datakelas',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function tambahpegawai(){
		$data = [
			'nip' => $this->input->post('nip',true),
			'nama' => $this->input->post('namalengkap',true),
			'email' => $this->input->post('email',true),
			'kd_makul' => $this->input->post('kdmapel',true),
			'password' => $this->input->post('nip',true),
			'status' => $this->input->post('status1',true),
			'foto' => 'default.png'
		];
		$this->db->insert('tbl_pegawai',$data);
		$data2 = [
			'nip' => $this->input->post('nip',true),
			'id_mapel' => $this->input->post('kdmapel',true),
			'kelas' => $this->input->post('kelas',true),
			'jurusan' => $this->input->post('jurusan',true),
			'detail_kelas' => $this->input->post('detailkelas',true)
		];
		$this->db->insert('tbl_pelajaran',$data2);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil menambah data pegawai
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datapegawai');
	}
	public function hapuspegawai($nip){
		$this->db->where('nip',$nip);
		$this->db->delete('tbl_pegawai');
		$this->db->where('nip',$nip);
		$this->db->delete('tbl_pelajaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Berhasil menghapus data guru
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datapegawai');
	}
	public function editpegawai(){
		$nama = $this->input->post('nama',true);
		$this->db->set('nama',$nama);
		$this->db->set('email',$this->input->post('email',true));
		$this->db->set('kd_makul',$this->input->post('kdmapel',true));
		$this->db->set('status',$this->input->post('status1',true));
		$this->db->where('nip',$this->input->post('nip',true));
		$this->db->update('tbl_pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil mengedit data '.$nama.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datapegawai');
	}
	public function kelolasiswa(){
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['judul'] = 'Kelola Siswa';
			$data['datajurusan'] = $this->admin_models->getalljurusan();
			$data['datasiswakelas10'] = $this->admin_models->getallsiswabykls('10');
			$data['datasiswakelas11'] = $this->admin_models->getallsiswabykls('11');
			$data['datasiswakelas12'] = $this->admin_models->getallsiswabykls('12');
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/kelolasiswa',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datamapel(){
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['judul'] = 'Data Mapel';
			$data['datamapel'] = $this->admin_models->getallmapel();
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datamapel',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function tambahmapel(){
		$mapel = $this->input->post('namamapel',true);
		$data = [
			'nama_mapel' => $mapel
		];
		$this->db->insert('tbl_mata_pelajaran',$data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil menambah mata pelajaran '.$mapel.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datamapel');
	}
	public function hapusmapel($idmapel){
		$this->db->where('id_mapel',$idmapel);
		$this->db->delete('tbl_mata_pelajaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Berhasil menghapus mata pelajaran
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datamapel');
	}
	public function editmapel(){
		$namamapel = $this->input->post('namamapel',true);
		$this->db->set('nama_mapel',$namamapel);
		$this->db->where('id_mapel',$this->input->post('idmapel',true));
		$this->db->update('tbl_mata_pelajaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil mengedit pelajaran '.$namamapel.'
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datamapel');
	}
	public function updatekelas(){
		$status = $this->input->post('status',true);
		$jml = count($status);
		$lulus = $this->input->post('lulus',true);
		for ($i=0; $i < $jml; $i++) { 
			$this->db->query('update tbl_siswa set kelas=kelas+'.$_POST['status'][$i].' where nis="'.$_POST['nis'][$i].'"');
			if ($lulus == 'lulus' && $_POST['status'][$i] == '1') {
				$this->db->query('update tbl_siswa set ket_lulus='.date('Y').' where nis="'.$_POST['nis'][$i].'"');
			}
		}
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil Mengubah kelas siswa
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/kelolasiswa');
	}
	public function datasiswaperkelas($jrsn,$kls) {
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['jurusankelas'] = $this->admin_models->getkelasjurusan($jrsn,$kls);
			$kdjrsn = $this->admin_models->getkdjurusan($jrsn);
			$data['judul'] = 'Data Jurusan '.$kdjrsn['kd_jurusan'].' Kelas '.$kls;
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/siswaperkelas',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datathnlulus() {
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['judul'] = 'Data lulusan';
			$data['datathnlulus'] = $this->admin_models->getthnlulus();
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datathnlulus',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datajrsnlulus($thn) {
		$data['guru'] = $this->db->get_where('tbl_pegawai', ['nip'=>
			$this->session->userdata('id')])->row_array();
		if($this->session->userdata('id') != null){
			$id = $data['guru']['nip'];
			$nama = $data['guru']['nama'];
			$email = $data['guru']['email'];
			$foto = $data['guru']['foto'];
		}
		else{
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['jurusanlulus'] = $this->admin_models->getjurusanlulus($thn);
			$data['judul'] = 'Data Jurusan Lulusan Tahun '.$thn;
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datajrsnlulus',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function datakelasajar($nip)
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
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$nama = $this->admin_models->getdetpeg($nip);
			$data['detp'] = $this->admin_models->getdetpeg($nip);
			$data['judul'] = 'Data Kelas Ajar '.$nama['nama'];
			$data['datajurusan'] = $this->admin_models->getalljurusan();
			$data['dataklsajar'] = $this->admin_models->getklsajar($nip);
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datakelasajar',$data);
			$this->load->view('templates/footer',$data);
		}
	}
	public function tambahklsajar()
	{
		$nip = $this->input->post('nip',true);
		$data = [
			'nip' => $nip,
			'id_mapel' => $this->input->post('idmapel',true),
			'kelas' => $this->input->post('kelas',true),
			'jurusan' => $this->input->post('jurusan',true),
			'detail_kelas' => $this->input->post('detailkelas',true)
		];
		$this->db->insert('tbl_pelajaran',$data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil menambah kelas
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datakelasajar/'.$nip);		
	}
	public function hapusklsajar($nip,$mapel,$kls,$jrsn,$detkls){
		$this->db->where('nip',$nip);
		$this->db->where('id_mapel',$mapel);
		$this->db->where('kelas',$kls);
		$this->db->where('jurusan',$jrsn);
		$this->db->where('detail_kelas',$detkls);
		$this->db->delete('tbl_pelajaran');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Berhasil menghapus kelas
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
			</div');
		redirect('Admin/datakelasajar/'.$nip);
	}
	public function datanilai($nis)
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
			$id = 'default';
			$email = 'email@mail.com';
			$no_induk ='0';
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
			$data['judul'] = 'Data Nilai';
			$data['nilai10'] = $this->admin_models->getnilai($nis,'10');
			$data['nilai11'] = $this->admin_models->getnilai($nis,'11');
			$data['nilai12'] = $this->admin_models->getnilai($nis,'12');
			$data['rata210'] = $this->admin_models->nilairata2($nis,'10');
			$data['rata211'] = $this->admin_models->nilairata2($nis,'11');
			$data['rata212'] = $this->admin_models->nilairata2($nis,'12');
			$data['kelas'] = $this->admin_models->getdetkelas($nis);
			$this->load->view('templates/header',$data);
			$this->load->view('admin/sidebar',$data);
			$this->load->view('admin/datanilai',$data);
			$this->load->view('templates/footer',$data);
		}
	}

}
?>