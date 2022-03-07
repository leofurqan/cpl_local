<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Manual pooling</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<<<<<<< Updated upstream
<body style="background-image: url(<?php echo base_url(); ?>assets/media/bg/cpl_2.jpg); background-repeat: no-repeat; background-size: cover;">
<div class="container">
	<?php
	if (!empty($teams_data)){
	$i = 1 ?>
	<?php $counter = count($teams_data); ?>
	<?php $divide = $counter / 2;
	$i = 1;
	?>
	<div class="row pb-5">
		<div class="col-lg-2"></div>
		<?php foreach ($teams_data as $data) { ?>
			<div class="col-lg-2">
				<img width="50%" id="<?php echo $data->team_id ?>" src="<?php echo base_url('./uploads/teams/' . $data->logo); ?>"
					 alt="<?php echo $data->company_name ?>" onclick="add_into_pools_table(this.id)"/>
=======
<body>
		<div class="container">
			<?php
			if (!empty($teams_data)){
			$i =1 ?>
			<?php $counter =count($teams_data); ?>
			<?php $divide = $counter/2;
			$i =1;
			?>
			<div class="row pb-5">
				<?php foreach ($teams_data as $data) { ?>
					<div class="col-lg-2">
						<img width="70%"  id="<?php echo $data->team_id?>" src="<?php echo base_url('./uploads/teams/'.$data->logo);?>" alt="<?php echo $data->company_name?>" onclick="add_into_pools_table(this.id)"/>
					</div>
					<?php if ($i%$divide == 0) {
						echo '</div><div class="row">'; }?>
					<?php $i++; } } ?>
>>>>>>> Stashed changes
			</div>
			<?php if ($i % $divide == 0) {
				echo '</div><div class="row">';
			} ?>
			<?php $i++;
		}
		} ?>
	</div>
</div>
<?php echo form_open('admin/pooling/add_teams_pools') ?>
<div class="container">
	<input type="hidden" name="tournament_id" value="<?php echo $tournament_id ?>">
	<div class="row">
		<?php foreach ($pooling_names as $name) { ?>
			<div class="col-lg-6">
				<table class="table">
					<thead>
					<tr>
						<th><?php echo $name->pools_name ?></th>
					</tr>
					</thead>
					<tbody class="<?php echo $name->id ?>">
					</tbody>
				</table>

			</div>
		<?php } ?>

	</div>
</div>
<div class="container-fluid mt-5">
	<div class="row">
		<div class="col-lg-5 col-md-4">
		</div>
		<div class="col-lg-5 col-md-4">
			<input class="form-control btn-primary" style="width: 25%" type="submit" name="save" value="Save"/>
		</div>
		<div class="col-lg-2 col-md-4">
		</div>
	</div>
</div>
<?php echo form_close(); ?>
</body>
<script>
	var count = 1;
	var i = 1;

	function add_into_pools_table(id) {
		var img = document.getElementById(id);
		var myPicture = document.getElementById(id).src;
		var table = document.getElementsByTagName("tbody");
		var table_length = table.length;
		var classname = [];
		for (var j = 0; j < table_length; j++) {
			classname.push(table[j].className);
		}
		if (i <= table_length) {
			switch (i) {
				case 1:
					table[0].insertRow(0).insertCell(0).innerHTML = '' +
							'<img src="' + myPicture + '" width="20" height="20" /> ' +
							'<input type="hidden" name="team_id[]" value="' + id + '">' +
							'<input type="hidden" name="pools_id[]" value="' + classname[0] + '">'
					i++;
					img.style.visibility = 'hidden';
					break;
				case 2:
					table[1].insertRow(0).insertCell(0).innerHTML = '' +
							'<img src="' + myPicture + '" width="20" height="20" /> ' +
							'<input type="hidden" name="team_id[]" value="' + id + '">' +
							'<input type="hidden" name="pools_id[]" value="' + classname[1] + '">'
					i++;
					img.style.visibility = 'hidden';
					break;
				case 3:
					table[2].insertRow(0).insertCell(0).innerHTML = '' +
							'<img src="' + myPicture + '" width="20" height="20" /> ' +
							'<input type="hidden" name="team_id[]" value="' + id + '">' +
							'<input type="hidden" name="pools_id[]" value="' + classname[2] + '">'
					i++;
					img.style.visibility = 'hidden';
					break;
				case 4:
					table[3].insertRow(0).insertCell(0).innerHTML = '' +
							'<img src="' + myPicture + '" width="20" height="20" /> ' +
							'<input type="hidden" name="team_id[]" value="' + id + '">' +
							'<input type="hidden" name="pools_id[]" value="' + classname[3] + '">'
					i++;
					img.style.visibility = 'hidden';
					break;
			}
		} else {
			i = 1;
			add_into_pools_table(id);
		}

	}
</script>
</html>
