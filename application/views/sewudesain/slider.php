<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-slides owl-carousel">

        <?php 
        $slider = $this->model_main->slide();
                  foreach ($slider->result_array() as $row) { ?>
        <!-- Single Hero Slide -->
        <div class="single-hero-slide">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-md-7">
                        <div class="hero-slides-content">
                            <h2 data-animation="fadeInUp" data-delay="100ms"><?php echo $row['judul_slide'] ?></h2>
                            <h6 data-animation="fadeInUp" data-delay="400ms"><?php echo $row['keterangan'] ?></h6>
                          <!--   <a href="#" class="btn cryptos-btn" data-animation="fadeInUp" data-delay="700ms">Read More</a> -->
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="hero-slides-thumb" data-animation="fadeInUp" data-delay="1000ms">
                            <img src="<?php echo base_url(); ?>asset/foto_slide/<?php echo $row['gambar']; ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>



    </div>
</section>
<!-- ##### Hero Area End ##### -->
