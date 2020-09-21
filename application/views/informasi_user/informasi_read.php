<div class="row">
    <div class="col-xs-12 col-md-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $judul_informasi; ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p style="text-align: justify;"><?php echo $isi_informasi; ?></p>
                <table class="table">
                    <tr>
                        <td><a href="<?php echo site_url('informasi_user') ?>" class="btn bg-red">Kembali</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-md-8">
        <div class="box">
            <!-- <div class="box-header">
                <h3 class="box-title"><?php echo $judul_informasi; ?></h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
                <div>
                    <img src="<?php echo base_url(); ?>assets/file_upload/foto_informasi/<?php echo $foto_informasi; ?>" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>
</div>