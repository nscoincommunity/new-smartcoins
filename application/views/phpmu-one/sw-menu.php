<!-- Nav Start -->
<div class="classynav">
    <ul>
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

</div>
<!-- Nav End -->
