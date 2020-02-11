            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                <h3 class="box-title">Daftar Kode Voucher</h3>
                  <form style='margin-right:5px; margin-top:0px' class='pull-right' action='<?php echo base_url(); ?>administrator/voucher_code' method='POST'>
                    Buat Kode Voucer <select class='required' name='kode' style='padding:3px; border:1px solid #e3e3e3; padding:4px 5px 4px 8px' required> 
                      <?php 
                        for ($i = 1; $i <= 50; $i++){
                            echo "<option value='$i'>$i</option>";
                        }
                      ?>
                    </select>
                    <input type="submit" name='submit' style='margin-top:-4px' class='btn btn-primary btn-sm' value='Tambah Voucher'>
                  </form>

                </div><!-- /.box-header -->
                <div class="box-body">

                
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Kode Voucher</th>
                        <th>Status</th>
                        <th style='width:70px'>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                
                    echo "<tr class=''><td>$no</td>
                              <td>$row[kode_unik]</td>
                              <td> "; 
                              if ($row['status_kode'] == 0 ) {
                                  echo "Baru";
                              }
                            echo "
                              </td>
                              
                              <td><a class='btn btn-success btn-xs' title='Set Terjual' href='".base_url()."administrator/voucher_terjual/$row[id_inv]' onclick=\"return confirm('Apa anda yakin kode voucher  $row[kode_unik] sudah terjual?')\"><span class='glyphicon glyphicon-ok'></span>Jual</a></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>