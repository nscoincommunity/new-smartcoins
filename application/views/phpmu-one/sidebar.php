            

            <p class='sidebar-title'><span class='glyphicon glyphicon-tags'></span> &nbsp; MEMBER TERBARU</p>
            
            <?php
            $memberbaru = $this->model_members->list_member_baru();
            foreach ($memberbaru->result_array() as $row ) {
              
              echo  strtoupper($row['nama_lengkap'])." - ".strtoupper($row['kota']);
              echo '<br>';
            }

            ?>
            
            <center>
                <img src="https://cryptotrend.id/asset/images/logo_btc.jpeg" alt="logo-logo" width="100%"/>
            </center>
            
        
