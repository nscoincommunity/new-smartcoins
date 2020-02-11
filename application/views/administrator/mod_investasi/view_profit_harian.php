<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar Profit Harian</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelProfit" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Tanggal </th>
            <th>Jumlah Profit </th>
            <th>Nama & Email Member </th>
            
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;

        foreach ($record->result_array() as $row) {
        echo "<tr class='$alert $alertt'>
                 <td>$no</td>
                  <td>";
        echo tgl_indo($row['tanggal']);
        echo "</td> <td>".uang_usd($row['jumlah']);
        echo "</td>
                  <td>$row[nama_lengkap] ($row[email])</td>
                  ";
        

          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
