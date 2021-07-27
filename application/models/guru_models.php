<?php 
/**
  * 
  */
class guru_models extends CI_Model
{
	public function getkelaspljrn($kls,$jrsn,$dtkls)
	{
		return $this->db->query('select nis, count(nama)jumlah from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where kelas="'.$kls.'" and jurusan="'.$jrsn.'" and detail_kelas="'.$dtkls.'" group by kelas and jurusan and detail_kelas')->result_array();	
	}
	public function getkdjurusan($jrsn){
		return $this->db->query('select * from tbl_jurusan where id_jurusan="'.$jrsn.'"')->row_array();
	}
	public function getkelasajar($id)
	{
		return $this->db->query('select * from tbl_pelajaran join tbl_jurusan on tbl_pelajaran.jurusan=tbl_jurusan.id_jurusan where nip="'.$id.'"')->result_array();	
	}
	public function getsiswaajar($kls,$jrsn,$dk,$nl){
		return $this->db->query('select *,tbl_siswa.nis from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan left join tbl_nilai on tbl_siswa.nis=tbl_nilai.nis where jurusan="'.$jrsn.'" and kelas="'.$kls.'" and detail_kelas="'.$dk.'" and tbl_nilai.id_mapel="'.$nl.'" order by nama')->result_array();
	}
	public function getsiswakelas($kls,$jrsn,$dk)
	{
		return $this->db->query('select *,tbl_siswa.nis from tbl_siswa left join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where jurusan="'.$jrsn.'" and kelas="'.$kls.'" and detail_kelas="'.$dk.'" order by nama;')->result_array();
	}
	public function getdetkelas($kls,$jrsn,$dk){
		return $this->db->query('select *,tbl_siswa.nis from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan left join tbl_nilai on tbl_siswa.nis=tbl_nilai.nis where jurusan="'.$jrsn.'" and kelas="'.$kls.'" and detail_kelas="'.$dk.'" group by kelas')->row_array();
	}
	public function grade($nilai)
	{
		
		if($nilai >=95){
			$grade = 'A+';
		}elseif ($nilai >=90 && $nilai <=94) {
			$grade = 'A';
		}elseif ($nilai >=85 && $nilai <=89.9) {
			$grade = 'A-';
		}elseif ($nilai >=80 && $nilai <=84.9) {
			$grade = 'B+';
		}elseif ($nilai >=75 && $nilai <=79.9) {
			$grade = 'B';
		}elseif ($nilai >=70 && $nilai <=74.9) {
			$grade = 'B-';
		}elseif ($nilai >=60 && $nilai <=69.9) {
			$grade = 'C';
		}elseif ($nilai >=1 && $nilai <=59.9){
			$grade = 'D';
		}else{
			$grade='-';
		}
		return $grade;
	}
	public function keterangan($nilai)
	{
		
		if($nilai >=95){
			$ket = 'Sangat Kompenten';
		}elseif ($nilai >=90 && $nilai <=94.9) {
			$ket = 'Sangat Kompeten';
		}elseif ($nilai >=85 && $nilai <=89.9) {
			$ket = 'Sanagat Kompeten';
		}elseif ($nilai >=80 && $nilai <=84.9) {
			$ket = 'Kompeten';
		}elseif ($nilai >=75 && $nilai <=79.9) {
			$ket = 'Kompeten';
		}elseif ($nilai >=70 && $nilai <=74.9) {
			$ket = 'Kompeten';
		}elseif ($nilai >=60 && $nilai <=69.9) {
			$ket = 'Cukup Kompeten';
		}elseif ($nilai >=1 && $nilai <=59.9){
			$ket = 'Belum Kompeten';
		}else{
			$ket='-';
		}
		return $ket;
	}

}
?>