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
      <?php echo form_open("auth/login"); ?>
      <h2 class="title"><?= $this->config->item('sitename_login') ?></h2>

      <?php
      if ($message != "") {
      ?>
        <div id="infoMessage" class="callout callout-info"><b><?php echo $message; ?></b></div>
      <?php } ?>
      <p class="login-box-msg"><?php echo lang('login_subheading'); ?></p>
      <br>
      <div class="input-div one">
        <div class="i">
          <i class="fas fa-user"></i>
        </div>
        <div class="div">
          <h5>Email</h5>
          <input type="text" name="identity" class="form-control input" required="required" autofocus>
        </div>
      </div>
      <div class="input-div pass">
        <div class="i">
          <i class="fas fa-lock"></i>
        </div>
        <div class="div">
          <h5>Password</h5>
          <input type="password" id="password" data-toggle="password" name="password" class="form-control input" required="required">
        </div>
      </div>
      <a href="forgot_password" class="forgot">Forgot Password?</a>
      <input type="submit" class="btn" value="Masuk">
      <a href="register" class="btn_register">Daftar</a>
      <a href="<?= base_url('assets/file/Zerosicks-Analysis-Table.xlsx'); ?>" class="btn_form">User Guide</a>

      <div style="text-align: center; color :black">
        <br>
        <strong style="font-size: 12px;"><br> Copyright &copy; 2020. <strong style="color: blueviolet;">Zerosicks</strong>
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