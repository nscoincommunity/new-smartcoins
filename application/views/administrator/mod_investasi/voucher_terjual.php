            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                <h3 class="box-title">Kode Voucher yang Terjual Tapi Belum Digunakan</h3>
                  

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Kode Voucher</th>
                        <th>Status</th>
                        
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
                              } elseif ($row['status_kode'] == 1) {
                                  echo "Sold";
                              }
                            
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>