<?php

function send_email($subject, $email, $body)
{
	$CI = &get_instance();
	$app_link = $CI->db->select('*')->from('application_settings')->where('name', 'app_link')->get()->row();

	$CI->load->library('phpmailer_library');
	$mail = $CI->phpmailer_library->load();

	$mail->isSMTP();
	$mail->Host = 's26.hosterpk.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'marketing@cpl.net.pk';
	$mail->Password = 'lahore@786';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->setFrom('marketing@cpl.net.pk', 'CPS Club');
	$mail->addBcc('marketing@cpl.net.pk');

	// Email subject

	$mail->Subject = $subject;

	// Set email format to HTML
	$mail->isHTML(true);
	$mail->addAddress($email);


	$body .='<br>Download Android application from the following button<br>
			<a href="'.$app_link->value.'">
			<img src="' . base_url('assets/media/cpl/app_download.png') . '"/></a>' .
			'<br><img width="25%" src="' . base_url('assets/media/cpl/signature.jpeg') . '"/>';

	$mail->Body = $body;
	// Send email
	if ($mail->send()){
		return true;
	}
	else{
		return false;
	}

}
function send_tournament_email($subject, $email,$email_2,$email_3, $body)
{
	$CI = &get_instance();
	$app_link = $CI->db->select('*')->from('application_settings')->where('name', 'app_link')->get()->row();

	$CI->load->library('phpmailer_library');
	$mail = $CI->phpmailer_library->load();


	$mail->isSMTP();
	$mail->Host = 's26.hosterpk.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'marketing@cpl.net.pk';
	$mail->Password = 'lahore@786';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	$mail->setFrom('marketing@cpl.net.pk', 'CPS Club');
	$mail->addBcc('marketing@cpl.net.pk');

	// Email subject

	$mail->Subject = $subject;

	// Set email format to HTML
	$mail->isHTML(true);
	$mail->ClearAddresses();
	$mail->ClearCCs();
	$mail->addAddress($email);
	if ($email_2 != null) {
		$mail->AddCC($email_2);
	}

	if ($email_3 != null) {
		$mail->AddCC($email_3);
	}

	$body .='<br>Download Android application from the following button<br>
			<a href="'.$app_link->value.'">
			<img src="' . base_url('assets/media/cpl/app_download.png') . '"/></a>' .
			'<br><img width="25%" src="' . base_url('assets/media/cpl/signature.jpeg') . '"/>';

	$mail->Body = $body;
	// Send email
	if ($mail->send()){
		return true;
	}
	else{
		return false;
	}

}
