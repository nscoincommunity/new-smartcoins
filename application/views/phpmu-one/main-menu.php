      <div class="container head">
          
          <div class='title-head'>
              
           <a href="<?php echo base_url(); ?>"> <span class='kiri'><img style='margin-top: 11px; width:150px' src="<?php echo base_url(); ?>asset/images/logo.png"></span> </a>
            <span class='pull-right'><small>
            <?php
              if ($this->session->kode_konsumen != ''){
                echo "Selamat Datang! <a href='#'>$ksm[nama_lengkap]</a> &raquo; <a href='".base_url()."members/logout'>Logout</a>";
              }else{
                $topm = $this->model_menu->top_menu();
                foreach ($topm->result_array() as $row){
                    echo "<a href='".base_url()."$row[link]'>$row[nama_menu]</a> &raquo; ";
                }
              }
            ?>
            </small></span>
          </div>
      </div>

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <!--  <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img class='hidden-xs' style='margin-top:-11px; width:62px' src="<?php // echo base_url(); ?>asset/images/logo.png">
          </a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <?php
                $botm = $this->model_menu->bottom_menu();
                foreach ($botm->result_array() as $row){
                    $dropdown = $this->model_menu->dropdown_menu($row['id_menu'])->num_rows();
                    if ($dropdown == 0){
                      echo "<li><a href='".base_url()."$row[link]'>$row[nama_menu]</a></li>";
                    }else{
                      echo "<li class='dropdown'>
                            <a href='".base_url()."$row[link]' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$row[nama_menu]
                            <span class='caret'></span></a>
                            <ul class='dropdown-menu'>";
                              $dropmenu = $this->model_menu->dropdown_menu($row['id_menu']);
                              foreach ($dropmenu->result_array() as $row){
                                  echo "<li><a href='".base_url()."$row[link]'>$row[nama_menu]</a></li>";
                              }
                            echo "</ul>
                          </li>";
                    }
                }
            ?>
          </ul>
          <?php
            if ($this->session->kode_konsumen != ''){
                echo "";
            }
          ?>

        </div><!--/.nav-collapse -->
      </div>