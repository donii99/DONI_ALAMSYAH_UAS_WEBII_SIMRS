<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Daftar User</h2>
      <p class="card-text">Berikut adalah data users yang terdaftar dalam sistem.</p>
      <a href="<?php echo base_url('users/tambah'); ?>" class="btn btn-primary mb-3">
        <i class="fe fe-user-plus"></i> Tambah users
      </a>
      <div class="row my-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <table class="table datatables" id="dataTable-1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Nama Dokter</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach ($users as $p): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $p->username; ?></td>
                        <td><?php echo ucfirst($p->role); ?></td>
                        <td><?php echo $p->nama_dokter ?: '-'; ?></td>
                      <td>
                        <a href="<?php echo base_url('users/edit/'.$p->id); ?>" class="btn btn-sm btn-warning">
                          <i class="fe fe-edit"></i>
                        </a>
                        <a href="<?php echo base_url('users/delete/'.$p->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus users ini?')">
                          <i class="fe fe-trash-2"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div> 
      </div> 
    </div> 
  </div> 
</div> 


<?php $this->load->view('templates/footer'); ?>
