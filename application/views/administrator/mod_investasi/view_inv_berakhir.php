<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar CCM yang Sudah Berakhir</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelInvestasi3" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Kode Unik </th>
            <th>Jumlah  </th>
            <th>Nama Member </th>
            <th>Tgl Aktivasi </th>
            <th>Tgl Berakhir </th>

            <th style='width:200px; text-align:center;'>Status</th>
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;

        foreach ($record->result_array() as $row) {
        echo "<tr class='$alert $alertt'><td>$no</td>
                  <td>$row[kode_unik]</td>
                  <td>";
        echo "Rp ".    number_format($row['jumlah_inv'],0,",",".");
        echo "</td>
                  <td>$row[nama_lengkap] ($row[email])</td>
                  <td>";
        echo tgl_indo($row['tgl_acc']);
        echo "</td><td>";
        echo tgl_indo($row['tgl_akhir_hitung']);

        echo "</td>
                  <td><center>
                  <span class='btn btn-danger btn-xs' > Berakhir </span>
                  </center></td>
              </tr>";
          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
