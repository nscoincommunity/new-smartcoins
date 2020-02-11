<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar Permintaan WD</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelInvestasi4" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Tanggal </th>
            <th>Nama Member</th>
            <th>Jumlah Diminta </th>      
            <th>Bank Lokal </th>
            <th>Akun Crypto </th>
            
            
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;

        foreach ($record->result_array() as $row) {
        echo "<tr class='$alert $alertt'><td>$no</td>";
        echo "<td>".tgl_indo($row['tgl_diminta'])."</td>";
        echo "<td>$row[nama_lengkap]</td>";
        echo "<td> ".uang_usd($row['jumlah_diminta'])." <br>(Rp ".number_format(buat_idr($row['jumlah_ditransfer']),0,",",".").")</td>";
        
        
        
        echo "<td><center><a class='btn btn-success btn-xs' title='Transfer Sekarang' href='".base_url()."investasi/trf_profit/$row[id]' onclick=\"return confirm('Apa Anda yakin sudah mentransfer untuk Withdraw ini ke rekening ";
        echo "$row[nama_bank] - $row[no_rekening] - $row[atas_nama]";
        echo "?')\"> Transfer ke Bank Lokal: </a> <br>$row[nama_bank] - $row[no_rekening] - $row[atas_nama] </center></td>";


        echo "<td><center><a class='btn btn-success btn-xs' title='Transfer Sekarang' href='".base_url()."investasi/trf_profit_crypto/$row[id]' onclick=\"return confirm('Apa anda yakin sudah mentransfer untuk Withdraw ini ke akun ";
        echo "$row[rekning_virtual]";
        echo "?')\"> Transfer ke Crypto : </a> <br>$row[rekning_virtual]</center></td>";
        

        

          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
