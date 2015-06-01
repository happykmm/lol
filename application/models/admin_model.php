<?php

class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}



	public function get_article($status = 0) {
		$this->db->where('post_parent', 0);
		if (!($status === 0))
			$this->db->where('post_status', $status);
		$query = $this->db->get('_posts');
		return $query->result_array();
	}

	public function get_article_id($id = 0) {
		$this->db->where('ID', $id);
		$query = $this->db->get('_posts');
		return $query->row_array();
	}

	public function insert($data = array())
	{
	    $this->db->insert('_posts', $data);
	    return $data['post_author'];
	}

	public function update($data = array(), $author = "")
	{
	  	$this->db->where('post_author', $author);
	  	return $this->db->update('_posts', $data);
	}

	public function delete($id = 0)
	{
		$data = array('post_status' => -1);
		$this->db->where('ID', $id);
		return $this->db->update('_posts', $data);
	}

	public function retrieve($id = 0)
	{
		$data = array('post_status' => 1);
		$this->db->where('ID', $id);
		return $this->db->update('_posts', $data);
	}

}