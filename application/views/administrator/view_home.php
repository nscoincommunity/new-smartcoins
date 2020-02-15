            
<div class="row">
	<div class="col-lg-6">

		<div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-black"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Member Aktif </span>
          <span class="info-box-number"><?php echo $jumlah_member_aktif; ?></span>
        </div><!-- /.info-box-content -->
      	</div><!-- /.info-box -->
				
	</div>

	<div class="col-lg-6">

		<div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-orange"><i class="fa fa-dollar"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Deposit Aktif </span>
          <span class="info-box-number"><?php echo uang_usd($deposit_aktif); ?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
				
	</div>
</div>

<div class="row">
	<div class="col-lg-6">

		<div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Fee Maintenace </span>
          <span class="info-box-number"><?php echo uang_usd($total_fee); ?></span>
        </div><!-- /.info-box-content -->
      	</div><!-- /.info-box -->
				
	</div>

	<div class="col-lg-6">

		<div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-blue"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Bonus Admin </span>
          <span class="info-box-number"><?php echo uang_usd($bonus_admin); ?></span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box -->
				
	</div>
</div>


		
      

            
