<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Kirim Voucher ".$this->session->disabled."</h3>
                </div>
              <div class='box-body'>";
              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/tambah_kirimvoucher',$attributes); 
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <input type='hidden' name='id' value=''>
                    <tr><th scope='row'>Founder</th>               <td><select name='cmdKodeFounder' class='form-control' required>
                                                                            <option value='' selected>- Pilih Founder -</option>";
                                                                            foreach ($founder_data->result_array() as $row){
                                                                                echo "<option value='$row[kode_founder]'>".ucfirst($row['nama_founder'])."</option>";
                                                                            }
                    echo "</td></tr>
                    <tr><th width='120px' scope='row'>Jumlah</th>    <td><input type='text' class='form-control' name='txtJumlah' required></td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambahkan</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";
