
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Main Footer Area -->
        <div class="main-footer-area bg-overlay" style="background-image: url(<?php echo base_url(); ?>asset/sw/img/bg-img/bg-1.jpg); padding-top:30px;">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-4 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="footer-widget">
                          <div class="widget-title">
                              <h6>KONTAK </h6>
                          </div>

                          <?php $query = $this->db->get('identitas');
                          foreach ($query->result() as $row) {
                            echo "<p>".$row->no_telp."</p>"; } ?>


                        </div>
                    </div>

                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-4 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <!--    <div class="footer-widget">
                            <div class="widget-title">
                                <h6> </h6>
                            </div><center>
                            <?php $query = $this->db->get('identitas');
                            foreach ($query->result() as $row) {
                              echo "<p>".$row->alamat."</p>"; } ?> 
                            <img src="<?php echo base_url(); ?>asset/images/bankmandiri.png" width="120" >
                            <a href="https://play.google.com/store/apps/details?id=com.koinpintarkita.apps" target="_blank">
                            <img src="<?php echo base_url(); ?>asset/images/googleplay.png" width="140" > </a> </center>

                        </div> -->
                    </div>


                    <div class="col-12 col-sm-4 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="footer-widget">
                            <div class="widget-title">
                                <h6>MEMBER TERBARU </h6>
                            </div>
                            <marquee behavior="scroll" direction="up" truespeed="60" height="150">
                            <?php
                            $memberbaru = $this->model_members->list_member_baru();
                            foreach ($memberbaru->result_array() as $row ) {

                              echo  '<p style="color:#fff; line-height:12px;">'.strtoupper($row['nama_lengkap'])." - ".strtoupper($row['kota']);
                              echo '</p>';
                            }

                            ?>

                            </marquee>


                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12">
                        <p>
Copyright &copy;<?php echo date('Y'); ?> All Rights Reserved. | <a href="https://KoinPintarKita.id/">AkademiPintarKita.id</a>

</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo base_url(); ?>asset/sw/js/active.js"></script>
      <script src="<?php echo base_url(); ?>asset/sw/js/animated.js"></script>

    <!-- script form validation registrasi -->
    <script type="text/javascript" >
    $('input[type="text"]#namal')
    	.on('invalid', function(){
    		return this.setCustomValidity('Voucher harus diisi.');
    	})
    	.on('input', function(){
    		return this.setCustomValidity('');
    	});

      $('input[type="text"]#kotaa')
        .on('invalid', function(){
          return this.setCustomValidity('Kota/Kabupaten Harus diisi.');
        })
        .on('input', function(){
          return this.setCustomValidity('');
        });

      $('input[type="email"]')
      	.on('invalid', function(){
      		return this.setCustomValidity('Alamat Email harus diisi, dan harus diingat karena untuk LOGIN Anda nanti.');
      	})
      	.on('input', function(){
      		return this.setCustomValidity('');
      	});

        $('input[type="password"]')
        	.on('invalid', function(){
        		return this.setCustomValidity('Password harus diisi, dan harus diingat karena untuk LOGIN Anda nanti.');
        	})
        	.on('input', function(){
        		return this.setCustomValidity('');
        	});

      $('input[type="number"]#nohpp')
            .on('invalid', function(){
              return this.setCustomValidity('Nomor HP harus diisi. Hanya boleh angka saja, tanpa tanda (-) atau tanda baca lainnya.');
            })
            .on('input', function(){
              return this.setCustomValidity('');
            });

    </script>

<script>
$(document).ready(function(){

   $("#text_username").keyup(function(){

      var username = $(this).val().trim();

      if(username != ''){

         $.ajax({
            url: '<?php echo base_url('auth/cek_username'); ?>',
            type: 'post',
            data: {username: username},
            success: function(response){

                $('#uname_response').html(response);

             }
         });
      }else{
         $("#uname_response").html("");
      }

    });

 });
</script>

<script>
$(document).ready(function(){

   $("#emaile").keyup(function(){

      var email = $(this).val().trim();

      if(email != ''){

         $.ajax({
            url: '<?php echo base_url('auth/cek_email'); ?>',
            type: 'post',
            data: {email: email},
            success: function(response){

                $('#email_response').html(response);

             }
         });
      }else{
         $("#email_response").html("");
      }

    });

 });
</script>

<script>
$(document).ready(function(){

   $("#nomor_ktp").keyup(function(){

      var noktp = $(this).val().trim();

      if(noktp != ''){

         $.ajax({
            url: '<?php echo base_url('auth/cek_ktp'); ?>',
            type: 'post',
            data: {noktp: noktp},
            success: function(response){

                $('#ktp_response').html(response);

             }
         });
      }else{
         $("#ktp_response").html("");
      }

    });

 });
</script>


    

</body>

</html>
