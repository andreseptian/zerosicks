<div class="row">
    <div class="col-md-12">
        <a href="Informasi_user/video/">
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Informasi Video</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                                <i class="fa fa-refresh"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="card">
                            <div class="details">
                                <div class="content">
                                    <p class="col-md">
                                        <img src="<?php echo base_url(); ?>assets/file_upload/foto_informasi/kecil/video.jpeg" alt="" width="100%">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <?php
        foreach ($informasi as $info) {
        ?>
            <a href="Informasi_user/read/<?php echo $info->id_informasi ?>">

                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo $info->judul_informasi ?></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                                    <i class="fa fa-refresh"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="card">
                                <div class="details">
                                    <div class="content">
                                        <p class="col-md">
                                            <img src="<?php echo base_url(); ?>assets/file_upload/foto_informasi/kecil/<?php echo $info->foto_informasi; ?>" alt="" width="100%">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
            ?>
            </a>


    </div>
</div>