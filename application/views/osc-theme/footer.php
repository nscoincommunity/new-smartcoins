 <!-- ========Footer-Section Starts Here ========-->
        <footer class="footer-top padding-top">
            <div class="footer-shape"></div>
            <div class="tree1">
                <img src="<?php echo base_url();?>asset/osc/images/footer/tree1.png" alt="footer">
            </div>
            <div class="tree2 wow slideInUp">
                <img src="<?php echo base_url();?>asset/osc/images/footer/tree2.png" alt="footer">
            </div>
            <div class="futa">
                <img src="<?php echo base_url();?>asset/osc/images/footer/futa.png" alt="footer">
            </div>
            <div class="futa two">
                <img src="<?php echo base_url();?>asset/osc/images/footer/futa.png" alt="footer">
            </div>
            <div class="coin-3">
                <img src="<?php echo base_url();?>asset/osc/images/footer/coin1.png" alt="footer">
            </div>
            <div class="coin-3 two">
                <img src="<?php echo base_url();?>asset/osc/images/footer/coin1.png" alt="footer">
            </div>
            <div class="coin-3 three">
                <img src="<?php echo base_url();?>asset/osc/images/footer/coin1.png" alt="footer">
            </div>
            <div class="coin-4">
                <img src="<?php echo base_url();?>asset/osc/images/footer/coin1.png" alt="footer">
            </div>
            <div class="coin-4 two">
                <img src="<?php echo base_url();?>asset/osc/images/footer/coin1.png" alt="footer">
            </div>
            <div class="coin-4 three">
                <img src="<?php echo base_url();?>asset/osc/images/footer/coin1.png" alt="footer">
            </div>
            <div class="coin-4 four">
                <img src="<?php echo base_url();?>asset/osc/images/footer/coin1.png" alt="footer">
            </div>
            <div class="star-2 two">
                <img src="<?php echo base_url();?>asset/osc/images/animation/04.png" alt="shape">
            </div>
            <div class="star-2 three">
                <img src="<?php echo base_url();?>asset/osc/images/animation/04.png" alt="shape">
            </div>
            
            <div class="container">
                <div class="footer-area">
                    <div class="footer-widget widget-about">
                        <h5 class="title">
                            <a href="index.html">About Us</a>
                        </h5>
                        <div class="content">
                            <p>We are a collection of crypto miners and traders. The members will be given online
and offline education on how to Smart Mining & Trading Crypto so that they earn
money. Become the Leading Community in Digital Asset Development & Education
in Asia </p>
                            
                        </div>
                    </div>
                    
                    <div class="footer-widget widget-links">
                        <h5 class="title">
                            Useful Link
                        </h5>
                        <div class="content">
                            <ul>
                                <li>
                                    <a href="#0">
                                        News
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        How to Join
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        Deposit Package 
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                         How To Withdrawal 
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        Testimonial
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="footer-widget widget-about">
                        <h5 class="title">
                            Contact Information
                        </h5>
                        <div class="content">
                            <ul class="addr">
                                
                                <li>
                                    <a href="#">Call Us Now : +1 (209) 319-1327 </a>
                                </li>
                                <li>
                                    <a href="#">Support: help@oursmartcoins.asia</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom padding-top light-color text-center pb-70">
                    <p><a href="#0">OurSmartCoins.asia</a> © 2020. All rights reserved</p>
                </div>
            </div>
        </footer>
        <!-- ========Footer-Section Ends Here ========-->
    </div>



    <script src="<?php echo base_url();?>asset/osc/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/modernizr-3.6.0.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/plugins.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/magnific-popup.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/owl.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/swiper.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/wow.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/odometer.min.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/viewport.jquery.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/nice-select.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/paroller.js"></script>
    <script src="<?php echo base_url();?>asset/osc/js/main.js"></script>

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