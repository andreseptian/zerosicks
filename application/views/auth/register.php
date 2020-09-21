<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Zerosicks | Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8595170555.js" crossorigin="anonymous"></script>
</head>

<body style="height: 100%;overflow: auto;">
    <img class="wave" src="<?= base_url(); ?>assets/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="<?= base_url(); ?>assets/img/bg.svg">
        </div>
        <div class="login-content">
            <?php echo form_open("auth/register"); ?>
            <h2 class="title"><?= $this->config->item('sitename_login') ?></h2>
            <p class="login-box-msg">Mendaftar Akun Zerosicks</p>
            <?php
            if ($message != "") {
            ?>
                <div id="infoMessage" class="callout callout-info"><b><?php echo $message; ?></b></div>
            <?php } ?>
            <br>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <?php
                if ($identity_column !== 'email') {
                    echo '<p>';
                    echo lang('create_user_identity_label', 'identity');
                    echo '<br />';
                    echo form_error('identity');
                    echo form_input($identity);
                    echo '</p>';
                }
                ?>
                <div class="div">
                    <h5>Email</h5>
                    <?php echo form_input($email); ?>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Kata Sandi</h5>
                    <?php echo form_input($password); ?>
                </div>
            </div>
            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Ulangi Kata Sandi</h5>
                    <?php echo form_input($password_confirm); ?>
                </div>
            </div>
            <input type="submit" class="btn_kirim" value="Daftar">
            <a href="login" class="btn_login">Kembali</a>

            <?php echo form_input($foto); ?>
            <div style="text-align: center; color :black">
                <br>
                <strong style="font-size: 12px;"><br><br><br> Copyright &copy; 2020. <strong style="color: blueviolet;">Zerosicks</strong>
                    <p style="line-height: 15px;"> Program Studi Pendidikan Teknik Elektro <br> Fakultas Teknik <br> Universitas Negeri Yogyakarta</p>
                </strong>
            </div>
            <?php echo form_close(); ?>

        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll(".input");


        function addcl() {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }


        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>

</body>

</html>