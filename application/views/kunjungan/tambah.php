<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow mb-4">
        <div class="card-header">
          <h4 class="mb-0"><i class="fe fe-user-plus"></i> Tambah Kunjungan</h4>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo base_url('kunjungan/tambah'); ?>">
             <div class="form-group">
                <label>Pasien</label>
                <select name="id_pasien" class="form-control" required>
                    <option value="">Pilih Pasien</option>
                    <?php foreach ($pasien as $p): ?>
                        <option value="<?php echo $p->id; ?>"><?php echo $p->nama; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Dokter</label>
                <?php if ($this->session->userdata('peran') == 'dokter'): ?>
                    <input type="hidden" name="id_dokter" value="<?php echo $this->session->userdata('id_dokter'); ?>">
                    <input type="text" class="form-control" value="<?php echo $this->Model_kunjungan->ambil_dokter_by_id($this->session->userdata('id_dokter'))->nama; ?>" readonly>
                <?php else: ?>
                    <select name="id_dokter" class="form-control" required>
                        <option value="">Pilih Dokter</option>
                        <?php foreach ($dokter as $d): ?>
                            <option value="<?php echo $d->id; ?>"><?php echo $d->nama; ?></option>
                        <?php endforeach; ?>
                    </select>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label>Poli</label>
                <select name="id_poli" class="form-control" required>
                    <option value="">Pilih Poli</option>
                    <?php foreach ($poli as $po): ?>
                        <option value="<?php echo $po->id; ?>"><?php echo $po->nama; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Kunjungan</label>
                <input type="date" name="tanggal_kunjungan" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <textarea name="keluhan" class="form-control" required></textarea>
            </div>
            <div class="form-group text-right">
              <a href="<?php echo base_url('kunjungan'); ?>" class="btn btn-secondary">
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
