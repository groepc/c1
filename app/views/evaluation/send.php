<?php $evaluations = $data['evaluations']; ?>
<p>In onderstaande tabel worden de evaluaties getoond van het reeds gemaakte tentamen.</p>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Cijfer</th>
        <th>Opmerking</th>
        <th>Datum</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($evaluations as $key => $evaluation): ?>
        <tr>
          <td><?php echo $evaluation->ID ?></td>
          <td><?php echo $evaluation->cijfer ?></td>
          <td><?php echo $evaluation->document ?></td>
          <td><?php echo date("j F, Y", strtotime($evaluation->datumtijd)); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<div>
  <form method="post">
    <input type="hidden" name="examenCode" value="<?php echo $data['examenCode'] ?>">
    <input type="submit" class="btn btn-success" value="Evaluaties versturen">
  </form>
</div>