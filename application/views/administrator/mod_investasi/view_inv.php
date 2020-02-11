<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar Deposit Belum Aktif</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelInvestasi2" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Kode Voucher </th>
            <th>Jumlah  </th>
            <th>Nama Member </th>
            <th>Tgl Masuk </th>

            <th style='width:200px; text-align:center;'>Tindakan</th>
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;
        foreach ($record->result_array() as $row) {
        echo "<tr class='$alert $alertt'><td>$no</td>
                  <td>$row[kode_unik]</td>
                  <td>";
        echo uang_usd($row['jumlah_inv']);
        echo "</td>
                  <td>$row[nama_lengkap] ($row[email])</td>
                  <td>";
        echo tgl_indo($row['tgl_dibuat']);

        echo "</td>
                  <td><center>
                  <a class='btn btn-success btn-xs' title='Delete Data' href='".base_url()."investasi/acc_investasi/$row[id_inv]' onclick=\"return confirm('Apa anda yakin untuk MENGAKTIFKAN CCM ini?')\"><span class='glyphicon glyphicon-ok'></span> Aktivasi </a>

                    <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."investasi/delete_investasi/$row[id_inv]' onclick=\"return confirm('Apa anda yakin untuk hapus Data CCM ini?')\"><span class='glyphicon glyphicon-remove'></span> Hapus </a>
                  </center></td>
              </tr>";
          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>


