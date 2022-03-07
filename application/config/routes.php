<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'website';
$route['admin'] = 'admin/login';
$route['team'] = 'team/login';
$route['commentator'] = 'commentator/login';
$route['player'] = 'player/login';
$route['marketing_manager'] = 'marketing_manager/login';
$route['overlay/:id'] = 'overlay/index';


/*
 * CPL Scorer
 */

//Authentication
$route['api/cpl_scorer/authentication/login'] = 'api/cpl_scorer/authentication/login';

//Matches
$route['api/cpl_scorer/matches/upcoming_matches'] = 'api/cpl_scorer/matches/upcoming_matches';
$route['api/cpl_scorer/matches/live_matches'] = 'api/cpl_scorer/matches/live_matches';
$route['api/cpl_scorer/matches/start_match'] = 'api/cpl_scorer/matches/start_match';
$route['api/cpl_scorer/matches/update_matches'] = 'api/cpl_scorer/matches/update_matches';

//Tournament Squad
$route['api/cpl_scorer/tournaments/squad'] = 'api/cpl_scorer/tournaments/squad';

//Matches Squad
$route['api/cpl_scorer/matches/match_squad'] = 'api/cpl_scorer/matches/match_squad';
$route['api/cpl_scorer/matches/save_squad'] = 'api/cpl_scorer/matches/save_squad';

//Scoring
$route['api/cpl_scorer/scoring/match_scoring'] = 'api/cpl_scorer/scoring/match_scoring';
$route['api/cpl_scorer/scoring/start_innings'] = 'api/cpl_scorer/scoring/start_innings';
$route['api/cpl_scorer/scoring/ball_by_ball'] = 'api/cpl_scorer/scoring/ball_by_ball';
$route['api/cpl_scorer/scoring/end_over'] = 'api/cpl_scorer/scoring/end_over';
$route['api/cpl_scorer/scoring/next_batsman'] = 'api/cpl_scorer/scoring/next_batsman';
$route['api/cpl_scorer/scoring/next_bowler'] = 'api/cpl_scorer/scoring/next_bowler';
$route['api/cpl_scorer/scoring/switch_bowler'] = 'api/cpl_scorer/scoring/switch_bowler';
$route['api/cpl_scorer/scoring/shuffle_batsman'] = 'api/cpl_scorer/scoring/shuffle_batsman';
$route['api/cpl_scorer/scoring/undo'] = 'api/cpl_scorer/scoring/undo';
$route['api/cpl_scorer/scoring/end_innings'] = 'api/cpl_scorer/scoring/end_innings';
$route['api/cpl_scorer/scoring/end_match'] = 'api/cpl_scorer/matches/end_match';
$route['api/cpl_scorer/scoring/get_all_penalties'] = 'api/cpl_scorer/scoring/get_all_penalties';
$route['api/cpl_scorer/scoring/add_penalty'] = 'api/cpl_scorer/scoring/add_penalty';

//CPL Team
$route['api/cpl_team/authentication/login'] = 'api/cpl_team/authentication/login';    //Login
$route['api/cpl_team/authentication/change_password'] = 'api/cpl_team/authentication/change_password';    //Change Password
$route['api/cpl_team/authentication/edit_team_profile'] = 'api/cpl_team/authentication/edit_team_profile';    //Edit Team Profile
$route['api/cpl_team/authentication/edit_profile'] = 'api/cpl_team/authentication/edit_profile';    //Edit Player Profile
$route['api/cpl_team/authentication/user_verification'] = 'api/cpl_team/authentication/user_verification';        //Verify Player
$route['api/cpl_team/authentication/send_code'] = 'api/cpl_team/authentication/send_code';        //send code

$route['api/cpl_team/tournaments'] = 'api/cpl_team/tournaments/tournaments';    //Tournaments
$route['api/cpl_team/tournaments/accept_invitation'] = 'api/cpl_team/tournaments/accept_invitation';    //Accept Tournament Invitation
$route['api/cpl_team/tournaments/squad'] = 'api/cpl_team/tournaments/squad'; //Tournament Squad
$route['api/cpl_team/tournaments/save_squad'] = 'api/cpl_team/tournaments/save_squad'; //Save Tournament Squad
$route['api/cpl_team/tournaments/teams'] = 'api/cpl_team/tournaments/teams'; //Tournament Teams
$route['api/cpl_team/tournaments/about'] = 'api/cpl_team/tournaments/about'; //Tournament About
$route['api/cpl_team/tournaments/leaderboard'] = 'api/cpl_team/tournaments/get_leaderboard'; //Tournament leaderboard

$route['api/cpl_team/matches'] = 'api/cpl_team/matches/matches';    //Matches
$route['api/cpl_team/matches/squad'] = 'api/cpl_team/matches/squad';    //Matches Squad
$route['api/cpl_team/matches/save_squad'] = 'api/cpl_team/matches/save_squad';    //Save Matches Squad
$route['api/cpl_team/matches/get_match_by_id'] = 'api/cpl_team/matches/get_match_by_id';

$route['api/cpl_team/home/get_teams_by_player'] = 'api/cpl_team/home/get_teams_by_player';

$route['api/cpl_team/players'] = 'api/cpl_team/players/players';    //Players
$route['api/cpl_team/players/add_player'] = 'api/cpl_team/players/add_player';    //Add New Player
$route['api/cpl_team/players/edit_profile'] = 'api/cpl_team/players/edit_profile';    //Edit Player
$route['api/cpl_team/players/player'] = 'api/cpl_team/players/get_player_by_id';
$route['api/cpl_team/players/players_by_status'] = 'api/cpl_team/players/players_by_status';
$route['api/cpl_team/matches/matches_by_player'] = 'api/cpl_team/matches/matches_by_player';	//Matches By Player

// settings
$route['api/cpl_team/settings/application_settings'] = 'api/cpl_team/settings/application_settings';
$route['api/cpl_team/settings/application_settings_by_id'] = 'api/cpl_team/settings/application_settings_by_id';
// end settings

$route['api/cpl_team/notifications'] = 'api/cpl_team/notifications/notifications'; //Notifications

$route['overlay'] = 'overlay';    //overlay

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
