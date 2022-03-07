<?php

class Firebase
{
	//private $firebase_key = "key=AAAAR71VcfI:APA91bG6LPgvf6uFD5C2knmd-i4y1NN8n0IJvRCAw0YPgcg1fD6qBPH9hzdS9hKkqNzk6A5OsOFWE4u4cqVRIXdFQNK9YKwUcdM-JR_Z3ZSWofg46FCcDfJTidVB1cQprtiP0VVsecxJ";

	public function send($to, $notification, $data,$firebase_key)
	{
		$fields = array(
			'to' => $to,
			'notification' => $notification,
			'data' => $data
		);
		return $this->sendPushNotification($fields,$firebase_key);
	}

	// function makes curl request to firebase servers
	private function sendPushNotification($fields,$firebase_key)
	{
		var_dump($fields);
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($fields),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				'Authorization: ' . $firebase_key
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response, true);


		/*$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($fields),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				'Authorization: key=AAAAR71VcfI:APA91bG6LPgvf6uFD5C2knmd-i4y1NN8n0IJvRCAw0YPgcg1fD6qBPH9hzdS9hKkqNzk6A5OsOFWE4u4cqVRIXdFQNK9YKwUcdM-JR_Z3ZSWofg46FCcDfJTidVB1cQprtiP0VVsecxJ'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return json_decode($response, true);*/
	}
}
