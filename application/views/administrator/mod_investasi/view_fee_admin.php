<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar Fee Maintenance</h3>
    </div><!-- /.box-header -->
    <div class="box-body">

  
      <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Fee</span>
          <span class="info-box-number"><?php echo uang_usd($total_fee); ?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->


      <table id="tabelProfit" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Tanggal</th>
            <th>Jumlah  </th>
            
            <th>Dari Username </th>
            <th>Dari Deposit </th>
            
            
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
        
        echo " <td> ".uang_usd($row['jumlah_fee'])." </td>";
        
        echo "
                  <td>".$row['nama_lengkap']." (".$row['username'].")</td>
                  ";
        echo "<td>".uang_usd($row['jumlah_inv'])." (".$row['kode_unik'].")</td>";
        

          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
