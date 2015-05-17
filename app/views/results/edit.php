<?php $entries = $data['pastExams']; ?>
<?php $date = $data['examInfo'][0]->datumtijd; ?>
<?php $afgerond = $data['examInfo'][0]->afgerond; ?>

<?php if($data['saved'] === true): ?>
	<div class="alert alert-success">
	  Resultaten opgeslagen
	</div>
<?php endif; ?>

<form action="" class="form-inline" method="POST">
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Naam</th>
					<th>Cijfer</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($entries as $entrie): ?>
				<tr>
					<td><?php echo $entrie->voornaam . ' ' . $entrie->tussenvoegsel . ' ' . $entrie->achternaam; ?></td>
					<td>
						<select name="result[<?php echo $entrie->gebruikerID; ?>]" class="form-control input-sm" required <?php if ($afgerond == 1): ?>disabled<?php endif; ?>>
							<option value="N/A">N/A</option>
							<option value="1" <?php if($entrie->cijfer == '1') { echo 'selected'; } ?>>1</option>
							<option value="1.5" <?php if($entrie->cijfer == '1.5') { echo 'selected'; } ?>>1.5</option>
							<option value="2" <?php if($entrie->cijfer == '2') { echo 'selected'; } ?>>2</option>
							<option value="2.5" <?php if($entrie->cijfer == '2.5') { echo 'selected'; } ?>>2.5</option>
							<option value="3" <?php if($entrie->cijfer == '3') { echo 'selected'; } ?>>3</option>
							<option value="3.5" <?php if($entrie->cijfer == '3.5') { echo 'selected'; } ?>>3.5</option>
							<option value="4" <?php if($entrie->cijfer == '4') { echo 'selected'; } ?>>4</option>
							<option value="4.5" <?php if($entrie->cijfer == '4.5') { echo 'selected'; } ?>>4.5</option>
							<option value="5" <?php if($entrie->cijfer == '5') { echo 'selected'; } ?>>5</option>
							<option value="5.5" <?php if($entrie->cijfer == '5.5') { echo 'selected'; } ?>>5.5</option>
							<option value="6" <?php if($entrie->cijfer == '6') { echo 'selected'; } ?>>6</option>
							<option value="6.5" <?php if($entrie->cijfer == '6.5') { echo 'selected'; } ?>>6.5</option>
							<option value="7" <?php if($entrie->cijfer == '7') { echo 'selected'; } ?>>7</option>
							<option value="7.5" <?php if($entrie->cijfer == '7.5') { echo 'selected'; } ?>>7.5</option>
							<option value="8" <?php if($entrie->cijfer == '8') { echo 'selected'; } ?>>8</option>
							<option value="8.5" <?php if($entrie->cijfer == '8.5') { echo 'selected'; } ?>>8.5</option>
							<option value="9" <?php if($entrie->cijfer == '9') { echo 'selected'; } ?>>9</option>
							<option value="9.5" <?php if($entrie->cijfer == '9.5') { echo 'selected'; } ?>>9.5</option>
							<option value="10" <?php if($entrie->cijfer == '10') { echo 'selected'; } ?>>10</option>
							<option value="O" <?php if($entrie->cijfer == 'O') { echo 'selected'; } ?>>Onvoldoende</option>
							<option value="V" <?php if($entrie->cijfer == 'V') { echo 'selected'; } ?>>Voldoende</option>
						</select>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div>
		<?php if ($afgerond == 0): ?><input type="submit" class="form-control btn-success" value="Resultaten opslaan"><?php endif; ?> <a href="<?php echo DIR ?>resultaten" class="btn btn-default">Terug naar overzicht</a>
	</div>
</form>