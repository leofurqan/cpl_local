<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Matches extends RestController
{
    function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'api/cpl_scorer/team_model',
            'api/cpl_scorer/matches_model',
            'api/cpl_scorer/scoring_model',
        ));
    }

    public function matches_get()
    {
        $user_id = $this->input->get("user_id");
        $date = $this->input->get("date");

        if (!empty($user_id) && !empty($date)) {
            $matches = $this->matches_model->getMatchesByOfficial($user_id, $date);

            if ($matches->num_rows() > 0) {
                $this->response(array(
                    'status' => TRUE,
                    'matches' => $matches->result()
                ), 200);
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'No matches'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request',
            ), 404);
        }
    }

    public function match_squad_get()
    {
        $match_id = $this->input->get('match_id');
        $team_id = $this->input->get('team_id');

        if (!empty($match_id) && !empty($team_id)) {
            $match = $this->matches_model->getMatchByID($match_id);

            if ($match != null) {
                $squad = $this->matches_model->getMatchSquad($match->id, $team_id);

                $this->response(array(
                    'status' => TRUE,
                    'squad' => $squad
                ), 200);
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'Match not found'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request'
            ), 404);
        }
    }

    public function tournament_squad_get()
    {
        $tournament_id = $this->input->get('tournament_id');
        $team_id = $this->input->get('team_id');

        if (!empty($tournament_id) && !empty($team_id)) {
            $squad = $this->matches_model->getTournamentSquad($tournament_id, $team_id);

            $this->response(array(
                'status' => TRUE,
                'squad' => $squad
            ), 200);
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request'
            ), 404);
        }
    }

    public function update_squad_post()
    {
        $match_id = $this->input->get('match_id');
        $team_id = $this->input->get('team_id');
        $squad = json_decode($this->input->post('squad'));

        if (!empty($match_id) && !empty($team_id) && count($squad) > 0) {
            if ($this->matches_model->deleteMatchSquad($match_id, $team_id)) {
                $check = true;

                foreach ($squad as $s) {
                    if (!$this->matches_model->updateMatchSquad($s)) {
                        $check = false;
                    }
                }

                $this->response(array(
                    'status' => $check,
                    'message' => $check ? 'Squad Updated' : 'Something went wrong',
                    'data' => $match_id,
                    'data2' => $team_id
                ), 200);
            } else {
                $this->response(array(
                    'status' => false,
                    'message' => 'Something went wrong'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => false,
                'message' => 'Invalid Request'
            ), 404);
        }
    }

    public function award_walkover_post()
    {
        $match_id = $this->input->get("match_id");
        $winning_team_id = $this->input->post('team_id');


        if (isset($match_id, $winning_team_id) && !empty($match_id) && !empty($winning_team_id)) {
            $match = $this->matches_model->getMatchByID($match_id);
            if ($match->status === '0') {
                $data = array(
                    'outcome_type' => 4,
                    'match_winner' => $winning_team_id,
                    'status' => 2
                );

                if ($this->matches_model->updateMatch($data, $match_id)) {
                    $this->response(array(
                        'status' => TRUE,
                        'message' => "Walkover awarded"
                    ), 200);
                } else {
                    $this->response(array(
                        'status' => FALSE,
                        'message' => "Something went wrong"
                    ), 200);
                }
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => "Cannot award walkover on live or completed match"
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => "Invalid Request"
            ), 404);
        }
    }

    public function abandon_match_post()
    {
        $match_id = $this->input->get("match_id");
        $abandon_type = $this->input->post('abandon_type');


        if (isset($match_id, $abandon_type) && !empty($match_id) && !empty($abandon_type)) {
            $match = $this->matches_model->getMatchByID($match_id);
            if ($match->status === '0') {
                $data = array(
                    'outcome_type' => 5,
                    'abandon_reason' => $abandon_type,
                    'status' => 2
                );

                if ($this->matches_model->updateMatch($data, $match_id)) {
                    $this->response(array(
                        'status' => TRUE,
                        'message' => "Match Abandoned Successfully"
                    ), 200);
                } else {
                    $this->response(array(
                        'status' => FALSE,
                        'message' => "Something went wrong"
                    ), 200);
                }
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => "Cannot abandon live or completed match"
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => "Invalid Request"
            ), 404);
        }
    }

    public function reschedule_match_get()
    {
        $match_id = $this->input->get("match_id");

        if (isset($match_id) && !empty($match_id)) {
            $match = $this->matches_model->getMatchByID($match_id);
            if ($match->status === '0') {
                $data = array(
                    'ground_id' => 0,
                    'status' => 0,
                    'match_time' => 0,
                );

                if ($this->matches_model->updateMatch($data, $match_id)) {
                    $this->response(array(
                        'status' => TRUE,
                        'message' => "Match Rescheduled Successfully"
                    ), 200);
                } else {
                    $this->response(array(
                        'status' => FALSE,
                        'message' => "Something went wrong"
                    ), 200);
                }
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => "Cannot reschedule live or completed match"
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => "Invalid Request"
            ), 404);
        }
    }

    public function match_toss_post()
    {
        $match_id = $this->input->get("match_id");
        $toss_winner = $this->input->post('toss_winner');
        $toss_decide = $this->input->post('elected_to');
        $overs = $this->input->post('overs');

        if (!empty($match_id) && !empty($toss_winner) && !empty($toss_decide) && !empty($overs)) {
            $toss = array(
                'toss_winner' => $toss_winner,
                'toss_decide' => $toss_decide,
                'match_overs' => $overs,
                'status' => 1
            );
            if ($this->matches_model->updateMatch($toss, $match_id)) {
                $match_data = $this->matches_model->getMatchByID($match_id);
//			    var_dump($match_data);
//			    die('gg');
                if ($toss_winner == $match_data->first_team_id) {
                    if ($toss_decide == '1') {
                        $innings = array(
                            'innings_no' => 1,
                            'match_id' => $match_id,
                            'batting_team' => $match_data->first_team_id,
                            'bowling_team' => $match_data->second_team_id,
                            'facing_id' => 0,
                            'non_facing_id' => 0,
                            'bowler' => 0,
                            'status' => 1,
                        );
                        if ($this->matches_model->addInnings($innings)) {
                            $this->response(array(
                                'status' => TRUE,
                                'message' => 'Match Started Successfully'
                            ), 200);
                        } else {
                            $this->response(array(
                                'status' => FALSE,
                                'message' => 'Innings not added'
                            ), 200);
                        }
                    } else {
                        $innings = array(
                            'innings_no' => 1,
                            'match_id' => $match_id,
                            'batting_team' => $match_data->second_team_id,
                            'bowling_team' => $match_data->first_team_id,
                            'facing_id' => 0,
                            'non_facing_id' => 0,
                            'bowler' => 0,
                            'status' => 1,
                        );
                        if ($this->matches_model->addInnings($innings)) {
                            $this->response(array(
                                'status' => TRUE,
                                'message' => 'Match Started Successfully'
                            ), 200);
                        } else {
                            $this->response(array(
                                'status' => FALSE,
                                'message' => 'Innings not added'
                            ), 200);
                        }
                    }
                } else {
                    if ($toss_decide == '1') {
                        $innings = array(
                            'innings_no' => 1,
                            'match_id' => $match_id,
                            'batting_team' => $match_data->second_team_id,
                            'bowling_team' => $match_data->first_team_id,
                            'facing_id' => 0,
                            'non_facing_id' => 0,
                            'bowler' => 0,
                            'status' => 1,
                        );
                        if ($this->matches_model->addInnings($innings)) {
                            $this->response(array(
                                'status' => TRUE,
                                'message' => 'Match Started Successfully'
                            ), 200);
                        } else {
                            $this->response(array(
                                'status' => FALSE,
                                'message' => 'Innings not added'
                            ), 200);
                        }
                    } else {
                        $innings = array(
                            'innings_no' => 1,
                            'match_id' => $match_id,
                            'batting_team' => $match_data->first_team_id,
                            'bowling_team' => $match_data->second_team_id,
                            'facing_id' => 0,
                            'non_facing_id' => 0,
                            'bowler' => 0,
                            'status' => 1,
                        );
                        if ($this->matches_model->addInnings($innings)) {
                            $this->response(array(
                                'status' => TRUE,
                                'message' => 'Match Started Successfully'
                            ), 200);
                        } else {
                            $this->response(array(
                                'status' => FALSE,
                                'message' => 'Innings not added'
                            ), 200);
                        }
                    }
                }
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'Something went wrong'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request'
            ), 404);
        }
    }

    public function live_matches_get()
    {
        $data["user_id"] = $this->input->get("user_id");
        $data["user_type"] = $this->input->get("user_type");

        if (!empty($data["user_id"]) && !empty($data["user_type"])) {
            $matches = $this->matches_model->getLiveMatchesByOfficial($data);
            if ($matches->num_rows() > 0) {
                $this->response(array(
                    'status' => TRUE,
                    'matches' => $matches->result()
                ), 200);
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'No live matches'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request',
            ), 404);
        }
    }

    public function upcoming_matches_get()
    {
        $data["user_id"] = $this->input->get("user_id");
        $data["user_type"] = $this->input->get("user_type");

        if (!empty($data["user_id"]) && !empty($data["user_type"])) {
            $matches = $this->matches_model->getUpcomingMatchesByOfficial($data);
            if ($matches->num_rows() > 0) {
                $this->response(array(
                    'status' => TRUE,
                    'matches' => $matches->result()
                ), 200);
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'No upcoming matches'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request',
            ), 404);
        }
    }

    public function update_matches_post()
    {
        $matches = json_decode($this->input->post('matches'), true);
        if (!empty($matches)) {
            foreach ($matches as $match) {
                if (!$this->matches_model->updateMatch($match)) {
                    $this->response(array(
                        'status' => FALSE,
                        'message' => 'Failed to sync matches'
                    ), 200);
                }
            }

            $this->response(array(
                'status' => TRUE,
                'message' => 'Synced Successfully'
            ), 200);
        } else {
            $this->response(array(
                'status' => TRUE,
                'message' => 'Invalid Request'
            ), 200);
        }
    }

    /*public function match_squad_get()
    {
        $match_id = $this->input->get('match_id');
        if (!empty($match_id)) {
            $super_over = $this->matches_model->get_superover_match_by_id($match_id);
            if ($super_over) {
                $match = $this->matches_model->getMatchByID($super_over->super_over_match_id);
                $team_1 = $this->team_model->getTeamByID($match->first_team_id);
                $team_2 = $this->team_model->getTeamByID($match->second_team_id);
                $team_1_squad = $this->matches_model->getMatchSquadByTeamID($super_over->match_id, $match->first_team_id, $match->tournament_id);
                $team_2_squad = $this->matches_model->getMatchSquadByTeamID($super_over->match_id, $match->second_team_id, $match->tournament_id);

                $this->response(array(
                    'status' => TRUE,
                    'team_1' => $team_1,
                    'team_2' => $team_2,
                    'team_1_squad' => $team_1_squad,
                    'team_2_squad' => $team_2_squad
                ), 200);
            } else {
                $match = $this->matches_model->getMatchByID($match_id);
                $team_1 = $this->team_model->getTeamByID($match->first_team_id);
                $team_2 = $this->team_model->getTeamByID($match->second_team_id);
                $team_1_squad = $this->matches_model->getMatchSquadByTeamID($match_id, $match->first_team_id, $match->tournament_id);
                $team_2_squad = $this->matches_model->getMatchSquadByTeamID($match_id, $match->second_team_id, $match->tournament_id);

                $this->response(array(
                    'status' => TRUE,
                    'team_1' => $team_1,
                    'team_2' => $team_2,
                    'team_1_squad' => $team_1_squad,
                    'team_2_squad' => $team_2_squad
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request',
            ), 404);
        }
    }*/

    public function save_squad_post()
    {
        $match_id = $this->input->get('match_id');
        $team_id = $this->input->get('team_id');
        $players = json_decode($this->input->post('players'), true);

        if (!empty($match_id) && !empty($team_id)) {
            $match = $this->matches_model->getMatchByID($match_id);

            if ($match->status == "0") {
                if ($this->matches_model->deleteMatchPlayers($match_id, $team_id)) {
                    foreach ($players as $player) {
                        $player = array(
                            'match_id' => $match_id,
                            'team_id' => $team_id,
                            'player_id' => $player["player_id"],
                            'role_id' => $player["role_id"],
                            'created_date' => date('Y-m-d H:i:s')
                        );

                        $this->matches_model->insertMatchPlayer($player);
                    }

                    $this->response(array(
                        'status' => TRUE,
                    ), 200);
                } else {
                    $this->response(array(
                        'status' => FALSE,
                        'message' => 'Failed to Submit Matches Squad'
                    ), 404);
                }
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'Matches has already been started...'
                ), 404);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request'
            ), 404);
        }
    }

    public function start_match_post()
    {
        $match_id = $this->input->get('match_id');
        $match_overs = $this->input->post('match_overs');
        $toss_winner = $this->input->post('toss_winner');
        $toss_decide = $this->input->post('toss_decide');

        if (!empty($match_id) && !empty($toss_winner) && !empty($toss_decide)) {
            $match = $this->matches_model->getMatchByID($match_id);
            if ($match->status == "0") {
                $match_data = array(
                    'match_overs' => $match_overs,
                    'toss_winner' => $toss_winner,
                    'toss_decide' => $toss_decide,
                    'status' => 1
                );
                if ($this->matches_model->startMatch($match_id, $match_data)) {
                    $result = $this->matches_model->getMatchByID($match_id);
                    if ($toss_winner == $result->first_team_id && $toss_decide == 1) {
                        $innings_data = array(
                            'match_id' => $match_id,
                            'batting_team' => $result->first_team_id,
                            'bowling_team' => $result->second_team_id,
                            'innings_no' => 1,
                            'status' => 0,
                        );
                    } else if ($toss_winner == $result->first_team_id && $toss_decide == 2) {
                        $innings_data = array(
                            'match_id' => $match_id,
                            'batting_team' => $result->second_team_id,
                            'bowling_team' => $result->first_team_id,
                            'innings_no' => 1,
                            'status' => 0,
                        );

                    } else if ($toss_winner == $result->second_team_id && $toss_decide == 1) {
                        $innings_data = array(
                            'match_id' => $match_id,
                            'batting_team' => $result->second_team_id,
                            'bowling_team' => $result->first_team_id,
                            'innings_no' => 1,
                            'status' => 0,
                        );
                    } else if ($toss_winner == $result->second_team_id && $toss_decide == 2) {
                        $innings_data = array(
                            'match_id' => $match_id,
                            'batting_team' => $result->first_team_id,
                            'bowling_team' => $result->second_team_id,
                            'innings_no' => 1,
                            'status' => 0,
                        );
                    }
                    if ($this->scoring_model->add_innings_data($innings_data)) {
                        $this->response(array(
                            'status' => TRUE,
                            'message' => "Matches is gone live..."
                        ), 200);
                    }
                } else {
                    $this->response(array(
                        'status' => FALSE,
                        'message' => 'Failed to Start Matches'
                    ), 404);
                }
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => "Matches has already been started..."
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => "Invalid Request"
            ), 404);
        }
    }

    public function end_match_post()
    {
        $match_id = $this->input->get('match_id');
        $match_winner = $this->input->post('match_winner');
        $outcome_type = $this->input->post('outcome_type');
        $win_by = $this->input->post('win_by');
        $win_type = $this->input->post('win_type');
        $man_of_match = $this->input->post('man_of_match');

        if (!empty($match_id)) {
            if ($outcome_type == 2) {
                $match = $this->matches_model->getMatchByID($match_id);
                $data = array(
                    'tournament_id' => $match->tournament_id,
                    'first_team_id' => $match->first_team_id,
                    'second_team_id' => $match->second_team_id,
                    'ground_id' => $match->ground_id,
                    'scorer_id' => $match->scorer_id,
                    'coordinator_id' => $match->coordinator_id,
                    'first_umpire_id' => $match->first_umpire_id,
                    'second_umpire_id' => $match->second_umpire_id,
                    'third_umpire_id' => $match->third_umpire_id,
                    'commentator_id' => $match->commentator_id,
                    'toss_winner' => $match->toss_winner,
                    'toss_decide' => $match->toss_decide,
                    'match_date' => $match->match_date,
                    'status' => 0,
                    'match_overs' => 1,
                    'match_time' => $match->match_time,
                    'created_date' => date('Y-m-d H:i:s')
                );
                if ($this->matches_model->addmatch($data)) {
                    $id = $this->db->insert_id();
                    $data = array(
                        'match_id' => $match_id,
                        'super_over_match_id' => $id
                    );
                    $this->matches_model->add_superovermatch($data);
                } else {
                    $this->response(array(
                        'status' => false,
                        'message' => 'Something went wrong'
                    ), 200);
                }
            }

            $data = array(
                'match_winner' => $match_winner,
                'outcome_type' => $outcome_type,
                'win_type' => $win_type,
                'win_by' => $win_by,
                'man_of_the_match' => $man_of_match,
                'status' => 2,
            );
            if ($this->matches_model->startMatch($match_id, $data)) {
                $this->end_match_result($match_id);
                $this->response(array(
                    'status' => TRUE,
                ), 200);
            } else {
                $this->response(array(
                    'status' => false,
                    'message' => 'Something went wrong'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request'
            ), 404);
        }
    }

    public function start_innings_post()
    {
        $match_id = $this->input->get('match_id');
        $inning_no = $this->input->get('inning_no');
        $facing_id = $this->input->post('facing_id');
        $non_facing_id = $this->input->post('non_facing_id');
        $bowler_id = $this->input->post('bowler_id');

        if (!empty($match_id) && !empty($inning_no) && !empty($facing_id) && !empty($non_facing_id) && !empty($bowler_id)) {
            $innings = array(
                'facing_id' => $facing_id,
                'non_facing_id' => $non_facing_id,
                'bowler' => $bowler_id
            );
            if ($this->matches_model->updateInnings($match_id, $inning_no, $innings)) {
                $this->response(array(
                    'status' => TRUE,
                    'message' => 'Innings started'
                ), 200);
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'Try again something went wrong'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request'
            ), 404);
        }
    }

    //match_result_data

    public function end_match_result($match_id)
    {
        if (!empty($match_id)) {
            $result = $this->matches_model->getMatchByID($match_id);
            if ($result) {
                $tournament_id = $result->tournament_id;
                $first_team_id = $result->first_team_id;
                $second_team_id = $result->second_team_id;
                if ($this->scoring_model->get_wickets_by_team_id($match_id, $first_team_id)->wickets == 10) {
                    $first_team = $this->scoring_model->get_total_score_by_team_id($match_id, $first_team_id)->score + $this->scoring_model->get_extra_score_by_team_id($match_id, $first_team_id)->score;
                    $first_team = $first_team / 20;
                } else {
                    $balls = $this->scoring_model->get_balls_by_team_id($match_id, $first_team_id)->balls;
                    $divide = $balls / 6;
                    $reminder = $balls % 6;
                    $over = $divide . '.' . $reminder;
                    $first_team = $this->scoring_model->get_total_score_by_team_id($match_id, $first_team_id)->score + $this->scoring_model->get_extra_score_by_team_id($match_id, $first_team_id)->score;
                    $first_team = $first_team / floatval($over);
                }
                if ($this->scoring_model->get_wickets_by_team_id($match_id, $second_team_id)->wickets == 10) {
                    $second_team = $this->scoring_model->get_total_score_by_team_id($match_id, $second_team_id)->score + $this->scoring_model->get_extra_score_by_team_id($match_id, $second_team_id)->score;
                    $second_team = $second_team / 20;
                } else {
                    $balls = $this->scoring_model->get_balls_by_team_id($match_id, $second_team_id)->balls;
                    $divide = $balls / 6;
                    $reminder = $balls % 6;
                    $over = $divide . '.' . $reminder;
                    $second_team = $this->scoring_model->get_total_score_by_team_id($match_id, $second_team_id)->score + $this->scoring_model->get_extra_score_by_team_id($match_id, $second_team_id)->score;
                    $second_team = $second_team / floatval($over);
                }
                $first_team_nrr = $first_team - $second_team;
                $second_team_nrr = $second_team - $first_team;
                $first_team_data = array(
                    'match_id' => $match_id,
                    'tournament_id' => $tournament_id,
                    'team_id' => $first_team_id,
                    'total_run_rate' => $first_team_nrr,
                    'created_date' => date('Y-m-d H:i:s')
                );
                if ($this->scoring_model->add_match_result($first_team_data)) {
                    $second_team_data = array(
                        'match_id' => $match_id,
                        'tournament_id' => $tournament_id,
                        'team_id' => $second_team_id,
                        'total_run_rate' => $second_team_nrr,
                        'created_date' => date('Y-m-d H:i:s'));

                    if ($this->scoring_model->add_match_result($second_team_data)) {
                        $this->response(array(
                            'status' => true,
                            'message' => $second_team
                        ), 200);
                    } else {
                        $this->response(array(
                            'status' => FALSE,
                            'message' => 'Something went wrong'
                        ), 200);
                    }
                } else {
                    $this->response(array(
                        'status' => FALSE,
                        'message' => 'Something went wrong'
                    ), 200);
                }
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'Something went wrong'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Invalid Request'
            ), 404);
        }
    }

    public function batsman_score_post()
    {
        $match_id = $this->input->get('match_id');
        $inning_no = $this->input->get('inning_no');
        $ball_by_ball = json_decode($this->input->post('ball_by_ball'));
        $batsman_score = json_decode($this->input->post('batsman_score'));
        if ($match_id != null && $inning_no != null && $ball_by_ball != null && $batsman_score != null) {
            $inning_data = $this->matches_model->getInningByMatchInnings($match_id, $inning_no);
            if ($inning_data != null) {
                $ball = array(
                    'match_id' => $match_id,
                    'over_id' => $ball_by_ball->over_id,
                    'ball_id' => $ball_by_ball->ball_id,
                    'innings_no' => $inning_no,
                    'team_batting' => $inning_data->batting_team,
                    'team_bowling' => $inning_data->bowling_team,
                    'striker' => $ball_by_ball->striker,
                    'non_striker' => $ball_by_ball->non_striker,
                    'bowler' => $ball_by_ball->bowler
                );
                $batsman = array(
                    'match_id' => $match_id,
                    'over_id' => $batsman_score->over_id,
                    'ball_id' => $batsman_score->ball_id,
                    'runs_scored' => $batsman_score->runs_scored,
                    'innings_no' => $inning_no,
                    'is_boundary' => $batsman_score->is_boundary,
                );
                if ($this->matches_model->addBallByBall($ball) && $this->matches_model->addBatsmanScore($batsman)) {
                    $this->response(array(
                        'status' => TRUE,
                        'message' => 'Score added'
                    ), 200);
                } else {
                    $this->response(array(
                        'status' => FALSE,
                        'message' => 'Try Again Something Went Wrong'
                    ), 200);
                }
            } else {
                $this->response(array(
                    'status' => FALSE,
                    'message' => 'inning not found'
                ), 200);
            }
        } else {
            $this->response(array(
                'status' => FALSE,
                'message' => 'Data cannot be null'
            ), 404);
        }

    }
}
