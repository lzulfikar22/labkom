<?php
class Inventaris extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		// cek keberadaan session 'username'	
		if (!isset($_SESSION['username'])) {
			// jika session 'username' blm ada, maka arahkan ke kontroller 'login'
			redirect('login');
		}
	}


	// method hapus data buku berdasarkan id
	public function delete($id)
	{
		$this->inventaris_model->delInventaris($id);
		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/inventaris');
	}

	// method untuk tambah data buku
	public function insert()
	{
		// baca data dari form insert buku
		$nama = $_POST['namaBarang'];
		$jumlah = $_POST['jumlahBarang'];
		// panggil method insertBook() di model 'book_model' untuk menjalankan query insert
		$this->inventaris_model->insertInventaris($nama, $jumlah);
		
		// arahkan ke method 'books' di kontroller 'dashboard'
		redirect('dashboard/inventaris');
	}
	
	// method untuk edit data buku berdasarkan id
	public function edit()
	{

		// baca data dari form insert buku
		$nama = $_POST['namaBarang'];
		$jumlah = $_POST['jumlahBarang'];
		$id = $_POST['idbarang'];

		$this->inventaris_model->editInventaris($nama, $jumlah, $id);

		redirect('dashboard/inventaris');
	}

	// method untuk mencari data buku berdasarkan 'key'
	public function findbooks()
	{

		// baca key dari form cari data
		$key = $_POST['key'];

		// ambil session fullname untuk ditampilkan ke header
		$data['fullname'] = $_SESSION['fullname'];

		// panggil method findBook() dari model book_model untuk menjalankan query cari data
		$data['book'] = $this->book_model->findBook($key);

		// tampilkan hasil pencarian di view 'dashboard/books'
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/books', $data);
		$this->load->view('dashboard/footer');
	}
}
