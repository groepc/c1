<?php $entries = $data['pastExams']; ?>
<?php $date = $data['examInfo'][0]->datumtijd; ?>

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
					<td><input type="number" min="1" max="10" step="0.1" name="result[<?php echo $entrie->gebruikerID; ?>]" class="form-control input-sm" placeholder="Cijfer invullen" value="<?php echo $entrie->cijfer; ?>"></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div>
		<input type="submit" class="form-control btn-success" value="Resultaten opslaan"> <a href="<?php echo DIR ?>resultaten" class="btn btn-default">Terug naar overzicht</a>
	</div>
</form>