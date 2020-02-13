<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">
      <div class="col-md-12">
        <div id="external-events">

  
<div class="row">

  <div class="col-lg-6">
  <div class="card mb-3 ">
    <div class="card-body">

      <form class="form-horizontal">
        
                <div class="form-group row">
                  <label class="control-label col-md-5">Profit + Return of the deposit</label>
                  <div class="col-md-7">
                    <span class="form-control col-md-7" >
                    <?php 
                      $id = $this->session->userdata('id_konsumen');
                      $totprofit = $this->model_investasi->jumlah_profit_per_member($id)->jumlah;
                      $rod = $this->model_investasi->return_of_deposit($id)->jumlah_rod;
                      echo uang_usd($totprofit+$rod);
                      ?>
                     </span>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-5">Amount of Bonus </label>
                  <div class="col-md-7">
                    <span class="form-control col-md-7" ><?php
                    $id_k = $this->session->userdata('id_konsumen');
                    $bonus = $this->model_investasi->jumlah_bonus_per_member($id_k)->jumlah;
                    echo uang_usd($bonus);
                    ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-5">Total Balance </label>
                  <div class="col-md-7">
                    <span class="form-control col-md-7 btn-info" >
                      <?php
                      $id = $this->session->userdata('id_konsumen');
                      $totprofit = $this->model_investasi->jumlah_profit_per_member($id)->jumlah;
                      $rod = $this->model_investasi->return_of_deposit($id)->jumlah_rod;
                      $bonus = $this->model_investasi->jumlah_bonus_per_member($id)->jumlah;
                      echo uang_usd($totprofit+$rod+$bonus);
                    ?></span>
                  </div>
                </div>

                <hr>

                <div class="form-group row">
                  <label class="control-label col-md-5">Total Withdrawal </label>
                  <div class="col-md-7">
                    <span class="form-control col-md-7" ><?php
                    $id = $this->session->userdata('id_konsumen');
                    $totwd = $this->model_investasi->jumlah_wd_per_member($id)->jumlah_diminta;
                    echo uang_usd($totwd); ?></span>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-5">Fund Balance  </label>
                  <div class="col-md-7">
                    <span class="form-control col-md-7 btn-info" ><?php
                      $id = $this->session->userdata('id_konsumen');
                      $totprofit = $this->model_investasi->jumlah_profit_per_member($id)->jumlah;
                      $rod = $this->model_investasi->return_of_deposit($id)->jumlah_rod;
                      $bonus = $this->model_investasi->jumlah_bonus_per_member($id)->jumlah;
                      $totwd = $this->model_investasi->jumlah_wd_per_member($id)->jumlah_diminta;

                      $end_balance = $totprofit + $rod + $bonus - $totwd;
                      echo uang_usd($end_balance);
                    
                    ?></span>
                  </div>
                </div>                
      </form>

      </div>
    </div>



    <form class="row" method="POST" action="<?php echo base_url('investasi/tarik_dana');?>" >
      <input type="hidden" id="id_member" name="id_member" value="<?php echo $this->session->userdata('id_konsumen'); ?>">
      <div class="form-group col-md-6">

      <label class="control-label">Withdrawal Form <br></label>
       <input id="jumlah_wd"  class="form-control" required="true" name="jumlah_penarikan" type="text" placeholder="Minimal $50 " onkeypress="return hanyaAngka(event)" 
       
       <?php 
          $id = $this->session->userdata('id_konsumen');
          $totprofit = $this->model_investasi->jumlah_profit_per_member($id)->jumlah;
          $rod = $this->model_investasi->return_of_deposit($id)->jumlah_rod;
          $bonus = $this->model_investasi->jumlah_bonus_per_member($id)->jumlah;
          $totwd = $this->model_investasi->jumlah_wd_per_member($id)->jumlah_diminta;

          $end_balance = $totprofit + $rod + $bonus - $totwd;
          
          if($end_balance < 50 ) { echo 'disabled';} 
          
           ?> 
           
           >
      </div>


                
      <div class="form-group col-md-6 align-self-end">
        <input class="btn btn-primary" type="submit" value="Withdraw!" 

        <?php 
          $id = $this->session->userdata('id_konsumen');
          $totprofit = $this->model_investasi->jumlah_profit_per_member($id)->jumlah;
          $rod = $this->model_investasi->return_of_deposit($id)->jumlah_rod;
          $bonus = $this->model_investasi->jumlah_bonus_per_member($id)->jumlah;
          $totwd = $this->model_investasi->jumlah_wd_per_member($id)->jumlah_diminta;

          $end_balance = $totprofit + $rod + $bonus - $totwd;
          
          if($end_balance < 50 ) { echo 'disabled';} 
           ?> 
        >

      </div>

     </form>
    <script> 

      function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
              return true;
                }
    </script>

  </div>
  
  <div class="col-lg-6">
    <div class="card mb-3 border-primary">
    <div class="card-body">
      
        <blockquote class="card-blockquote">
          <strong>Term of Withdrawal </strong> <ul>
            <li>Withdraw (withdrawal of funds) can only be done if the profit sharing balance is at least $50 (withdrawal
form will be active if you have a minimum balance). The balance withdrawal amount includes deposit
refund funds. </li>
            
            <li>
                The withdrawal process can be done every Monday to Thursday, requires a minimum of 1 up to 24 hours.
            </li>
        </blockquote>
        
        
      </div>
    </div>

  </div>

  


</div>
  <br>
  <hr>
  <table class="table table-striped" id="TableProfit">
            <thead>
              <tr>
                <th>CODE</th>
                <th> DATE </th>
                <th> AMOUNT </th>
                
                <th> STATUS </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($daftar_withdraw as $row) { ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo tgl_view($row['tgl_diminta']); ?></td>
                <td><?php echo uang_usd($row['jumlah_diminta']); ?></td>
                
                <td><?php $stt = $row['status']; if($stt == 0) { echo '<span class="badge badge-warning">Pending</span>';} elseif($stt == 1) {echo '<span class="badge badge-success">Delivered</span>';}    ?></td>
              </tr>
            <?php } ?>
            

            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>

</main>