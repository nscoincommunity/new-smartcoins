            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Semua Voucher</h3>
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>administrator/tambah_kirimvoucher'>Kirim Voucher</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:20px'>No</th>
                        <th>Kode Founder</th>
                        <th>Nama Founder</th>
                        <th>Kode Voucher</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th>Bayar</th>
                        <th>Tgl Terima</th>
                        <!--<th style='width:70px'>Action</th>-->
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($voucher_data->result_array() as $row){
                    $tgl_posting = tgl_indo($row['tanggal_voucher']);
                    if ($row['status']=='Y'){ $status = '<span style="color:green">Published</span>'; }else{ $status = '<span style="color:red">Unpublished</span>'; }
                    echo "<tr><td>$no</td>
                              <td>$row[kode_founder]</td>
                              <td>$row[nama_founder]</td>
                              <td>$row[kode_voucher]</td>
                              <td>".ucfirst($row[nama_kota_founder])."</td>
                              <td>";
                              if ($row['status_pakai']==0){
                                  echo "Belum terpakai";
                              }else{
                                  echo "Sudah terpakai";
                              }
                        echo "</td>
                              <td>";
                              if ($row['status_bayar']==0){
                                  echo "<center>
                                <a class='btn btn-danger btn-xs' title='Edit Data' href='".base_url()."administrator/bayar_voucher/$row[kode_voucher]'>B</a>
                                </center>";
                              }else{
                                  echo "<center>
                                <a class='btn btn-success btn-xs' title='Edit Data' href='#' disabled>S</a>
                                </center>";
                              }
                        echo "</td>
                              <td>$tgl_posting</td>";
                            //   <td><center>
                            //     <a class='btn btn-success btn-xs' title='Edit Data' href='".base_url()."administrator/edit_listberita/$row[id_voucher]'><span class='glyphicon glyphicon-edit'></span></a>
                            //     <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_listberita/$row[id_voucher]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                            //   </center></td>
                        echo "</tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>