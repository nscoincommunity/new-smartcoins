<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">
      <div class="col-md-12">
        <div id="external-events">

  
<div class="row">

  <div class="col-lg-6">
  <div class="card mb-3 text-white bg-primary">
    <div class="card-body">
        <blockquote class="card-blockquote">
          <?php 
          $id = $this->session->userdata('id_konsumen');
          $tot = $this->model_investasi->jumlah_profit_per_member($id);
          foreach ($tot as $row) {
             echo "<h6>Total Profit : ".uang_usd($row['jumlah'])."</h6>";
           }

           $bonus = $this->model_investasi->jumlah_bonus_per_member($this->session->userdata('id_konsumen'))->jumlah;
         echo "<h6>Total Bonus : ".uang_usd($bonus)."</h6>";

          $inv  = $this->model_investasi->jumlah_inv_balik($id);
          foreach ($inv as $balik) {
            $modal = $balik['jumlah_inv'];
            echo "<h6>Refunded Deposit : ".uang_usd($modal)."</h6>";
          }

           

         

          $totwd = $this->model_investasi->jumlah_wd_per_member($id);
          foreach ($totwd as $rows) {
             echo "<h6>Total Withdrawal : ".uang_usd($rows['jumlah_diminta'])."</h6>";
           } 
          
           echo '<hr>';
      

          $subsaldo = $row['jumlah'] + $modal + $bonus ;
          $saldo = $subsaldo - $rows['jumlah_diminta'];
          echo '<h6>Balance  : '.uang_usd($saldo).'</h6>
          <small>This balance is the total of the profit sharing amount you received plus bonus plus deposit that has been returned and reduced by the amount that has been withdrawn. </small>';
           ?>

        </blockquote>
      </div>
    </div>
    <form class="row" method="POST" action="<?php echo base_url('investasi/tarik_dana');?>" >
      <input type="hidden" id="id_member" name="id_member" value="<?php echo $this->session->userdata('id_konsumen'); ?>">
      <div class="form-group col-md-6">

          <label class="control-label">Withdrawal Form <br></label>
       <input id="jumlah_wd"  class="form-control" required="true" name="jumlah_penarikan" type="text" placeholder="min WD $10 " onkeypress="return hanyaAngka(event)" <?php 
          $id = $this->session->userdata('id_konsumen');
          $tot = $this->model_investasi->jumlah_profit_per_member($id);
          foreach ($tot as $row) { $profit = $row['jumlah']; }
          $totwd = $this->model_investasi->jumlah_wd_per_member($id);
          foreach ($totwd as $rows) { $wd = $rows['jumlah_diminta']; } 
          $inv  = $this->model_investasi->jumlah_inv_balik($id);
          foreach ($inv as $balik) {
            $modal = $balik['jumlah_inv'];
          }
          $bonus = $this->model_investasi->jumlah_bonus_per_member($this->session->userdata('id_konsumen'))->jumlah;
          $subsaldo = $row['jumlah'] + $modal + $bonus ;
          $saldo = $subsaldo - $rows['jumlah_diminta'];
          
          if($saldo < 10 ) { echo 'disabled';} else {echo '';}
          
           ?> >
      </div>
                
      <div class="form-group col-md-6 align-self-end">
        <input class="btn btn-primary" type="submit" value="Withdraw!" 
        <?php 
          $id = $this->session->userdata('id_konsumen');
          $tot = $this->model_investasi->jumlah_profit_per_member($id);
          foreach ($tot as $row) { $profit = $row['jumlah']; }
          $totwd = $this->model_investasi->jumlah_wd_per_member($id);
          foreach ($totwd as $rows) { $wd = $rows['jumlah_diminta']; } 
          $inv  = $this->model_investasi->jumlah_inv_balik($id);
          foreach ($inv as $balik) {
            $modal = $balik['jumlah_inv'];
          }
          $bonus = $this->model_investasi->jumlah_bonus_per_member($this->session->userdata('id_konsumen'))->jumlah;

          $subsaldo = $row['jumlah'] + $modal + $bonus ;
          $saldo = $subsaldo - $rows['jumlah_diminta'];
          
          if($saldo < 10 ) { echo 'disabled';} else {echo '';}
          
           ?> >

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
            <li>Withdraw (withdrawal of funds) can only be done if the profit sharing balance is at least $10 (withdrawal form will be active if you have a minimum balance). </li>
            
            <li>
                The withdrawal process can be done every Monday to Thursday, requires a minimum of 1 hour, up to 24 hours from the hour of withdrawal.
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
                <th>id</th>
                <th> Date </th>
                <th> Amount </th>
                
                <th> Status </th>
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