<?php

function is_admin_logged_in()
{
	$CI = &get_instance();
	$admin = $CI->session->userdata('cpl');
	if (isset($admin['is_admin'])) {
		if ($admin['is_admin']) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function is_coordinator_logged_in()
{
	$CI = &get_instance();
	$coordinator = $CI->session->userdata('cpl');
	if (isset($coordinator['is_coordinator'])) {
		if ($coordinator['is_coordinator']) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function is_commentator_logged_in()
{
	$CI = &get_instance();
	$commentator = $CI->session->userdata('cpl');
	if (isset($commentator['is_commentator'])) {
		if ($commentator['is_commentator']) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function is_team_logged_in()
{
	$CI = &get_instance();
	$team = $CI->session->userdata('cpl');
	if (isset($team['is_team'])) {
		if ($team['is_team']) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function is_player_logged_in()
{
	$CI = &get_instance();
	$player = $CI->session->userdata('cpl');
	if (isset($player['is_player'])) {
		if ($player['is_player']) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

function is_marketing_manager_logged_in()
{
	$CI = &get_instance();
	$marketing_manager = $CI->session->userdata('cpl');
	if (isset($marketing_manager['is_marketing_manager'])) {
		if ($marketing_manager['is_marketing_manager']) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
//function is_commentator_logged_in()
//{
//	$CI = &get_instance();
//	$commentator = $CI->session->userdata('cpl');
//	if (isset($commentator['is_commentator'])) {
//		if ($commentator['is_commentator']) {
//			return true;
//		} else {
//			return false;
//		}
//	} else {
//		return false;
//	}
//}
