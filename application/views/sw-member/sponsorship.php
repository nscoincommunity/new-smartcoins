<main class="app-content">

<div class="row">
  <div class="col-lg-12">
    <div class="tile row">
      <div class="col-md-12">
        <div id="external-events">
  <h4>SPONSORSHIP NETWORK </h4>
  </p><hr>
  
  <h3>Level 1</h3>
  
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
            <?php foreach($sp_level1 as $row) {  ?>
              <tr>
                <td> <?php echo $row['tanggal_daftar'] ?> </td>
                <td> <?php echo $row['username'] ?> </td>
                <td> </td>
                <td> </td>
                <td> <?php echo $row['provinsi'] ?> </td>
              </tr>
            <?php } ?>

            </tbody>
          </table>

          <br><br>


          <h3>Level 2</h3>
  
  <table class="table table-striped" id="TableSponsor2">
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
            <?php var_dump($sp_level2); foreach($sp_level2 as $row) {  ?>
              <tr>
                <td> <?php echo $row['tanggal_daftar'] ?> </td>
                <td> <?php echo $row['username'] ?> </td>
                <td> </td>
                <td> </td>
                <td> <?php echo $row['provinsi'] ?> </td>
              </tr>
            <?php } ?>

            </tbody>
          </table>

        </div>
    </div>
  </div>
</div>
</main>