<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notification_model extends CI_Model
{
	private $table_notifications = "notifications";
	private $table_team_tournament_mapping = "team_tournament_mapping";
	private $table_tournaments = "tournaments";

	public function insertNotification($notification)
	{
		return $this->db->insert($this->table_notifications, $notification);
	}

	public function getNotificationCountByTeamID($team_id)
	{
		return $this->db->select('count(*) as notification_count')
			->from($this->table_notifications)
			->join($this->table_team_tournament_mapping, 'notifications.tournament_id = team_tournament_mapping.tournament_id')
			->join($this->table_tournaments, 'tournaments.id = team_tournament_mapping.tournament_id')
			->where('notifications.team_id', $team_id)
			->where('team_tournament_mapping.team_id', $team_id)
			->where('team_tournament_mapping.status', 0)
			->get()
			->row();
	}

	public function getNotificationsByTeamID($team_id)
	{
		return $this->db->select('notifications.*, team_tournament_mapping.status as invitation_status')
			->from($this->table_notifications)
			->join($this->table_team_tournament_mapping, 'notifications.tournament_id = team_tournament_mapping.tournament_id')
			->join($this->table_tournaments, 'tournaments.id = team_tournament_mapping.tournament_id')
			->where('notifications.team_id', $team_id)
			->where('team_tournament_mapping.team_id', $team_id)
			->order_by('notifications.id', 'desc')
			->get()
			->result();
	}

	public function checkInviteNotificationByTeamID($team_id, $tournament_id)
	{
		return $this->db->select('*')
			->from($this->table_notifications)
			->where('team_id', $team_id)
			->where('tournament_id', $tournament_id)
			->where('type', "tournament_invitation")
			->get()
			->row();
	}
}
