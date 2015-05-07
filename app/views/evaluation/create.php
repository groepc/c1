<div class="row">
  <div class="col-sm-8">
    <?php if($error): ?>
      <?php echo \core\error::display($error); ?>
    <?php endif; ?>

    <?php if($data['created'] === true): ?>
      <div class="alert alert-success">
        Evaluatie succesvol opgeslagen.
      </div>
    <?php endif; ?>

    <form class="form-horizontal" method="post" action="">
      <!-- Exam code -->
      <div class="form-group">
        <label for="datumtijd" class="col-sm-2 control-label">Datum</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="datumtijd" name="datumtijd" value="<?php echo date('Y-m-d'); ?>" readonly>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="tentamenCode" class="col-sm-2 control-label">Tentamencode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="tentamenCode" name="tentamenCode" value="<?php echo $data['examInfo'][0]->code; ?>" readonly>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="cijfer" class="col-sm-2 control-label">Cijfer</label>

        <div class="col-sm-10">
          <input type="number" min="1" max="10" step="0.1" class="form-control" id="cijfer" name="cijfer" placeholder="Cijfer" value="<?php if(isset($data['filledValues'][0]->cijfer)) { echo $data['filledValues'][0]->cijfer; } ?>" required <?php if(isset($data['filledValues'][0]->document)) { echo 'disabled'; } ?>>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="examStudents" class="col-sm-2 control-label">Opmerkingen</label>
        <div class="col-sm-10">
          <textarea name="document" id="" cols="30" rows="10" class="form-control" <?php if(isset($data['filledValues'][0]->document)) { echo 'disabled'; } ?>><?php if(isset($data['filledValues'][0]->document)) { echo $data['filledValues'][0]->document; } ?></textarea>
        </div>
      </div>

      <?php if(!isset($data['filledValues'][0]->cijfer)): ?>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Evaluatie opslaan</button>
          </div>
        </div>
      <?php else: ?>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            Evaluatie reeds ingevuld.
          </div>
        </div>
      <?php endif; ?>
    </form>
  </div>
</div>