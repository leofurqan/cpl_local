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

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body style="background-image: url(<?php echo base_url(); ?>assets/media/bg/cpl_2.jpg); background-repeat: no-repeat; background-size: cover;">

<div class="container" id="team_logos">
	<!--Begin::Section-->
	<?php
	$rows = ((int)(sizeof($teams_data) / 8)) + 1;
	$remaining = sizeof($teams_data);
	$count = 0;
	$i = 0;
	for ($k = 0; $k < $rows; $k++) { ?>
		<div class="row" style="margin-top: 2rem">
			<div class="col-lg-2"></div>
			<?php if ($remaining < 8) {
				for ($l = 0; $l < (8 - $remaining) / 2; $l++) { ?>
					<div class="col-lg-1"></div>
				<?php }
				for ($j = 0; $j < $remaining; $j++) { ?>
					<div class="col-lg-1">
						<img width="100px" class="animate__animated animate__fadeIn team_logo" style="padding: 1rem"
							 id="<?php echo $teams_data[$i]->team_id; ?>"
							 src="<?php echo base_url('./uploads/teams/' . $teams_data[$i]->logo); ?>"
							 alt="<?php echo $teams_data[$i]->company_name ?>" onclick="add_into_pools_table(this.id)"/>
					</div>
					<?php $i++;
				}
			} else {
				for ($j = 0; $j < 8; $j++) { ?>
					<div class="col-lg-1">
						<img style="padding: 1rem" class="animate__animated animate__fadeIn team_logo" width="100px"
							 id="<?php echo $teams_data[$i]->team_id; ?>"
							 src="<?php echo base_url('./uploads/teams/' . $teams_data[$i]->logo); ?>"
							 alt="<?php echo $teams_data[$i]->company_name ?>" onclick="add_into_pools_table(this.id)"/>
					</div>
					<?php $i++;
				}
				$remaining = $remaining - 8;
			} ?>
		</div>
	<?php } ?>
</div>

<?php echo form_open('admin/pooling/add_teams_pools') ?>
<div class="container mt-5" style="margin-top: 3rem;">
	<input type="hidden" name="tournament_id" value="<?php echo $tournament_id ?>">
	<div class="row">
		<?php foreach ($pooling_names as $name) { ?>
			<div class="col-lg-6">
				<table style="background: rgba(0,0,0,0.5);" class="table table-responsive"
					   id="<?php echo $name->pools_name; ?>">
					<thead>
					<tr>
						<th class="text-center"
							style="color: white; font-size: 20px"><?php echo "Pool " . $name->pools_name ?></th>
					</tr>
					</thead>
					<tbody class="<?php echo $name->id ?>">
					</tbody>
				</table>
			</div>
		<?php } ?>

	</div>
</div>
<div class="container-fluid" style="margin-top: 3rem">
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

<script>
	$(document).ready(function () {
		setTimeout(function () {   //calls click event after a certain time
			$('.team_logo').addClass("animate__animated animate__rubberBand");
		}, 1000);

		setTimeout(function () {   //calls click event after a certain time
			$('#A').addClass("animate__animated animate__bounce");
			$('#B').addClass("animate__animated animate__bounce");
		}, 2000);
	});

	var count = 1;
	var i = 1;

	function add_into_pools_table(id) {
		count++;
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
							'<img src="' + myPicture + '" width="75" height="75" /> ' +
							'<input type="hidden" name="team_id[]" value="' + id + '">' +
							'<input type="hidden" name="pools_id[]" value="' + classname[0] + '">'
					i++;
					img.style.visibility = 'hidden';
					break;
				case 2:
					table[1].insertRow(0).insertCell(0).innerHTML = '' +
							'<img src="' + myPicture + '" width="75" height="75" /> ' +
							'<input type="hidden" name="team_id[]" value="' + id + '">' +
							'<input type="hidden" name="pools_id[]" value="' + classname[1] + '">'
					i++;
					img.style.visibility = 'hidden';
					break;
				case 3:
					table[2].insertRow(0).insertCell(0).innerHTML = '' +
							'<img src="' + myPicture + '" width="75" height="75" /> ' +
							'<input type="hidden" name="team_id[]" value="' + id + '">' +
							'<input type="hidden" name="pools_id[]" value="' + classname[2] + '">'
					i++;
					img.style.visibility = 'hidden';
					break;
				case 4:
					table[3].insertRow(0).insertCell(0).innerHTML = '' +
							'<img src="' + myPicture + '" width="75" height="75" /> ' +
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

		if(count == 15) {
			$('#team_logos').remove();
		}

		console.log(count);
	}
</script>
</body>
</html>
