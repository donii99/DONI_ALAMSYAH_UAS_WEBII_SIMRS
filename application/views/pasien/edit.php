<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow mb-4">
        <div class="card-header">
          <h4 class="mb-0"><i class="fe fe-edit-2"></i> Edit Pasien</h4>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo base_url('pasien/edit/'.$pasien->id); ?>">
            <div class="form-group">
              <label for="nomor_rekam_medis">No. Rekam Medis</label>
              <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis" class="form-control" value="<?php echo $pasien->nomor_rekam_medis; ?>" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $pasien->nama; ?>" required>
            </div>
            <div class="form-group">
              <label for="umur">Umur</label>
              <input type="number" id="umur" name="umur" class="form-control" value="<?php echo $pasien->umur; ?>" required>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                <option value="L" <?php echo $pasien->jenis_kelamin == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="P" <?php echo $pasien->jenis_kelamin == 'P' ? 'selected' : ''; ?>>Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea id="alamat" name="alamat" class="form-control" rows="3"><?php echo $pasien->alamat; ?></textarea>
            </div>
            <div class="form-group text-right">
              <a href="<?php echo base_url('pasien'); ?>" class="btn btn-secondary">
                <i class="fe fe-arrow-left"></i> Kembali
              </a>
              <button type="submit" class="btn btn-primary">
                <i class="fe fe-save"></i> Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('templates/footer'); ?>