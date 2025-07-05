<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Daftar Kunjungan</h2>
      <p class="card-text">Berikut adalah data kunjungan yang terdaftar dalam sistem.</p>
      <a href="<?php echo base_url('kunjungan/tambah'); ?>" class="btn btn-primary mb-3">
        <i class="fe fe-user-plus"></i> Tambah kunjungan
      </a>
      <div class="row my-4">
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <table class="table datatables" id="dataTable-1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pasien</th>
                    <th>Dokter</th>
                    <th>Poli</th>
                    <th>Tanggal</th>
                    <th>Keluhan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                    <?php foreach ($kunjungan as $k): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $k->nama_pasien; ?></td>
                        <td><?php echo $k->nama_dokter; ?></td>
                        <td><?php echo $k->nama_poli; ?></td>
                        <td><?php echo $k->tanggal_kunjungan; ?></td>
                        <td><?php echo $k->keluhan; ?></td>
                      <td>
                        <a href="<?php echo base_url('kunjungan/edit/'.$k->id); ?>" class="btn btn-sm btn-warning">
                          <i class="fe fe-edit"></i>
                        </a>
                        <a href="<?php echo base_url('kunjungan/delete/'.$k->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus kunjungan ini?')">
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
