<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/member/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - OSC System</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Oursmartcoins</h1>
      </div>
      <div class="login-box">
        <form id="formlogin" class="login-form" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>MEMBER LOGIN</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input id="usermail" class="form-control" type="text" required placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input id="userpass" class="form-control" type="password" required placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                
              </div>
             <!-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p> -->
            </div>
          </div>
          <div class="form-group btn-container">
            <button id="userLogin" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>LOGIN</button>
          </div>
        </form>
        <form class="forget-form" >
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" id="email" name="email" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button id="resetPass" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url(); ?>asset/member/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/member/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/member/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/member/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url(); ?>asset/member/js/plugins/pace.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });


      $(document).ready(function(){
      $('#userLogin').on('click',function(e){
       //$('#animasi').append('<div class="loader"></div>');
        e.preventDefault();
        var e_mail = $('#usermail').val();
        var pass = $('#userpass').val();
        $.ajax({
        
          type:'POST',
          url:'<?php echo base_url('auth/login_ajax'); ?>',
          data:{email:e_mail,password:pass},
          success:function(res){

            //alert('ok');
            
            var data = JSON.parse(res);
            if (data.status == 'ok') {
               swal({
			    	title: "Login Succes!",
			    	text: "Your will redirect to member area.",
			    	icon: "success",
			    	button: "OK",
            });
            
             //$('#animasi').append('<span></span>');

			var delay = 2000; 
       		var url = '<?php echo base_url('members'); ?>'
        	setTimeout(function(){ window.location = url; }, delay);


            } else {

                swal({
			    	title: "Login Failed!",
			    	text: "Please check your login detail.",
			    	icon: "error",
			    	button: "Try Again",
			    	});
            }
           
          }
        });
      })
      })
      
      //forget 
      $(document).ready(function(){
      $('#resetPass').on('click',function(e){
        //$('#animasi').append('<div class="loader"></div>');
        e.preventDefault();
        var email = $('#email').val();
        $.ajax({
          type:'POST',
          url:'<?php echo base_url('auth/forget_pass'); ?>',
          data:{email: email},
          success:function(res){
              var data = JSON.parse(res);
            if (data.status == 'ok') {
                swal({
			    	title: "Check Email!",
			    	text: "Reset link has been sent to your email."+data.email,
			    	icon: "success",
			    	button: "OK",
            });
            
            // $('#animasi').append('<span></span>');

			//    var delay = 3000; 
       		// var url = '<?php echo base_url('auth/login'); ?>'
        	// setTimeout(function(){ window.location = url; }, delay);


            } else {

                swal({
			    	title: "Failed!",
			    	text: "Your email "+data.email+" not yet registered.",
			    	icon: "error",
			    	button: "Try Again",
			    	});
            }
           
          }
        });
      })
      })

    </script>
  </body>
</html>