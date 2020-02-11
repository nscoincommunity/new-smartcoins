<?php
          $tanggal = tgl_indo($record['tgl_posting']);
          echo "<p class='sidebar-title'><span class='glyphicon glyphicon-volume-up'></span> $record[judul]</p>

            <div class='col-md-12'>";
                if ($record['gambar'] != ''){
                    echo "<img width='100%' src='".base_url()."asset/foto_statis/".$record['gambar']."'>";
                }
                echo "<p>$record[isi_halaman]</p>
            </div><div style='clear:both'><br></div>

            ";
                
            ?>
