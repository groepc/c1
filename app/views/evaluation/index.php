<?php $exams = $data['pastExams']; ?>
<p>In onderstaande tabel worden de tentamens getoond die inmiddels zijn afgenomen. U kunt nu per tentamen uw evaluatie invullen.</p>

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Tentamencode</th>
        <th>Vak</th>
        <th>Datum</th>
        <th>Aantal evaluaties ingevuld</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($exams as $exam): ?>

      <tr>
        <td><?php echo $exam->ID; ?></td>
        <td><?php echo $exam->tentamencode; ?></td>
        <td><?php echo $exam->vak; ?></td>
        <td><?php echo date("j F, Y", strtotime($exam->datumtijd)); ?></td>
        <td><?php echo $exam->evaluationCount ?></td>
        <?php if((int) $exam->evaluationCount >= 5 && $exam->afgerond != 1 ): ?>
          <td><a href="<?php echo DIR; ?>evaluatie-versturen/<?php echo $exam->ID; ?>" class="btn btn-xs btn-success pull-right">Evaluatie versturen</a></td>
        <?php elseif(   $exam->afgerond == 0 ): ?>
          <td><a href="<?php echo DIR; ?>evaluatie/<?php echo $exam->ID; ?>" class="btn btn-xs btn-info pull-right">Evaluatie invoeren</a></td>
        <?php else: ?>
          <td><span class="pull-right">Evaluatie reeds verstuurd.</span></td>
        <?php endif; ?>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>