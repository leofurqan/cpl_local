<?php

class Dashboard_model extends CI_Model {
	private $table_match_summary = 'match_summary';

	public function get_match_summary_count() {
		return $this->db->select('count(*) as match_summary')->from($this->table_match_summary)->get()->row();
	}
}
