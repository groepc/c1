<div class="row">
    <div class="col-sm-12 col-md-6">
        <h4>Laatst aangevraagde tentamens</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Vak</th>
                    <th>Periode</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['requestedExams'] as $exam): ?>
                    <tr>
                        <td><?php echo $exam->code; ?></td>
                        <td><?php echo $exam->vak; ?></td>
                        <td><?php echo $exam->periode; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="col-sm-12 col-md-6">
        <h4>Laatst ingeplande tentamens</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Tentamencode</th>
                    <th>Lokaalcode</th>
                    <th>Staat ingepland op</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['latestPlannedExams'] as $exam): ?>
                    <tr>
                        <td><?php echo $exam->tentamencode; ?></td>
                        <td><?php echo $exam->lokaalCode; ?></td>
                        <td><?php echo $exam->datumtijd; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>