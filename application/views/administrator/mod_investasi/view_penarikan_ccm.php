<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
    <h3 class="box-title">Daftar Permintaan Pengembalian CCM</h3>

    </div><!-- /.box-header -->
    <div class="box-body">
      <table id="tabelInvestasi4" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style='width:40px'>No</th>
            <th>Tanggal </th>
            <th>Nama Member</th>
            <th>Jumlah CCM </th>
            <th>No Rekening </th>
            <th>Aksi</th>
            
          </tr>
        </thead>
        <tbody>
      <?php
        $no = 1;

        foreach ($record->result_array() as $row) {
        echo "<tr class='$alert $alertt'><td>$no</td>";
        echo "<td>".tgl_indo($row['tgl_penarikan'])."</td>";
        echo "<td>$row[nama_lengkap]</td>";
        echo "<td> Rp ".    number_format($row['jumlah'],0,",",".")."</td>";
        
        
        echo "<td>$row[nama_bank] - $row[no_rekening] - $row[atas_nama] </td>";
        echo "<td> <a class='btn btn-success btn-xs' title='Transfer Sekarang' href='".base_url()."investasi/trf_danaccm/$row[id_investasi]/$row[id_penarikan]' onclick=\"return confirm('Apa anda yakin sudah mentransfer untuk pengembalian CCM ini?')\"> Transfer! </a> </td>";

        

          $no++;
        }
      ?>
      </tbody>
    </table>
  </div>
