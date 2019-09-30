<?php

class Inventaris_model extends CI_Model
{
	// method untuk menampilkan data buku
	public function showInventaris($id = false,$number = false, $offset = false)
	{
		// membaca semua data buku dari tabel 'books'
		if ($id == false) {
			$query = $this->db->get('inventaris',$number, $offset);
			return $query->result_array();
		} else {
			// membaca data buku berdasarkan id
			$query = $this->db->get_where('inventaris', array("id_barang" => $id));
			return $query->row_array();
		}
	}

	// method untuk hapus data buku berdasarkan id
	public function delBook($id)
	{
		$this->db->delete('books', array("idbuku" => $id));
	}
	public function editBook($judul, $pengarang, $penerbit, $thnterbit, $sinopsis, $idkategori, $filename, $idbuku)
	{
		if ($filename == '') {
			$data = array(
				"judul" => $judul,
				"pengarang" => $pengarang,
				"penerbit" => $penerbit,
				"sinopsis" => $sinopsis,
				"idkategori" => $idkategori,
				"thnterbit" => $thnterbit
			);
		} else {
			$data = array(
				"judul" => $judul,
				"pengarang" => $pengarang,
				"penerbit" => $penerbit,
				"sinopsis" => $sinopsis,
				"idkategori" => $idkategori,
				"thnterbit" => $thnterbit,
				"imgfile" => $filename
			);
		}
		$this->db->update('books', $data, "idbuku = " . $idbuku);
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
	public function insertInventaris($judul, $pengarang, $penerbit, $thnterbit, $sinopsis, $idkategori, $filename)
	{

		$data = array(
			"judul" => $judul,
			"pengarang" => $pengarang,
			"penerbit" => $penerbit,
			"sinopsis" => $sinopsis,
			"idkategori" => $idkategori,
			"thnterbit" => $thnterbit,
			"imgfile" => $filename
		);
		$query = $this->db->insert('books', $data);
	}


	// method untuk menghitung jumlah buku berdasarkan idkategori
	// public function countByCat($idkategori)
	// {
	// 	$query = $this->db->query("SELECT count(*) as jum FROM inventaris WHERE id_barang = '$idkategori'");
	// 	return $query->row()->jum;
	// }

	public function countAll(){
		$query = $this->db->query("SELECT COUNT(*) as jum from inventaris");
		return $query->row()->jum;
	}
}
