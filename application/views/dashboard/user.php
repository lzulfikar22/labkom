<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

  <form method="post" action="<?php echo site_url('book/findbooks'); // arahkan form submit ke kontroller 'book/findbooks 
                              ?>">
    <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search" name="key" style="border: 1px solid #cccccc; margin-top: 20px;">
  </form>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar User</h1>
  </div>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Username</th>
          <th>Fullname</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // menampilkan data user
        foreach ($user as $user_item) :

          ?>
          <tr>
            <td><?php echo $user_item['username'] ?></td>
            <td><?php echo $user_item['fullname'] ?></td>
            <td><?php echo $user_item['role'] ?></td>
            <td>View | <?php echo anchor('dashboard/edituser/' . $user_item['username'], 'Edit', 'Edit User'); ?> | <?php echo anchor('user/delete/' . $user_item['username'], 'Del', 'Hapus User'); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div class="button">
    <a class="nav-link" href="<?php echo site_url('dashboard/adduser'); ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square">
        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
        <line x1="12" y1="8" x2="12" y2="16"></line>
        <line x1="8" y1="12" x2="16" y2="12"></line>
      </svg>
      Tambah Data Users
    </a>
  </div>
</main>