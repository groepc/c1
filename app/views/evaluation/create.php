<div class="row">
  <div class="col-sm-8">
    <?php if($error): ?>
      <?php echo \core\error::display($error); ?>
    <?php endif; ?>

    <?php if($data['created'] === true): ?>
      <div class="alert alert-success">
        Tentamen succesvol aangevraagd
      </div>
    <?php endif; ?>

    <form class="form-horizontal" method="post" action="/tentamens/create">
      <!-- Exam code -->
      <div class="form-group">
        <label for="examCode" class="col-sm-2 control-label">Datum en tijd</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="examCode" name="examCode" placeholder="Datum en tijd" disabled>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="examSpeciality" class="col-sm-2 control-label">Tentamencode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="examSpeciality" name="examSpeciality" placeholder="Tentamencode" disabled>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="examPeriod" class="col-sm-2 control-label">Cijfer</label>
        <div class="col-sm-10">
          <input type="number" min="1" max="10" step="0.1" class="form-control" id="examPeriod" name="examPeriod" placeholder="Cijfer" required>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="examStudents" class="col-sm-2 control-label">Opmerkingen</label>
        <div class="col-sm-10">
          <textarea name="" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">Evaluatie opslaan</button>
        </div>
      </div>
    </form>
  </div>
</div>