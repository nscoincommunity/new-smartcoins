<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="tile row">
        <div class="col-md-12">
          <div id="external-events">
            <h4 class="mb-4">Hi <?php echo $this->session->userdata('nama_lengkap');?>, Welcome to OurSmarCoins member area!</h4>
            <p>OurSmartCoins.asia the right investment place! This is truly the right place for you to give confidence to oursmartcoin.asia in serving members in managing their finances.</p>

            <p>Registration is quite simple and can be completed in a few minutes by providing your full name, user name, email address, payment address and password before clicking Register to complete the process. In the Payment Process currently limited to using Bank Accounts, Dollars and Doge as a means of payment for deposit entry. Deposits can be made from $ 100 to $ 10,000 in each package. Each Member may take several packages of profit sharing in crypto trading and mining. </p>
              
            <p>Members will be compensated by 1% every day after days 11 to 40. In addition to revenue sharing, capital will also be returned to members in stages together with the profit distribution every day. Payment is given via withdrawal which can be done every Monday to Thursday. Withdrawals can be made after you reach a minimum of $ 10 to please many people. </p>

            <p>Further assistance is provided by sending an email to support@oursmartcoin.asia or sending tickets online. </p>

<p><strong>To increase your income, Oursmartcoins.asia provides compensation to members who recommend this
program to others in the form of sponsorship bonuses of up to 12%. Use the url link below to promote
oursmartcoins.asia to others.</strong></p>

            <div class="card mb-3 border-dark">
              <div class="card-body">
              
            <?php echo '<h6>Your Affiliate Link </h6><code style="font-size:16px"> '.base_url().'?ref='.$this->session->userdata('username').'</code>'; ?>
            </div>
            </div>
        </div>
      </div>
      </div>
    </div>
  </div>



</main>


