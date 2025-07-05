<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Daftar Dokter</h2>
      <p class="card-text">Berikut adalah data dokter yang terdaftar dalam sistem.</p>
      <a href="<?php echo base_url('dokter/tambah'); ?>" class="btn btn-primary mb-3">
        <i class="fe fe-user-plus"></i> Tambah Dokter
      </a>
      <div class="row my-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <table class="table datatables" id="dataTable-1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Spesialisasi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                <?php foreach ($dokter as $d): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d->nama; ?></td>
                    <td><?php echo $d->spesialisasi; ?></td>
                    <td>
                        <a href="<?php echo base_url('dokter/edit/'.$d->id); ?>" class="btn btn-sm btn-warning">
                            <i class="fe fe-edit"></i>
                        </a>
                        <a href="<?php echo base_url('dokter/delete/'.$d->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus dokter?')">
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
