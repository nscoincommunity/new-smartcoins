<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar Bonus</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelProfit" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Tanggal</th>
            <th>Jumlah  </th>
            
            <th>Penerima </th>
            <th>Jenis </th>
            <th>Asal Bonus </th>
            
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;

        foreach ($record as $row) {
        echo "<tr class='$alert $alertt'>
                 <td>$no</td>
                  ";
        echo "<td> ".tgl_indo($row['tanggal'])."</td>";
        
        echo " <td> ".uang_usd($row['jumlah'])." </td>";
        
        echo "
                  <td>$row[nama_lengkap] ($row[email])</td>
                  ";
        echo "<td>$row[jenis]</td>";
        echo "<td>$row[jumlah_inv] ($row[kode_unik])</td>";
        

          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
