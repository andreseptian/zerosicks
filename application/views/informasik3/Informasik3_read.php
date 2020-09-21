<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Informasik3 Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr>
                        <td>Judul Informasi</td>
                        <td><?php echo $judul_informasi; ?></td>
                    </tr>
                    <tr>
                        <td>isi Informasi</td>
                        <td><?php echo $isi_informasi; ?></td>
                    </tr>
                    <tr>
                        <td>Foto Informasi</td>
                        <td><?php echo $foto_informasi; ?></td>
                    </tr>
                    <tr>
                        <td><a href="<?php echo site_url('informasik3') ?>" class="btn bg-purple">Cancel</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>