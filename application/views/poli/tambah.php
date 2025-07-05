<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow mb-4">
        <div class="card-header">
          <h4 class="mb-0"><i class="fe fe-user-plus"></i> Tambah Poli</h4>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo base_url('poli/tambah'); ?>">
             <div class="form-group">
                <label>Nama Poli</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group text-right">
              <a href="<?php echo base_url('poli'); ?>" class="btn btn-secondary">
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
