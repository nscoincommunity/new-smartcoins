            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                <h3 class="box-title">Daftar Member Belum Aktif</h3>

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="tabelMember2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Username </th>
                        <th>Nama </th>
                        <th>Email </th>
                        <th>Kota </th>
                        <th>Status</th>
                        <th style='width:200px; text-align:center;'>Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    $no = 1;

                    foreach ($record->result_array() as $row) {
                    echo "<tr class='$alert $alertt'><td>$no</td>
                              <td>$row[username]</td>
                              <td>$row[nama_lengkap]</td>
                              <td>$row[email]</td>
                              <td>$row[kota]</td>
                              <td>";
                    if ($row['status'] == 'free' ) {
                      echo "Belum Aktif ";
                    } else {
                      echo "Aktif";
                    }
                    echo "
                              <td><center>
                              <a class='btn btn-success btn-xs' title='Delete Data' href='".base_url()."administrator/aktifkan_member/$row[id_konsumen]' onclick=\"return confirm('Apa anda yakin untuk MENGAKTIFKAN member ini?')\"><span class='glyphicon glyphicon-ok'></span> Aktivasi </a>


                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."administrator/delete_konsumen/$row[id_konsumen]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span> Hapus </a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
              </div>
