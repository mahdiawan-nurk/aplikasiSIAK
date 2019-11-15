<?php
/**
 * 
 */
class M_asset extends CI_Model
{
	
	public function data_asset_prodi($prodi)
	{

		$this->db->select('*');
		$this->db->from('app_aset_prodi');
		$this->db->join('app_ruangan', 'app_aset_prodi.ruangan_id = app_ruangan.ruangan_id');
		$this->db->where('app_aset_prodi.prodi_id',$prodi);
		return $this->db->get();
	}

	public function get_data($id)
	{
		return $this->db->get_where('app_aset_prodi', array('id_aset_brng' =>$id  ));
	}

	public function save_data($data)
	{
		return $this->db->insert('app_aset_prodi',$data );
	}

	public function update_data($data,$id)
	{
		$this->db->where('id_aset_brng',$id);
		return $this->db->update('app_aset_prodi',$data);
	}

	public function histori_peminjaman_mhs($id)
	{
		$sql="SELECT * FROM app_data_peminjam a INNER JOIN tbl_mahasiswa b ON a.nim=b.nim INNER JOIN makul_matakuliah c ON a.kegiatan=c.makul_id INNER JOIN tbl_dosen d ON a.dosen_pemb=d.nrp WHERE a.nim='".$id."' ";

		return $this->db->query($sql)->result();
	}
}