<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar Deposit Aktif</h3>
    
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelInvestasi" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th >No</th>
            <th>Kode Voucher </th>
            <th>Jumlah  </th>
            <th>Nama Member </th>
            <th>Tgl Aktivasi </th>
            <th>Tgl Mulai Profit </th>
            <th>Tgl Berakhir </th>

            <th >Status</th>
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
        echo tgl_indo($row['tgl_acc']);
        echo "</td><td>";
        echo tgl_indo($row['tgl_mulai_hitung']);
        echo "</td><td>";
        echo tgl_indo($row['tgl_akhir_hitung']);

        echo "</td>
                  <td><center>
                  <span class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-ok'></span> Aktif </span>
                  </center></td>
              </tr>";
          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
