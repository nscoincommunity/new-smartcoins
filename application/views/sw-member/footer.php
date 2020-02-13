<!-- Essential javascripts for application to work-->
<script src="<?php echo base_url(); ?>asset/member/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>asset/member/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>asset/member/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>asset/member/js/main.js"></script>



<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo base_url(); ?>asset/member/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="<?php echo base_url(); ?>asset/member/js/plugins/chart.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>asset/member/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/member/plugins/dataTables.bootstrap.min.js"></script> -->

<script type="text/javascript" src="<?php echo base_url(); ?>asset/member/js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/member/js/plugins/sweetalert.min.js"></script>

<!--<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->

<!-- Data table plugin-->
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/member/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/member/js/plugins/dataTables.bootstrap.min.js"></script>
    


<script type="text/javascript">

$('#invest-table').DataTable( {
        "columnDefs": [
            {
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "render": function ( data, type, row ) {
                    return data +' ('+ row[3]+')';
                },
                "targets": 0
            },
            { "visible": false,  "targets": [ 0 ] }
        ]
    });

$('#TableProfit').DataTable();

$('#TableSponsor1').DataTable();
$('#TableSponsor2').DataTable();
  
  $('#TableBonus').DataTable({
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    } );

</script>


<!-- sewudesain script  -->
<script type="text/javascript">
//start sewudesain js
$(document).ready(function(){
      $('form#tambah-investasi').on('submit',function(e){
        e.preventDefault();
        $.ajax({
          type:$(this).attr('method'),
          url:$(this).attr('action'),
          data:$(this).serialize(),
          success:function(data){
            var x = JSON.parse(data);
            if(x.status == true ) {
              window.location.replace('<?php echo base_url('investasi/info_transfer'); ?>');
            } else {
              var pesanx = x.pesan;
              swal("Sorry", pesanx, "error");
            }
            
          
            //$('#info').html('');
            
           // 
            //swal("Selamat!", "Data Pengajuan Investasi Anda sudah terkirim!", "success");
          }
        });
      })

  $('input[type="checkbox"]#ceklist')
  	.on('invalid', function(){
  		return this.setCustomValidity('Ini harus di-centang sebelum Anda mengirimkan data investasi.');
  	})
  	.on('input', function(){
  		return this.setCustomValidity('');
  	});
})
</script>

<script>


function tarikModalku(id){
    $.ajax({
        url : "<?php echo base_url('investasi/tarik_modalku/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
         // var jumlah = ToRupiah(data.jumlah_inv)
          $('#modal-tarik-ccm').modal('show');
          $('[id="id-ccm"]').val(data.id_inv);
          $('[id="kode-ccm"]').val(data.kode_unik);
          $('[id="tgl-aktif"]').val(data.tgl_acc);
          $('[id="tgl-berakhir"]').val(data.tgl_akhir_hitung);
          $('[id="nilai-ccm"]').val(data.jumlah_inv);
          
        }
    });
  }

$('form#tarik-modal-ccm').on('submit',function(e){
      e.preventDefault();
      var idInv = $('[id="id-ccm"]').val();
          jumlahInv = $('[id="nilai-ccm"]').val();
        $.ajax({
          type:"POST",
          url:$(this).attr('action'),
          data:"id_inv="+idInv+"&jumlah="+jumlahInv,
          success:function(data){
          
            $('#modal-tarik-ccm').modal('hide');
            location.reload();


          }
        });
      })


function ToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
	return '$. '+rupiah.split('',rupiah.length-1).reverse().join('');
}

 
function ToAngka(rupiah)
{
	return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
}

</script>

<script>
$(document).ready(function(){

   $("#price").focusout(function(){

      var jumlah = $(this).val().trim();

      if(jumlah != ''){

         $.ajax({
            url: '<?php echo base_url('investasi/cek_jumlah'); ?>',
            type: 'post',
            data: {jumlah: jumlah},
            success: function(response){
                var data = JSON.parse(response);
                //alert(data.pesan);
                //$('#kode_response').html(data.pesan);
                if(data.status == 'benar') {
                  swal("Good Job!","You will make a deposit $"+data.jumlah+" + Fee $"+data.fee, "success");
                  $('[name=totaldepo]').val(data.total);

                  $('#submit-inv').prop('disabled', false );

                } else {
                  swal("Sorry","You can't deposit $"+data.jumlah+". Minimum Deposit is $100", "error");
                  //$('[name="jumlah"]').val('');
                  //$('#price').prop('disabled', true );
                  //$('#submit-inv').prop('disabled', true );
                   $('[name=totaldepo]').val(0);

                }
             }
         });
      }else{
         $("[name=totaldepo]").val("0");
         //$('#submit-inv').prop('disabled', true );
      }

    });

 });
</script>

</body>
</html>
