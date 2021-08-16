<?php 
/**
  * 
  */
class siswa_models extends CI_Model
{
	public function getnilai($nis,$kls)
	{
		return $this->db->query('select nama_mapel,nilai,grade,keterangan from tbl_siswa join tbl_nilai on tbl_siswa.nis=tbl_nilai.nis join tbl_mata_pelajaran on tbl_nilai.id_mapel=tbl_mata_pelajaran.id_mapel where tbl_siswa.nis="'.$nis.'" and tbl_nilai.kls="'.$kls.'"')->result_array();
	} 
	public function getdetkelas($nis){
		return $this->db->query('select * from tbl_siswa join tbl_jurusan on tbl_siswa.jurusan=tbl_jurusan.id_jurusan where nis="'.$nis.'"')->row_array();
	}
	public function nilairata2($nis,$kls)
	{
		return $this->db->query('select nama_mapel,nilai,grade,keterangan,sum(nilai)/count(nilai) as rata_rata from tbl_siswa join tbl_nilai on tbl_siswa.nis=tbl_nilai.nis join tbl_mata_pelajaran on tbl_nilai.id_mapel=tbl_mata_pelajaran.id_mapel where tbl_siswa.nis="'.$nis.'" and tbl_nilai.kls="'.$kls.'"')->row_array();
	}
	public function getmapel($kls,$jrsn,$dk)
	{
		return $this->db->query('select tbl_pegawai.nama, tbl_mata_pelajaran.nama_mapel from tbl_pelajaran join tbl_pegawai on tbl_pelajaran.nip=tbl_pegawai.nip join tbl_mata_pelajaran on tbl_pelajaran.id_mapel=tbl_mata_pelajaran.id_mapel where kelas="'.$kls.'" and jurusan="'.$jrsn.'" and detail_kelas="'.$dk.'"')->result_array();
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
			$ket = 'Sangat Kompeten';
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