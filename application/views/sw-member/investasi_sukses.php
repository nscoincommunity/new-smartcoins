<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">

  <div class="col-md-12">
    <div class="bs-component">
        
    <h4>Your Deposit Submission has been sent! </h4>
    <p></p>

  <div class="row">
    <div class="col-lg-12">
  <div class="card mb-3 ">
        <div class="card-body">
            <p style="font-size:16px;">Please make a deposit using the following account :</p>
              <hr>
            <?php echo 'Transfer Bank : <strong>'. $this->model_investasi->get_setting_bonus()->bank.'</strong><br>'; ?>
           
            <?php echo 'Bitcoin /USD : <strong>'. $this->model_investasi->get_setting_bonus()->crypto.'</strong>'; ?>
            <hr>
            <p style="font-size:16px;"> If making a payment in IDR, use the exchange rate: 
            <strong> <?php echo 'Rp '. $this->model_investasi->get_setting_bonus()->kurs; ?> </strong> / $1</p> 
            <p>After depositing the deposit, please confirm to :
             <?php echo 'WA : <strong>+'. $this->model_investasi->get_setting_bonus()->wa_konfirm; ?> </strong><br><br>
            
        </div>
  </div>
  </div>
</div>
      </div>
    </div>
  </div>
</div>




</main>
