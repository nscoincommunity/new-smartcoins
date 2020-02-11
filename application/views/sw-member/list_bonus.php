<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">
      <div class="col-md-12">
        <div id="external-events">

  <h4>List Bonus</h4><p>
 <div class="card mb-3 text-white bg-primary">
  <div class="card-body">
        <blockquote class="card-blockquote">
          <?php echo '<strong>Total Bonus :</strong> '.uang_usd($this->model_investasi->jumlah_bonus_per_member($this->session->userdata('id_konsumen'))->jumlah); ?>
        </blockquote>
      </div>
  </div>


  
  
  <table class="table table-striped" id="TableBonus">
            <thead>
              <tr>
                
                <th>Date</th>
                <th> Amount </th>
                <th> Category</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            // $harike = $jum;
            $no=1; foreach ($bonuss as $row) { ?>
              <tr>
                <td><?php echo tgl_view($row['tanggal']); ?></td>
                <td> <?php echo number_format($row['jumlah'],0,",",".")  ?> </td>
                <td><?php echo $row['jenis']; ?></td>
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