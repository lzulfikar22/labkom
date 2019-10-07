<?php

class Surat_model extends CI_Model
{
	// method untuk menampilkan data buku
	public function showSurat($id = false, $number = false, $offset = false)
	{
		// membaca semua data buku dari tabel 'books'
		if ($id == false) {
			$this->db->order_by('nomorsurat', 'DESC');
			$query = $this->db->get('no_surat', $number, $offset);
			return $query->result_array();
		} else {
			// membaca data buku berdasarkan id
			$query = $this->db->get_where('no_surat', array("id_barang" => $id));
			return $query->row_array();
		}
	}

	// method untuk hapus data buku berdasarkan id
	public function delSurat($id)
	{
		$this->db->delete('surat', array("id_barang" => $id));
	}
	public function editSurat($nama, $jumlah, $idbarang)
	{

		$data = array(
			"nama_barang" => $nama,
			"jumlah_barang" => $jumlah
		);

		$this->db->update('surat', $data, "id_barang = " . $idbarang);
	}

	// method untuk mencari data buku berdasarkan key
	// public function findBook($key)
	// {

	// 	$query = $this->db->query("SELECT * FROM books WHERE judul LIKE '%$key%' 
	// 								OR pengarang LIKE '%$key%' 
	// 								OR penerbit LIKE '%$key%'
	// 								OR sinopsis LIKE '%$key%'
	// 								OR thnterbit LIKE '%$key%'");
	// 	return $query->result_array();
	// }

	// method untuk insert data buku ke tabel 'books'
	public function insertSurat($nama, $jumlah)
	{

		$data = array(
			"nama_barang" => $nama,
			"jumlah_barang" => $jumlah
		);
		$query = $this->db->insert('inventaris', $data);
	}


	// method untuk menghitung jumlah buku berdasarkan idkategori
	// public function countByCat($idkategori)
	// {
	// 	$query = $this->db->query("SELECT count(*) as jum FROM inventaris WHERE id_barang = '$idkategori'");
	// 	return $query->row()->jum;
	// }

	public function countAll()
	{
		$query = $this->db->query("SELECT COUNT(*) as jum from inventaris");
		return $query->row()->jum;
	}
}
