<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Matches_model extends CI_Model
{
    private $table_matches = "matches";
    private $table_tournaments = "tournaments";
    private $table_grounds = "grounds";
    private $table_time_slots = "time_slots";
    private $table_match_outcome = "match_outcome";
    private $table_match_abandon = "match_abandon";
    private $table_tournament_player_mapping = "tournament_player_mapping";
    private $table_match_player_mapping = "match_player_mapping";
    private $table_players = "players";
    private $table_player_playing_status = "player_playing_status";
    private $table_player_role = "player_role";
    private $table_innings = "innings";
    private $table_ball_by_ball = 'ball_by_ball';
    private $table_batsman_score = 'batsman_score';
    private $table_matches_superover = 'matches_superover';

    // Matches By Official
    function getMatchesByOfficial($user_id, $date)
    {
        return $this->db->select('matches.id, matches.tournament_id, tournaments.tournament_name, matches.first_team_id, matches.second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.display_name as first_d_name, second_team.display_name as second_d_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, match_winner.display_name as match_winner_d_name, grounds.ground_name, matches.toss_winner, matches.toss_decide, match_outcome.outcome_type as match_outcome, match_abandon.abandon_type as abandon_reason, matches.match_date, time_slots.starting_time as match_time, matches.match_overs as overs, matches.status')
            ->from($this->table_matches)
            ->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
            ->join('(SELECT id, company_name, display_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
            ->join('(SELECT id, company_name, display_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
            ->join('(SELECT id, company_name, display_name, logo FROM teams) as match_winner', 'matches.match_winner = match_winner.id', 'left')
            ->join($this->table_grounds, 'matches.ground_id = grounds.id', 'left')
            ->join($this->table_time_slots, 'time_slots.id = matches.match_time', 'left')
            ->join($this->table_match_outcome, 'matches.outcome_type = match_outcome.id', 'left')
            ->join($this->table_match_abandon, 'matches.abandon_reason = match_abandon.id', 'left')
            ->where('matches.scorer_id', $user_id)
            ->where('matches.match_date', $date)
            ->get();
    }

    function updateMatch($data, $match_id)
    {
        return $this->db->where('id', $match_id)->update($this->table_matches, $data);
    }

    function getMatchByID($match_id)
    {
        return $this->db->select('*')->from($this->table_matches)->where('id', $match_id)->get()->row();
    }

    function getMatchSquad($match_id, $team_id)
    {
        return $this->db->select('match_player_mapping.player_id, match_player_mapping.match_id, match_player_mapping.team_id, player_role.role_name as role, players.player_name, players.image, player_playing_status.name as playing_status')
            ->from($this->table_match_player_mapping)
            ->join($this->table_players, 'match_player_mapping.player_id = players.id')
            ->join($this->table_player_role, 'match_player_mapping.role_id = player_role.id')
            ->join($this->table_player_playing_status, 'players.playing_status = player_playing_status.id', 'left')
            ->where('match_player_mapping.match_id', $match_id)
            ->where('match_player_mapping.team_id', $team_id)
            ->order_by('players.id', 'asc')
            ->get()
            ->result();
    }

    function getTournamentSquad($tournament_id, $team_id)
    {
        return $this->db->select('tournament_player_mapping.player_id, tournament_player_mapping.team_id, player_role.role_name as role, players.player_name, players.image, tournament_player_mapping.shirt_number, player_playing_status.name as playing_status')
            ->from($this->table_tournament_player_mapping)
            ->join($this->table_players, 'tournament_player_mapping.player_id = players.id')
            ->join($this->table_player_role, 'tournament_player_mapping.role_id = player_role.id')
            ->join($this->table_player_playing_status, 'players.playing_status = player_playing_status.id', 'left')
            ->where('tournament_player_mapping.tournament_id', $tournament_id)
            ->where('tournament_player_mapping.team_id', $team_id)
            ->order_by('players.id', 'asc')
            ->get()
            ->result();
    }

    public function updateMatchSquad($squad)
    {
        return $this->db->insert($this->table_match_player_mapping, $squad);
    }

    public function deleteMatchSquad($match_id, $team_id)
    {
        return $this->db->where('match_id', $match_id)->where('team_id', $team_id)->delete($this->table_match_player_mapping);
    }

    public function addmatch($data)
    {
        return $this->db->insert($this->table_matches, $data);
    }

    function getLiveMatchesByOfficial($data)
    {
        $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time, matches.status')
            ->from($this->table_matches)
            ->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
            ->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
            ->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
            ->join($this->table_grounds, 'matches.ground_id = grounds.id')
            ->where('matches.status', 1);

        if ($data["user_type"] === "Scorer") {
            $this->db->where('matches.scorer_id', $data["user_id"]);
        } else if ($data["user_type"] === "Coordinator") {
            $this->db->where('matches.coordinator_id', $data["user_id"]);
        }

        return $this->db->get();
    }

    function getUpcomingMatchesByOfficial($data)
    {
        $this->db->select('matches.id, tournaments.id as tournament_id, tournaments.tournament_name, first_team.id as first_team_id, second_team.id as second_team_id, first_team.company_name as first_team_name, second_team.company_name as second_team_name, first_team.display_name as first_d_name, second_team.display_name as second_d_name, first_team.logo as first_team_logo, second_team.logo as second_team_logo, grounds.ground_name, matches.match_date, matches.match_time, matches.status')
            ->from($this->table_matches)
            ->join($this->table_tournaments, 'matches.tournament_id = tournaments.id')
            ->join('(SELECT id, company_name, logo FROM teams) as first_team', 'matches.first_team_id = first_team.id')
            ->join('(SELECT id, company_name, logo FROM teams) as second_team', 'matches.second_team_id = second_team.id')
            ->join($this->table_grounds, 'matches.ground_id = grounds.id')
            ->where('matches.status', 0)
            ->where('matches.match_date', date('Y-m-d'));

        if ($data["user_type"] === "Scorer") {
            $this->db->where('matches.scorer_id', $data["user_id"]);
        } else if ($data["user_type"] === "Coordinator") {
            $this->db->where('matches.coordinator_id', $data["user_id"]);
        }

        return $this->db->get();
    }

    function deleteMatchPlayers($match_id, $team_id)
    {
        return $this->db->where('match_id', $match_id)->where('team_id', $team_id)->delete($this->table_match_player_mapping);
    }

    function insertMatchPlayer($match_player)
    {
        return $this->db->insert($this->table_match_player_mapping, $match_player);
    }

    function startMatch($match_id, $data)
    {
        return $this->db->where('id', $match_id)->update($this->table_matches, $data);
    }

    //score for end match

    public function get_first_inning_by_team_id($match_id)
    {
        return $this->db->select('*')
            ->from($this->table_ball_by_ball)
            ->where('match_id', $match_id)
            ->where('innings_no', 1)
            ->get()->row();

    }

    public function get_second_inning_by_team_id($match_id)
    {
        return $this->db->select('*')
            ->from($this->table_ball_by_ball)
            ->where('match_id', $match_id)
            ->where('innings_no', 2)
            ->get()->row();

    }

    public function get_total_score_by_inning_id($match_id, $inning_id)
    {
        return $this->db->select('sum(batsman_score.runs_scored) as score')
            ->from($this->table_ball_by_ball)
            ->join($this->table_batsman_score, 'ball_by_ball.Match_Id = batsman_score.Match_Id 
			and ball_by_ball.innings_no = batsman_score.innings_no and ball_by_ball.over_id = batsman_score.over_id 
			and ball_by_ball.ball_id = batsman_score.ball_id ')
            ->where('ball_by_ball.match_id', $match_id)
            ->where('ball_by_ball.innings_no', $inning_id)
            ->get()->row();
    }

    public function get_superover_match_by_id($id)
    {
        return $this->db->select('*')
            ->from($this->table_matches_superover)
            ->where('super_over_match_id', $id)
            ->order_by('id', 'desc')
            ->get()->row();
    }

    public function add_superovermatch($data)
    {
        return $this->db->insert($this->table_matches_superover, $data);
    }

    public function addInnings($innings)
    {
        return $this->db->insert($this->table_innings , $innings);
    }

    public function updateInnings($match_id, $inning_no, $innings)
    {
        return $this->db->where(array('match_id' => $match_id, 'innings_no' => $inning_no))
            ->update($this->table_innings , $innings);
    }
}
