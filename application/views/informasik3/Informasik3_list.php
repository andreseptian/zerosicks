<div class="row">
  <div class="col-md-4">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><?= $button; ?> Informasik3</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="varchar">Judul Informasi <?php echo form_error('judul_informasi') ?></label>
            <input type="text" class="form-control" name="judul_informasi" id="judul_informasi" placeholder="Judul Informasi" value="<?php echo $judul_informasi; ?>" required />
          </div>
          <div class="form-group">
            <label for="varchar">Isi Informasi <?php echo form_error('isi_informasi') ?></label> <br>
            <textarea name="isi_informasi" id="isi_informasi" cols="50" rows="8" value="<?php echo $isi_informasi; ?>"></textarea>
          </div>
          <div class="form-group">
            <label for="varchar">Foto Informasi <?php echo form_error('foto_informasi') ?></label>
            <input type="file" class="form-control" name="foto_informasi" id="foto_informasi" placeholder="Foto Informasi" value="<?php echo $foto_informasi; ?>" />
          </div>
          <input type="hidden" class="custom-file-input" id="old" name="old" value="<?php echo $foto_informasi; ?>">
          <input type="hidden" name="id_informasi" value="<?php echo $id_informasi; ?>" />
          <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
          <a href="<?php echo site_url('informasik3') ?>" class="btn btn-default">Cancel</a>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-8">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">List Informasik3</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
            <i class="fa fa-refresh"></i></button>
        </div>
      </div>

      <div class="box-body">

        <form id="myform" method="post" onsubmit="return false">

          <div class="row" style="margin-bottom: 10px">
            <div class="col-xs-12 col-md-4">
              <!-- <?php echo anchor(site_url('informasik3/create'), '<i class="fa fa-plus"></i> Create', 'class="btn bg-purple"'); ?> -->
            </div>
            <div class="col-xs-12 col-md-4 text-center">
              <div style="margin-top: 4px" id="message">

              </div>
            </div>
            <div class="col-xs-12 col-md-4 text-right">
              <?php echo anchor(site_url('informasik3/printdoc'), '<i class="fa fa-print"></i> Print Preview', 'class="btn bg-maroon"'); ?>

            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="mytable" style="width:100%">
              <thead>
                <tr>
                  <th width=""></th>
                  <th width="10px">No</th>
                  <th>Judul Informasi</th>
                  <th>Isi Informasi</th>
                  <th>Foto Informasi</th>

                  <th width="80px">Action</th>
                </tr>
              </thead>


            </table>
          </div>
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data Terpilih</button>
        </form>

      </div>
    </div>
  </div>
</div>