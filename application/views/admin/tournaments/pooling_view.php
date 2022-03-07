<div class="row">
<?php if (!empty($pooling_data)){
	if($pooling_data->no_of_pools == 2){
		$col = 6;
	}

	elseif($pooling_data->no_of_pools == 3){
		$col = 4;
	}
	else{
		$col = 3;
	}

	} ?>
	<?php foreach ($pools as $pool){?>
	<div class="col-lg-<?php echo $col;?>">

	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
					Pool : <?php echo $pool->pools_name;?>
					</h3>
				</div>

			</div>
			<div class="kt-portlet__body">

				<!--begin: Datatable -->
				<table class="table table-striped table-bordered table-hover table-checkable  text-justify text-center">
					<thead>
					<tr>
						<th>#</th>
						<th>Logo</th>
						<th>Team Name</th>
					</tr>
					</thead>
					<?php $result = $this->db->select('*')->from('team_pool_mapping')
					->join('teams','teams.id = team_id')
							->where('pool_id',$pool->id)
					->get()->result(); ?>
					<tbody>
					<?php foreach ($result as $key=> $value){?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><img width="40" src="<?php echo base_url('uploads/teams/').$value->logo?>" alt="image"></td>
								<td><?php echo $value->company_name?></td>

							</tr>
					<?php } ?>
					</tbody>
				</table>

				<!--end: Datatable -->
			</div>
		</div>
	</div>
</div>
	<?php } ?>
</div>

