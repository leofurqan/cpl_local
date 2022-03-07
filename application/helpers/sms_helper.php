<?php

function sendSMS($phone, $message)
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://bsms.ufone.com/bsms_v8_api/sendapi-0.3.jsp?id=03315517145&message=' . $message . '&shortcode=CPS%20CLUB&lang=English&mobilenum=' . $phone . '&password=Cpl@1122&messagetype=Transactional',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response = curl_exec($curl);

	curl_close($curl);
	return $response;
}
