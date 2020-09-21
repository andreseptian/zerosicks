<div class="row">
  <section class="content">
    <div class="callout callout-success">
      <h1>Halo <?= $this->ion_auth->user()->row()->first_name ?>, <?php echo "<span>" . greeting(date("G")); ?></h1>
      <p style="text-align: justify;">Selamat datang di Zerosicks. blablabla(aku bingung ndre ini namanya apa belum tau nanti alamatnya apa) Sistem Informasi yang berisi materi serta form tabel analisis guna mengentahui potensi masalah kerja yang mungkin terjadi dan menurunkan resiko dari potensi/kemungkinan masalah yang akan terjadi.</p>
      <div class="col-md" style="text-align: center;">
        <img class="col-md-4" src="<?php echo base_url(); ?>assets/bahan/1.png" alt="" width="350px">
        <img class="col-xs-12 col-md-4" src="<?php echo base_url(); ?>assets/bahan/3.png" alt="" width="400px">
        <img class=" col-md-4" src="<?php echo base_url(); ?>assets/bahan/2.png" alt="" width="337px">
      </div>
      <br>
      <div class="box-body ">
        <p style="text-align: justify;">Berdasarkan data yang ada, jumlah kasus kecelakaan kerja di Indonesia memang mengalami penurunan. Namun, hal itu masih memerlukan perhatian yang serius sehingga angka kecelakaan kerja dapat ditekan. Untuk itu peningkatan akan budaya K3 harus terus dilaksanakan.</p>
        <p style="text-align: justify;">Untuk mengetahui potensi masalah kerja yang mungkin terjadi dan menurunkan resiko dan potensi/kemungkinan masalah yang akan terjadi silahkan <i>download</i> dan isi <i>Zerosicks Analysis Table</i> pada menu <i><a href="form">"FORM ANALISIS ZEROSICKS"</a></i> </p>
      </div>
    </div>
  </section>
</div>