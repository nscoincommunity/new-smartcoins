<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">
      <div class="col-md-12">
        <div id="external-events">

  <h4>Profit Share Log </h4>

<p>Your deposit will increase after the 11<sup>th</sup> day up to the next 30 days.
  </p><hr>
  
  <div class="card mb-3 text-white bg-primary">
    <div class="card-body">
        <blockquote class="card-blockquote">
          <?php 
          $id = $this->session->userdata('id_konsumen');
          $tot = $this->model_investasi->jumlah_profit_per_member($id);
          foreach ($tot as $row) {
             echo "<h6>Total Profit : ".uang_usd($row['jumlah'])."</h6>";

             
           }

          
           ?>
        </blockquote>
      </div>
    </div>
  
  <table class="table table-striped" id="TableProfit">
            <thead>
              <tr>
                <th style="width: 5%;">Kode</th>
                <th style="width: 10%;">Days</th>
                <th>Date</th>
                <th> % </th>
                <th>Daily Profit</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            // $harike = $jum;
            $no=1; foreach ($myprofit as $row) {
                $harike = $this->model_investasi->harike($row['id_member'], $row['id_investasti'], $row['tanggal']);
            ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                <td> <?php echo $harike+11; ?> </td>
                <td><?php echo tgl_view($row['tanggal']); ?></td>
                <td> 1 % x <?php $asal = $row['jumlah'] * 100; echo number_format($asal,2,",",".")  ?> </td>
                <td><?php echo uang_usd($row['jumlah']) ; ?></td>
              </tr>
            <?php
            $harike = $harike - 1;
            $no++;
            } ?>

            </tbody>
          </table>

        </div>
    </div>
  </div>
</div>
</main>