<?php

class Front_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_article($limit = 10, $offset = 0) {
		$this->db->where('post_parent', 0);
		$this->db->where('post_status', 1);
		$query = $this->db->get('_posts', $limit, $offset);
		return $query->result_array();
	}

	public function get_article_id($id = 0) {
		$this->db->where('post_parent', 0);
		$this->db->where('post_status', 1);
		$this->db->where('ID', $id);
		$query = $this->db->get('_posts');
		return $query->row_array();
	}

	/**********************************************/
	/* The following two funcitons are for skygr. */
	/**********************************************/

	public function get_arts($offset = 0) {
		$query = $this->db->get('_posts', 10, $offset);
		$result = $query->result_array();
		foreach ($result as $row) {
			$this->db->where('vote_author', $row['post_author']);
			$row['vote_count'] = $this->db->count_all_results('_votes');
		}
		return $result;
	}

	public function set_vote($openid = "", $author = "") {
		$data['vote_openid'] = $openid;
		$data['vote_author'] = $author;
		$this->db->where($data);
		$count = $this->db->count_all_results('_votes');
		if ($count != 0) 
			return false; 
		$this->db->insert('_votes', $data);
		return true;
	}

    /***********************************/
    /* The follwing code is completed. */
    /***********************************/

	public function get_regist($openid = "") {
		$data['user_lastlogin'] = date("Y-m-d H:i:s");
		$this->db->where('user_openid', $openid);
		$this->db->update('_users', $data);
		return $this->db->affected_rows(); 
	}

	public function get_post($openid = "") {
		$this->db->where('post_author', $openid);
		$data1 = $this->db->get('_posts')->row_array();
		$this->db->where('user_openid', $openid);
		$data2 = $this->db->get('_users')->row_array();
		return array_merge($data1, $data2);
	}
	
	public function set_regist($data = array()) {
		return $this->db->insert('_users', $data);
	}

	public function set_moreinfo($data = array()) {
		$this->db->where('user_openid', $data['user_openid']);
		return $this->db->update('_users', $data);
	}

	public function set_post($data = array()) {
		$data['post_modified'] = date("Y-m-d H:i:s");
		$this->db->where('post_author', $data['post_author']);
		$this->db->update('_posts', $data);
		if ($this->db->affected_rows() == 0) {
			$data['post_date'] = $data['post_modified'];
			$this->db->insert('_posts', $data);
		}
	    return 1;
	}
}