<?php

class Push
{
	private $notification;
	private $data;

	function __construct()
	{

	}

	public function setNotification($title, $body)
	{
		$this->notification = array(
			'title' => $title,
			'body' => $body,
			'sound' => 'invitation'
		);
	}

	public function setData($data)
	{
		$this->data = $data;
	}

	public function getNotification()
	{
		return $this->notification;
	}

	public function getData()
	{
		return $this->data;
	}
}
