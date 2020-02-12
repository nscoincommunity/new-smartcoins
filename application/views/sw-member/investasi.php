
<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">

  <div class="col-md-6">

      <h4>DEPOSIT PACKAGES </h4>
        <p>You can start a deposit from $ 100 to $ 10,000. Each deposit package will incur a <?php echo '$'.$this->model_investasi->get_setting_bonus()->fee_maintenance; ?> maintenance fee and will be paid when making a deposit. To maximize the profit you get, you can make a deposit several times without limit.</p>


        
      </div>
      <div class="col-md-6">
        <h4>Form Make a Deposit </h4>
      
      <form id="tambah-investasi" method="POST" action="<?php echo base_url('investasi/investasi_add');?>">
            <input type="hidden" name="id_investor" value="<?php echo $this->session->userdata('id_konsumen'); ?>">
            <div class="form-group row">
                  <label class="control-label col-md-3">Amount</label>
                  
                  <div class="col-md-8">
                    <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                    <input class="form-control col-md-8" onkeypress="return hanyaAngka(event)" name="jumlah" id="price" type="text" placeholder="Enter amount your deposit">
                  </div>
                  </div>
                  
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Fee Maintenance </label>
                 
                  <div class="col-md-8">
                    <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                    <input class="form-control col-md-8" type="email" value="<?php echo $this->model_investasi->get_setting_bonus()->fee_maintenance; ?>" disabled>
                  </div>
                  </div>
                </div>

            <div class="form-group row">
                  <label class="control-label col-md-3">Total Deposit</label>
                 
                  <div class="col-md-8">
                    <div class="input-group">
                    <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                    <input class="form-control col-md-8" placeholder="0" type="text" disabled name="totaldepo" >
                  </div>
                  </div>
                </div>


            <label class="form-check-label">
                      <input required="true" class="form-check-input" id="ceklist" type="checkbox">Yes, I am sure and agree to all applicable Terms and Conditions.
            </label>

            <br><br>
            <input type="submit" class="btn btn-info mr-2 mb-2" id="submit-inv" disabled value="SUBMIT !" >
            </form>
      </div>

    </div>
  </div>
</div>

<script> 

      function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
              return true;
                }
    </script>

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">
      <div class="col-md-12">
        <div id="external-events">

  <h4>Deposit Package Report</h4>
  <table class="table table-striped" id="invest-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>ID </th>
                <th>AMOUNT</th>
                <th>JOIN DATE</th>
                <th>DATE APPROVED</th>
                <th>START PROFIT</th>
                <th>PROFIT FINISH </th>
                <th>STATUS</th>
              </tr>
            </thead>
            
            <tbody>
            <?php foreach ($daftarinvestasi as $row) { ?>
              <tr>
                <td><?php echo $row['idnya']; ?></td>
                 <td><?php echo $row['kode_uniknya']; ?></td>
                <td><?php echo uang_usd($row['jumlahnya']); ?></td>
                <td><?php echo date_format(date_create($row['tgl_dibuatnya']),"d/m/Y"); ?></td>
                <td><?php if($row['tgl_accnya'] == '0000-00-00') { echo 'N/A'; }else { echo date_format(date_create($row['tgl_accnya']),"d/m/Y");} ?></td>
                <td><?php if($row['tgl_mulai_hitungnya'] == '0000-00-00') { echo 'N/A'; }else { echo date_format(date_create($row['tgl_mulai_hitungnya']),"d/m/Y");} ?></td>
                <td><?php if($row['tgl_akhir_hitungnya'] == '0000-00-00') { echo 'N/A'; }else { echo date_format(date_create($row['tgl_akhir_hitungnya']),"d/m/Y");} ?></td>
                <td><?php $stt = $row['statusnya']; 
                          if($stt == 0) { echo '<span class="badge badge-warning">Pending</span> <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#infodeposit-'.$row['idnya'].'">Info</button>';} 
                          elseif($stt == 1) {echo '<span class="badge badge-success">Active</span>';} 
                          elseif($stt== 2){echo '<span class="badge badge-danger">Expired</span> ';}
                          else { echo '';}   ?>  </td>

                <!-- Modal -->
                <div class="modal fade" id="infodeposit-<?php echo $row['idnya']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Info Deposit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <p> To activate your deposit, please make a payment to : <?php echo '<br><strong>'.$this->model_investasi->get_setting_bonus()->bank.'</strong> <br>'; ?> or <?php echo '<br><strong>'. $this->model_investasi->get_setting_bonus()->crypto.'</strong><br>'; ?>  Amount (Deposit + Fee Maintenance) : <?php $total = $row['jumlahnya'] + $this->model_investasi->get_setting_bonus()->fee_maintenance;  echo '<strong>'.uang_usd($total).' = '.number_format(buat_idr($total),0,",","."). ' IDR</strong><br><br>'; ?> Then confirm to the WhatsApp number : <?php echo '<strong>'. $this->model_investasi->get_setting_bonus()->wa_konfirm.'</strong>'; ?>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </tr>

              
            <?php } ?>

            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>

</main>




<script type="text/javascript">
function rupiahKan(num) {
  return '$' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
var p = document.getElementById("price"),
    res = document.getElementById("result");

p.addEventListener("input", function() {
     x = p.value;
     number_string = x.toString(),
	sisa 	= number_string.length % 3,
	rupiah 	= number_string.substr(0, sisa),
	ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

if (ribuan) {
	separator = sisa ? '.' : '';
	rupiah += separator + ribuan.join('.');
      }
 res.innerHTML ='You will deposit <strong> $ ' +rupiah+' </strong> ?' ;
}, false);

</script>







