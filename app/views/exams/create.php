<div class="row">
  <div class="col-sm-8">
    <?php if($error): ?>
      <?php echo \core\error::display($error); ?>
    <?php endif; ?>

    <form class="form-horizontal" method="post" action="/tentamens/create">
      <!-- Exam code -->
      <div class="form-group">
        <label for="examCode" class="col-sm-2 control-label">Code</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="examCode" name="examCode" placeholder="Code" required>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="examSpeciality" class="col-sm-2 control-label">Vak</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="examSpeciality" name="examSpeciality" placeholder="Vak" required>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="examPeriod" class="col-sm-2 control-label">Periode</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="examPeriod" name="examPeriod" placeholder="Periode" required>
        </div>
      </div>

      <!-- Exam speciality -->
      <div class="form-group">
        <label for="examStudents" class="col-sm-2 control-label">Aantal studenten</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="examStudents" name="examStudents" placeholder="Aantal studenten" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="examComputerRoom"> Computer lokaal
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="examSurveillance"> Surveillant
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Tentamen aanmaken</button>
        </div>
      </div>
    </form>
  </div>
</div>