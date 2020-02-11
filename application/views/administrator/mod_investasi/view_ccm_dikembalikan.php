<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar CC yang Sudah Dikembalikan</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelInvestasi5" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Nama Member</th>
            <th>Jumlah Ditransfer </th>
            <th>Rekening Tujuan </th>
            <th>Tanggal Ditransfer</th>
            
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;

        foreach ($record->result_array() as $row) {
        echo "<tr class='$alert $alertt'><td>$no</td>";
        
        echo "<td>$row[nama_lengkap]</td>";
        
        echo "<td> Rp ".    number_format($row['jumlah'],0,",",".")."</td>";
        
        echo "<td>$row[nama_bank] - $row[no_rekening] - $row[atas_nama] </td>";
        echo "<td>".tgl_indo($row['tgl_ditransfer'])."</td>";
        

        

          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
