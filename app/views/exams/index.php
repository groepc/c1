<?php
$created = $_GET['created'];
switch ($created) {
  case 'true':
    $class = "alert-success";
    $message = "Tentamen succesvol aangemaakt";
    break;
  case 'false':
    $class = "alert-danger";
    $message = "Tentamen niet aangemaakt. Probeer opnieuw.";
    break;

  default:
    $class = false;
    break;
}
?>

<?php if($created !== null): ?>
<div class="alert <?php echo $class; ?>">
  <?php echo $message; ?>
</div>
<?php endif; ?>

<?php $exams = $data['exams']; ?>
<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Vak</th>
        <th>Periode</th>
        <th>Aantal studenten</th>
        <th>Computer Lokaal</th>
        <th>Surveillant</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($exams as $exam): ?>
      <tr>
        <td><?php echo $exam->code; ?></td>
        <td><?php echo $exam->vak; ?></td>
        <td><?php echo $exam->periode; ?></td>
        <td><?php echo $exam->aantalStudenten; ?></td>
        <td><?php echo $exam->computerlokaal ? 'Ja' : ' Nee';; ?></td>
        <td><?php echo $exam->surveillant ? 'Ja' : ' Nee'; ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<div>
  <a href="/tentamens/create" class="btn btn-md btn-success">Tentamen aanmaken</a>
</div>