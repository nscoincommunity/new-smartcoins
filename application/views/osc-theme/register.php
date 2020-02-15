 <!-- ========Feature-Section Starts Here ========-->
        <section class="page-header">
            <div class="elepsis header-trop">
                <img src="<?php echo base_url();?>asset/osc/images/profit/elepsis.png" alt="profit">
            </div>
            <div class="circle-2 header-trop" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
                data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="<?php echo base_url();?>asset/osc/images/animation/05.png" alt="shape">
            </div>
            <div class="circle-3 header-trop" data-paroller-factor="0.10" data-paroller-factor-lg="-0.30"
                data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="<?php echo base_url();?>asset/osc/images/animation/08.png" alt="shape">
            </div>
            <div class="star-4 header-trop">
                <img src="<?php echo base_url();?>asset/osc/images/animation/07.png" alt="shape">
            </div>
            <div class="star-4 two header-trop">
                <img src="<?php echo base_url();?>asset/osc/images/animation/07.png" alt="shape">
            </div>
            <div class="star-5 header-trop">
                <img src="<?php echo base_url();?>asset/osc/images/animation/07.png" alt="shape">
            </div>
            <div class="circle-1 two header-trop">
                <img src="<?php echo base_url();?>asset/osc/images/animation/10.png" alt="shape">
            </div>
            <div class="trop-4 header-trop">
                <img src="<?php echo base_url();?>asset/osc/images/animation/14.png" alt="animation">
            </div>
            <div class="trop-3 header-trop">
                <img src="<?php echo base_url();?>asset/osc/images/animation/13.png" alt="animation">
            </div>
            <div class="circle-1 three header-trop">
                <img src="<?php echo base_url();?>asset/osc/images/animation/12.png" alt="animation">
            </div>
            <div class="circle-2 header-trop" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
                data-paroller-type="foreground" data-paroller-direction="horizontal">
                <img src="<?php echo base_url();?>asset/osc/images/animation/05.png" alt="shape">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-content">
                            <h2 class="title">Register</h2>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="page-header-thumb wow slideInDown">
                            <img src="<?php echo base_url();?>asset/osc/images/page-header/page-header-01.png" alt="page-header">
                            <div class="leftcon">
                                <img src="<?php echo base_url();?>asset/osc/images/page-header/shape1.png" alt="page-header">
                            </div>
                            <div class="rightcon">
                                <img src="<?php echo base_url();?>asset/osc/images/page-header/shape2.png" alt="page-header">
                            </div>
                            <div class="coin wow bounceInDown" data-wow-delay=".5s">
                                <img src="<?php echo base_url();?>asset/osc/images/page-header/coin.png" alt="page-header">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========Feature-Section Eventes Here ========-->

<!-- ========Contact-Section Starts Here ========-->
        <section class="contact-section padding-bottom padding-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="contact-thumb">
                            <img src="<?php echo base_url();?>asset/osc/images/contact/contact01.png" alt="faq">
                            <div class="mes1 wow slideInLeft">
                                <img src="<?php echo base_url();?>asset/osc/images/contact/mes1.png" alt="faq">
                            </div>
                            <div class="mes2 wow slideInDown">
                                <img src="<?php echo base_url();?>asset/osc/images/contact/mes2.png" alt="faq">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-header">
                            <span>Your Sponsor : </span>
                            <h5 class="title"><?php foreach($sponsor as $names) { echo $names['username'] ; }  ?> </h5>
                        </div>
                       

                                    <?php
                                    $attributes = array('id' => 'formku','class'=>'contact-form','role'=>'form');
                                    echo form_open_multipart('auth/proses_register',$attributes);
                                    echo "
                                            <input type='hidden' class='required form-control' name='usponsor' value='";
                                    
                                    foreach($sponsor as $names) { echo $names['id_konsumen'] ; } 
                                    echo "' readonly>
                                            <div class='form-group w-100'>
                                            <input type='text' class='required form-control' name='namalengkap' id='namal' required placeholder='Full Name'> </div> <div class='form-group'>

                                            <input type='email' class='required email form-control' name='email' id='emaile' required placeholder='Email Address'>
                                            <span id='email_response' ></span> </div> <div class='form-group'>

                                            <input type='text' class='required form-control' name='username' id='text_username' required placeholder='Username'>
                                            <span id='uname_response' ></span></div> <div class='form-group'>

                                            <input type='password' class='required form-control' name='password' required minlength='5' placeholder='Password'> </div> <div class='form-group'>

                                            <input type='number' class='required number form-control' name='nohpnya' id='nohpp' required  minlength='10' placeholder='Phone Number'> </div> <div class='form-group w-100'>


                                                <input type='number' class='required number form-control' name='noktp' id='nomor_ktp' placeholder='Valid Identity / KTP'>
                                                <span id='ktp_response' ></span> </div> <div class='form-group w-100'>

                                                <!--<textarea class='required form-control' name='alamatlengkap' minlength='10' placeholder='Address'></textarea> -->

</div> <div class='form-group'>

                                                <input type='text' class='required form-control' name='kotanya' id='kotaa' required placeholder='City'></div> <div class='form-group'>

                                                <input type='text' class='required form-control' name='country' placeholder='Country'></div> <div class='form-group'>

                                                <input type='text' class='required form-control' name='namabank' placeholder='Bank Name'></div> <div class='form-group'>

                                                <input type='text' class='required number form-control' name='norek' placeholder='Account Number'></div> <div class='form-group w-100'>

                                                <input type='text' class='required form-control' name='anrek' placeholder='Account Holder'></div>

                                                <div class='form-group w-100'>

                                                <input type='text' class='required form-control' name='vrek' placeholder='Doge Wallet '></div>


                                        <br>
                                        <div class='form-group'>
                                            
                                                <input type='submit' name='submit' value='Register Now' > 
                                            
                                        </div>
                                    </form>

                                ";
                    ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- ========Contact-Section Ends Here ========-->

        