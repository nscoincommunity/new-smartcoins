<div class="breadcumb-area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6">
                <div class="breadcumb-text">
                    <h2 style="font-size:33px;"> Video </h2>
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


<section class="cryptos-blog-area section-padding-100">
        <div class="container">
            <div class="row align-items-center">

              <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                    $tanggal = tgl_indo($row['tanggal']);
                    echo "
                    <div class='col-sm-6'>
                      <div class='card mb-3'>
                        <div class='card-body'>
                          
                          
                    
                         ";
                    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $row['youtube'], $match)) {
                      $video = $match[1];
                    } ?>
                          <p class='card-text'><iframe  id="ytplayer" type="text/html" width="100%" height="300px"
                                src="https://www.youtube.com/embed/<?php echo $video ?>?rel=0&showinfo=1&color=white&iv_load_policy=3"
                                frameborder="0" allowfullscreen></iframe>
                          </p>
                    <?php 
                        echo "
                        </div>
                      </div>
                    </div>";
                        if ($no % 2 == 0){
                            echo "<div style='clear:both'><hr></div>";
                        }
                      $no++;
                    }
                    echo "<div style='clear:both'></div>";
                    
                  ?>
                    





                    

                    
        </div>
</section>