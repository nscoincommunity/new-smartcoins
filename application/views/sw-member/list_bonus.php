<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">
      <div class="col-md-12">
        <div id="external-events">

  <h4>BONUS REPORT</h4><p>
 

  
  
  <table class="table table-striped" id="TableBonus">
            <thead>
              <tr>
                
                <th>DATE</th>
                <th>AMOUNT</th>
                <th>CATEGORY</th>
                <th>FROM (USERNAME)</th>

              </tr>
            </thead>
            <tbody>
            <?php
             foreach ($listbonus as $row) { ?>
              <tr>
                <td><?php echo tgl_view($row['tanggal']); ?></td>
                <td> <?php echo uang_usd($row['jumlah']); ?> </td>
                <td><?php echo strtoupper($row['jenis']); ?></td>
                 <td><?php echo $row['username']; ?></td>

              </tr>
            <?php
            
            } ?>

            </tbody>
          </table>

        </div> -->
    </div>
  </div>
</div>
</main>