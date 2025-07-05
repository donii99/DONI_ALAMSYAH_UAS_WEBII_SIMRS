<?php $this->load->view('templates/header'); ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow mb-4">
        <div class="card-header">
          <h4 class="mb-0"><i class="fe fe-edit-2"></i> Edit User</h4>
        </div>
        <div class="card-body">
          <form method="post" action="<?php echo base_url('users/edit/'.$users->id); ?>">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo set_value('username', isset($users->username) ? $users->username : ''); ?>" required>
                <?php echo form_error('username', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Password (isi jika ingin mengubah)</label>
                <input type="password" name="password" class="form-control">
                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="">Pilih role</option>
                    <option value="admin" <?php echo set_select('role', 'admin', $users->role == 'admin'); ?>>Admin</option>
                    <option value="dokter" <?php echo set_select('role', 'dokter', $users->role == 'dokter'); ?>>Dokter</option>
                    <option value="receptionis" <?php echo set_select('role', 'receptionis', $users->role == 'receptionis'); ?>>Receptionis</option>
                </select>
            </div>
            <div class="form-group">
                <label>ID Dokter (opsional, hanya untuk role dokter)</label>
                <select name="id_dokter" class="form-control">
                    <option value="">Tidak Ada</option>
                    <?php foreach ($dokter as $d): ?>
                        <option value="<?php echo $d->id; ?>" <?php echo set_select('id_dokter', $d->id, $users->id_dokter == $d->id); ?>><?php echo $d->nama; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group text-right">
              <a href="<?php echo base_url('users'); ?>" class="btn btn-secondary">
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