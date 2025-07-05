<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Daftar Pasien</h2>
      <p class="card-text">Berikut adalah data pasien yang terdaftar dalam sistem.</p>
      <a href="<?php echo base_url('pasien/tambah'); ?>" class="btn btn-primary mb-3">
        <i class="fe fe-user-plus"></i> Tambah Pasien
      </a>
      <div class="row my-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <table class="table datatables" id="dataTable-1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No. Rekam Medis</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; foreach ($pasien as $p): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p->nomor_rekam_medis; ?></td>
                      <td><?php echo $p->nama; ?></td>
                      <td><?php echo $p->umur; ?></td>
                      <td><?php echo $p->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                      <td><?php echo $p->alamat; ?></td>
                      <td>
                        <a href="<?php echo base_url('pasien/edit/'.$p->id); ?>" class="btn btn-sm btn-warning">
                          <i class="fe fe-edit"></i>
                        </a>
                        <a href="<?php echo base_url('pasien/delete/'.$p->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pasien ini?')">
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
