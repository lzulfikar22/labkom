<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

  <form method="post" action="<?php echo site_url('book/findbooks');
                              ?>">
    <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search" name="key" style="border: 1px solid #cccccc; margin-top: 20px;">
  </form>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Nomor Surat Bebas Labkom</h1>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Nomor Surat</th>
          <th>Nama Mahasiswa</th>
          <th>Angkatan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // menampilkan data buku
        foreach ($surat as $item) :
          ?>
          <tr>
            <td><?php echo $item['nomorsurat'] ?></td>
            <td><?php echo $item['nama_mahasiswa'] ?></td>
            <td><?php echo $item['angkatan'] ?></td>
            <!-- <td><span>Pinjam | </span>
                <?php echo anchor('dashboard/view/' . $barang['id_barang'], 'View', 'Lihat Buku'); ?>
              | <?php echo anchor('dashboard/edit/' . $barang['id_barang'], 'Edit', 'Edit Buku'); ?> |
                <?php echo anchor('inventaris/delete/' . $barang['id_barang'], 'Del', 'Hapus Buku'); ?>
            </!-->
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php echo $this->pagination->create_links(); ?>
  </div>
</main>