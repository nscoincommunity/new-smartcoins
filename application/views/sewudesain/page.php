<!-- ##### Breadcumb Area Start ##### -->


<div class="breadcumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6">
                <div class="breadcumb-text">
                    <h2 style="font-size:33px;"> <?php echo $record['judul']; ?> </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Thumb Area -->
    <div class="breadcumb-thumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-thumb">
                        <img src="img/bg-img/breadcumb.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="blog-area" style="margin-top:20px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="cryptos-blog-posts">
                    <div class="row">

                        <!-- Single Blog Area -->
                        <div class="col-12">
                            <div class="single-blog-area blog-style-2 mb-100">
                                <!-- Thumbnail -->
                                <div class="blog-thumbnail">
                                <?php  if ($record['gambar'] != ''){
                                      echo "<img class='pull-left mr-3' src='".base_url()."asset/foto_statis/".$record['gambar']."' width='25%' >";
                                  } ?>
                                </div>
                                <!-- Content -->
                                <div class="blog-content">
                                    <p><?php echo $record['isi_halaman']; ?></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php include "sidebar.php"; ?>
        </div>
    </div>
