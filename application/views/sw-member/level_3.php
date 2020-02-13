<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">
      <div class="col-md-12">
        <div id="external-events">
  <h4>Third Level Bonus (1%)</h4>
  </p><hr>
  
  <h5></h5>
<p>Click on Username to see your Fourth Level Bonus (0,5%) list.</p>
  
  <table class="table table-striped" id="TableSponsor1">
            <thead>
              <tr>
                <th >JOIN DATE</th>
                <th >USERNAME</th>
                <th>DEPOSIT AMOUNT</th>
                <th>BONUS AMOUNT </th>
                <th>COUNTRY</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($sp_level3 as $row) {  ?>
              <tr>
                <td> <?php echo $row['tanggal_daftar'] ?> </td>
                <td> <a href="<?php echo base_url('investasi/level_4')."/".$row['id_konsumen']; ?>" > <?php echo $row['username'] ?> </a> </td>
                <td> </td>
                <td> </td>
                <td> <?php echo $row['country'] ?> </td>
              </tr>
            <?php } ?>

            </tbody>
          </table>

         

        </div>
    </div>
  </div>
</div>
</main>