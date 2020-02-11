<div class="breadcumb-area">
    <div class="container ">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6">
                <div class="breadcumb-text">

                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Thumb Area -->
    <div class="breadcumb-thumb-area">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="blog-area ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cryptos-blog-posts">
                    <div class="row">

                        <!-- Single Blog Area -->
                        <div class="col-12">
                            <div class="single-blog-area blog-style-2 mb-100 mt-50">
                              <div class="contact-form-area mb-100">
                              <p><strong>Sponsor Name : <?php foreach($sponsor as $names) { echo $names['nama_lengkap'] ; }  ?> </strong></p>

                                    <?php
                                    $attributes = array('id' => 'formku','class'=>'form-horizontal','role'=>'form');
                                    echo form_open_multipart('auth/proses_register',$attributes);
                                    echo "
                                            <input type='hidden' class='required form-control' name='usponsor' value='";
                                    
                                    foreach($sponsor as $names) { echo $names['id_konsumen'] ; } 
                                    echo "' readonly>
                                            <input type='text' class='required form-control' name='namalengkap' id='namal' required placeholder='Full Name'>

                                            <input type='email' class='required email form-control' name='email' id='emaile' required placeholder='Email Address'>
                                            <span id='email_response' ></span>

                                            <input type='text' class='required form-control' name='username' id='text_username' required placeholder='Username'>
                                            <span id='uname_response' ></span>

                                            <input type='password' class='required form-control' name='password' required minlength='5' placeholder='Password'>

                                            <input type='number' class='required number form-control' name='nohpnya' id='nohpp' required  minlength='10' placeholder='Phone Number'>


                                                <input type='number' class='required number form-control' name='noktp' id='nomor_ktp' placeholder='Valid Identity / KTP'>
                                                <span id='ktp_response' ></span>

                                                <textarea class='required form-control' name='alamatlengkap' style='height:60px' minlength='10' placeholder='Address'></textarea>



                                                <input type='text' class='required form-control' name='kotanya' id='kotaa' required placeholder='City'>

                                                <input type='text' class='required form-control' name='provinsinya' placeholder='Province'>

                                                <input type='text' class='required form-control' name='namabank' placeholder='Bank Name'>

                                                <input type='text' class='required number form-control' name='norek' placeholder='Account Number'>

                                                <input type='text' class='required form-control' name='anrek' placeholder='Account Holder'>


                                        <br>
                                        <div class='form-group'>
                                            <div class='col-sm-offset-2'>
                                                <button type='submit' name='submit' class='btn cryptos-btn btn-2 '> Register Now </button>
                                            </div>
                                        </div>
                                    </form>

                                ";
                    ?>


                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-lg-4">
                <div class="cryptos-blog-sidebar-area">

                    <!-- Section Heading -->
                    <div class="blog-section-heading mb-50 mt-50">
                    </div>

                    <div class="single-blog-area blog-style-2 mb-50">
                        <!-- Thumbnail -->
                        <div class="blog-thumbnail">
                            <img src="https://cryptotrend.id/asset/images/logo_btc.jpeg" alt="">
                        </div>
                        <!-- Content -->

                    </div>
                </div>
            </div>



        </div>
    </div>
