<?php 
/**
  * 
  */
class admin_models extends CI_Model
{
	public function getallguru(){
		return $this->db->query('select *, tbl_pegawai.nip from tbl_pegawai join tbl_mata_pelajaran on tbl_pegawai.kd_makul=tbl_mata_pelajaran.id_mapel left join tbl_pelajaran on tbl_pegawai.nip=tbl_pelajaran.nip left join tbl_jurusan on tbl_pelajaran.jurusan=tbl_jurusan.id_jurusan group by nama order by nama')->result_array();
	}
	public function getklsajar($nip)
	{
		return $this->db->query('select *, tbl_pegawai.nip from tbl_pegawai join tbl_mata_pelajaran on tbl_pegawai.kd_makul=tbl_mata_pelajaran.id_mapel left join tbl_pelajaran on tbl_pegawai.nip=tbl_pelajaran.nip left join tbl_jurusan on tbl_pelajaran.jurusan=tbl_jurusan.id_jurusan where tbl_pegawai.nip="'.$nip.'" ')->result_array();
	}
	public function getallsiswa($id){
		return $this->db->query('select * from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where id_jurusan="'.$id.'" and kelas!="13" order by nama')->result_array();
	}
	public function getallsiswabykls($id){
		return $this->db->query('select * from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where kelas="'.$id.'" order by nama')->result_array();
	}
	public function getjumlahjurusan(){
		return $this->db->query('select nama_jurusan, id_jurusan, count(jurusan)jumlah from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where kelas!="13" group by nama_jurusan')->result_array();
	}
	public function getalljurusan(){
		return $this->db->get('tbl_jurusan')->result_array();
	}
	public function getkelas($kls){
		return $this->db->query('select kelas,kd_jurusan,id_jurusan, count(nama)jumlah from tbl_siswa right join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where kelas="'.$kls.'" group by jurusan')->result_array();
	}
	public function getbykelas($kls,$jrsn,$dk){
		return $this->db->query('select kelas, kd_jurusan, detail_kelas , count(kelas)jumlah from tbl_siswa right join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where kelas="'.$kls.'" and jurusan="'.$jrsn.'" and detail_kelas="'.$dk.'"')->result_array();
	}
	public function getallpelajaran(){
		return $this->db->get('tbl_mata_pelajaran')->result_array();
	}
	public function getallmapel(){
		return $this->db->query('select id_mapel, nama_mapel, count(kd_makul)jumlah from tbl_mata_pelajaran left join tbl_pegawai  on tbl_pegawai.kd_makul=tbl_mata_pelajaran.id_mapel group by id_mapel')->result_array();
	}
	public function getdetailkelas($jrsn,$kls)
	{
		return $this->db->query('select detail_kelas,kd_jurusan,kelas from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where jurusan="'.$jrsn.'" and kelas="'.$kls.'" group by detail_kelas')->result_array();
	}
	public function getasiswabydetkelas($jrsn,$kls,$dk){
		return $this->db->query('select * from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where jurusan="'.$jrsn.'" and kelas="'.$kls.'" and detail_kelas="'.$dk.'" order by nama')->result_array();
	}
	public function getkelasjurusan($jrsn,$kls){
		return $this->db->query('select kelas, id_jurusan, kd_jurusan, detail_kelas, count(nama)jumlah from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where kelas="'.$kls.'" and id_jurusan="'.$jrsn.'" group by detail_kelas;')->result_array();
	}
	public function getkdjurusan($jrsn){
		return $this->db->query('select * from tbl_jurusan where id_jurusan="'.$jrsn.'"')->row_array();
	}
	public function getjmlsiswa()
	{
		return $this->db->query('select * from tbl_siswa where kelas!="13"')->result_array();	
	}
	public function getjmlguru()
	{
		return $this->db->get('tbl_pegawai')->result_array();	
	}
	public function getjmlmapel()
	{
		return $this->db->get('tbl_mata_pelajaran')->result_array();	
	}
	public function getjmljrsn()
	{
		return $this->db->get('tbl_jurusan')->result_array();	
	}
	public function getjurusanlulus($thn)
	{
		return $this->db->query('select id_jurusan,kd_jurusan,ket_lulus,count(ket_lulus)jumlah from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where ket_lulus="'.$thn.'" group by kd_jurusan')->result_array();
	}
	public function getthnlulus()
	{
		return $this->db->query('select ket_lulus, count(ket_lulus)jumlah from tbl_siswa where ket_lulus!="Belum lulus" group by ket_lulus')->result_array();
	}
	public function getdetpeg($nip)
	{
		return $this->db->query('select * from tbl_pegawai join tbl_pelajaran on tbl_pegawai.nip=tbl_pelajaran.nip join tbl_mata_pelajaran on tbl_mata_pelajaran.id_mapel=tbl_pelajaran.id_mapel where tbl_pegawai.nip="'.$nip.'"')->row_array();;
	}
	

}
