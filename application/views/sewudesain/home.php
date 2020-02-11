  <!-- ##### About Area Start ##### -->
    <section class=" mt-50 " >
        <div class="container">
            <div class="row">
               

                <div class="col-12 wow fadeInRight" data-wow-delay="0.4s">
                    
                        <div class="section-heading text-center">
                            <?php $query = $this->db->get('identitas');
                          foreach ($query->result() as $row) {
                            echo "<h3>".$row->headline."</h3>"; } ?>
                            <?php $query = $this->db->get('identitas');
                          foreach ($query->result() as $row) {
                            echo "<h5>".$row->deskripsi."</h5>"; } ?>

                        </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ##### About Area End ##### -->

    <!-- ##### Currency Area Start ##### -->
    <section class="currency-calculator-area section-padding-100 bg-img bg-overlay" style="background-image: url(<?php echo base_url(); ?>asset/sw/img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center white mx-auto wow fadeInUp" data-wow-delay="0.3s">
                        <h3 class="mb-4">Visi dan Misi</h3>
                        <?php $query = $this->db->get('identitas');
                          foreach ($query->result() as $row) {
                            echo "<h5 class='mb-2'>".$row->visimisi."</h5>"; } ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ##### Currency Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <section class="cryptos-blog-area section-padding-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="blog-area">

                      <?php
                          foreach ($infoterbaru->result_array() as $row){
                              $isi_berita = strip_tags($row['isi_berita']);
                              $judul = strip_tags($row['judul']);
                              $isi = substr($isi_berita,0,280);
                              $isi = substr($isi_berita,0,strrpos($isi," "));
                              $tanggal = tgl_indo($row['tanggal']);
                              $link = $row['judul_seo'];
                              if ($row['gambar'] == ''){ $foto = 'small_no-image.jpg'; }else{ $foto = $row['gambar']; }
                              echo'<div class="single-blog-area d-flex align-items-start wow fadeInUp" data-wow-delay="0.3s">
                            <!-- Thumbnail -->
                            <div class="blog-thumbnail">
                                <img src="'.base_url().'asset/foto_berita/'.$foto.'" alt="">
                            </div>
                            <!-- Content -->
                            <div class="blog-content " >
                                <a href="'.base_url().'berita/detail/'.$link.'" class="post-title">'.$judul.'</a>
                                <div class="meta-data">

                                    <a href="#">'.$tanggal.'</a>
                                </div>
                                '.$isi.' ...
                            </div>
                        </div>'
                        ;
                }
            ?>



                    </div>
                </div>


            </div>
        </div>


    </section>
    <!-- ##### Blog Area End ##### -->
