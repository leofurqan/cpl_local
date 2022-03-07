<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class App extends RestController
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'api/cpl_scorer/app_model'
		));
	}

	public function app_data_get()
	{
		$extra_type = $this->app_model->getExtraTypes();
		$match_abandon = $this->app_model->getMatchAbandons();
		$match_outcome = $this->app_model->getMatchOutcome();
		$penalty_type = $this->app_model->getPenaltyTypes();
		$batting_style = $this->app_model->getBattingStyle();
		$bowling_style = $this->app_model->getBowlingStyle();
		$playing_style = $this->app_model->getPlayingStyle();
		$player_role = $this->app_model->getPlayerRole();
		$toss_decision = $this->app_model->getTossDecision();
		$wicket_type = $this->app_model->getWicketType();
		$win_type = $this->app_model->getWinType();

		$this->response(array(
			'status' => TRUE,
			'extra_type' => $extra_type,
			'match_abandon' => $match_abandon,
			'match_outcome' => $match_outcome,
			'penalty_type' => $penalty_type,
			'batting_style' => $batting_style,
			'bowling_style' => $bowling_style,
			'playing_style' => $playing_style,
			'player_role' => $player_role,
			'toss_decision' => $toss_decision,
			'wicket_type' => $wicket_type,
			'win_type' => $win_type
		), 200);
	}
}
