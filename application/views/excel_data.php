
<?php if($this->session->flashdata('message')){?>
	<div align="center" class="alert alert-success">
		<?php echo $this->session->flashdata('message')?>
	</div>
<?php } ?>

<br><br>

<div align="center">
	<?php echo form_open_multipart('excel_data/import'); ?>

		<input type="file" name="file" id="file">
		<button type="submit" id="submit" name="import">Import</button>
	<?php echo form_close(); ?>
	<br>
	<br>
	<a href="<?php echo base_url(); ?>sample.csv"> Excel file </a>
	<br><br>

	<div style="width:80%; margin:0 auto;" align="center">
		<table id="t01">
			<tr>

				<th>Company Name</th>
				<th>Email</th>
				<th>contact</th>
				<th>Date</th>
			</tr>
			<?php
			if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
				foreach ($view_data as $key => $data) {
					?>
					<tr>
						<td><?php echo $data['company_name'] ?></td>
						<td><?php echo $data['email'] ?></td>
						<td><?php echo $data['contact'] ?></td>
						<td><?php echo $data['created_date'] ?></td>
					</tr>
				<?php } endif; ?>
		</table>
	</div>
</div>
