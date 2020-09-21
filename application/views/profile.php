<!-- Default box -->
<div class="row">
  <div class="col-md-3 col-xs-12">
    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/file_upload/foto_profile/<?php echo $user->foto; ?>" alt="User profile picture">
        <h3 class="profile-username text-center"><?= $this->ion_auth->user()->row()->first_name ?> <?= $this->ion_auth->user()->row()->last_name; ?>
        </h3>
        <!-- <h5 class="text-muted text-center"><b><?= $this->ion_auth->user()->row()->jenis_user; ?></b><br><b><b><?= $this->ion_auth->user()->row()->jabatan ?> PMK UNY </b> </b></h5> -->
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Email</b> <a class="pull-right"><?= $this->ion_auth->user()->row()->email; ?></a>
          </li>
          <li class="list-group-item">
            <b>Telepon</b> <a class="pull-right"><?= $this->ion_auth->user()->row()->phone; ?></a>
          </li>
          <li class="list-group-item">
            <b>Kata Sandi</b> <b> <a class=" pull-right" href="<?= site_url('profile/gantipassword'); ?>">Ganti Kata Sandi</a></b>
          </li>
        </ul>
        <a href="<?= base_url(); ?>form" class="btn bg-green btn-block"><b>Form Analisis</b></a>
        <a href="<?= base_url(); ?>auth/logout" class="btn bg-red btn-block"><b>Keluar</b></a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!--  box edit-->
  <div class="col-md-5 col-xs-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Edit Profile</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <?php echo form_open_multipart('profile/update_action'); ?>
      <div class="box-body">
        <div class="alert alert-info">Isian bertanda <span style="color: red;">*</span> wajib diisi.</div>
        <div class="form-group">
          <label>Nama Depan <span style="color: red;">*</span></label><small><i> <?php echo form_error('first_name'); ?></i></small>
          <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $user->first_name; ?>" required="required">
        </div>
        <div class="form-group">
          <label for="callname">Nama Belakang <span style="color: red;">*</span></label><small><i> <?php echo form_error('last_name') ?></i></small>
          <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $user->last_name; ?>" required="required">
        </div>
        <div class="form-group">
          <label for="email">Email <span style="color: red;">*</span></label>
          <input type="email" class="form-control" id="email" name="email" value="<?= $user->email; ?>" readonly>
        </div>
        <!-- <div class="form-group">
          <label for="enum">Jenis Keanggotaan <span style="color: red;">*</span></label><small><i> <?php echo form_error('jenis_user') ?></i></small>
          <select class="form-control selectpicker" data-live-search="true" type="text" class="form-control" id="jenis_user" name="jenis_user" value="<?= $user->jenis_user; ?>" />
          <option value="<?= $user->jenis_user; ?>"><?= $user->jenis_user; ?></option>
          <option value=''>-- Please select --</option>
          <option value='Anggota Biasa'>Anggota Biasa (Mahasiswa Aktif)</option>
          <option value='Anggota Luar Biasa'>Anggota Luar Biasa (Alumni) </option> </select>
        </div> -->
        <div class="form-group">
          <label for="phone">Nomor Telepon <span style="color: red;">*</span></label><small><i> <?php echo form_error('phone') ?></i></small>
          <input type="text" class="form-control" id="phone" name="phone" value="<?= $user->phone; ?>" required="required">

        </div>
        <div class="form-group">
          <div class="custom-file">
            <label class="custom-file-label" for="foto">Ganti Foto Profile</label><small><i> (Biarkan kosong jika tidak ingin mengganti foto)</i></small>
            <input type="file" class="custom-file-input" id="foto" name="foto">
            <input type="hidden" class="custom-file-input" id="old" name="old" value="<?= $user->foto; ?>">
            <small>*Format file: png, jpg, jpeg, gif, Ukuran file max.: 5000KB, <b><i>Ukuran foto disarankan dalam bentuk persegi</i></b></small>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-left">&nbsp; Simpan &nbsp;</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
  <!--  / box edit-->


</div>