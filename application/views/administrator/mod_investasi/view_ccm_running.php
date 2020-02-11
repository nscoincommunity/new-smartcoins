<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar CCM Runnning</h3>
    
    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelInvestasi" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Kode Unik </th>
            <th>Jumlah  </th>
            <th>Nama Member </th>
            <th>Tgl Mulai Profit </th>
            <th>Tgl Berakhir </th>

            
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;

        foreach ($record->result_array() as $row) {
        $today = date('Y-m-d');
       // $today = '2019-12-22';
        if($today>=$row['tgl_mulai_hitung'] && $today <=$row['tgl_akhir_hitung']) {
            
        echo "<tr class='$alert $alertt'><td>$no</td>
                  <td>$row[kode_unik]</td>
                  <td>";
        echo "Rp ".    number_format($row['jumlah_inv'],0,",",".");
        echo "</td>
                  <td>$row[nama_lengkap] ($row[email])</td>
                  <td>";
        echo tgl_indo($row['tgl_mulai_hitung']);
        echo "</td><td>";
        echo tgl_indo($row['tgl_akhir_hitung']);

        echo "</td>
                  
              </tr>";
          $no++;
          
          
        }
        } 
      ?>
      </tbody>
    </table>
  </div>
