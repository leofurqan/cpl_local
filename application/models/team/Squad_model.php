<?php defined('BASEPATH') or exit('No direct script access allowed');

class Squad_model extends CI_Model
{
	private $table_players = 'players';
	private $table_squad = 'squad';
	private $table_player_role = 'player_role';
	private $table_player_playing_status = 'player_playing_status';
	private $table_kitsize = 'player_kit_size';
	private $table_tournament_player_mapping = 'tournament_player_mapping';

	public function get_player_by_team_id()
	{
		return $this->db->select('*')->from($this->table_players)->where('team_id', $this->session->userdata('cpl')['team_id'])->get()->result();
	}

	public function get_squad_by_team_id($team_id)
	{
		return $this->db->select('*')->from($this->table_squad)->where('team_id', $team_id)->get();
	}

	public function insert_squad($squad)
	{
		return $this->db->insert($this->table_squad, $squad);
	}

	public function update_squad($squad, $id)
	{
		return $this->db->where('id', $id)->update($this->table_squad, $squad);
	}

	public function get_all_kit_size()
	{
		return $this->db->select('*')->from($this->table_kitsize)
			->get()->result();
	}

	public function get_all_squad($team_id, $tournament_id)
	{
		return $this->db->select('tournament_player_mapping.player_id as id,tournament_player_mapping.tournament_id, tournament_player_mapping.shirt_number, tournament_player_mapping.print_kit, tournament_player_mapping.role_id, players.player_name, players.image, player_role.role_name as player_role, player_playing_status.name as playing_status,player_kit_size.player_size')
			->from($this->table_tournament_player_mapping)
			->join($this->table_players, 'tournament_player_mapping.player_id = players.id')
			->join($this->table_player_role, 'tournament_player_mapping.role_id = player_role.id')
			->join($this->table_player_playing_status, 'players.playing_status = player_playing_status.id')
			->join($this->table_kitsize, 'tournament_player_mapping.kit_size = player_kit_size.id')
			->where('tournament_player_mapping.tournament_id', $tournament_id)
			->where('tournament_player_mapping.team_id', $team_id)
			->get()
			->result();
	}

	public function delete_tournament_player($team_id, $id, $tournament_id)
	{
		return $this->db->where('tournament_id', $tournament_id)->where('team_id', $team_id)->where('player_id', $id)->delete($this->table_tournament_player_mapping);
	}

	public function insert_tournament_player($data)
	{
		return $this->db->insert($this->table_tournament_player_mapping, $data);
	}

	public function check_player($player_id)
	{
		return $this->db->select('*')->from($this->table_tournament_player_mapping)->where('team_id', $this->session->userdata('cpl')['team_id'])->where('player_id', $player_id)->get()->num_rows();
	}

	public function check_role($role_id,$id)
	{

		if ($role_id == 1){

			$where = '(role_id = 1 or role_id = 4)';
		}
		else if ($role_id == 2){
			$where = '(role_id = 2 or role_id = 4)';
		}
		else if ($role_id == 4){
			$where = '(role_id = 1 or role_id = 2 or role_id = 4)';
		}
		else{
			$where = 'role_id ='.$role_id;
		}

		return $this->db->select('*')->from($this->table_tournament_player_mapping)
			->where('team_id', $this->session->userdata('cpl')['team_id'])
			->where('role_id !=', '3')
			->where('tournament_id',$id)
			->where($where)->get()->num_rows();

	}

	public function check_shirt_number($shirt_number,$id)
	{
		return $this->db->select('*')
			->from($this->table_tournament_player_mapping)
			->where('team_id', $this->session->userdata('cpl')['team_id'])
			->where('shirt_number', $shirt_number)
			->where('tournament_id',$id)
			->get()->num_rows();

	}
}
