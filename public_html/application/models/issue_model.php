<?php
class Issue_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function get_current_issue($date) {

			$today = strtotime($date);

			$this->db->select("*");
			$this->db->from("issues");
			$this->db->order_by("date", "asc");
			$query = $this->db->get();

			$issues = $query->result_array();

			$available_issues = array();

			foreach ($issues as $value) {

				$compare = strtotime($value['date']);

				if ($compare < $today) {
					$available_issues[] = $value;
				};
			};

			$current_issue = end($available_issues);

			return $available_issues;

	}

	public function get_publish_date($num = FALSE) {

		if ($num === FALSE)
		{
			$this->db->select("*");
			$this->db->from("issues");
			$this->db->order_by("issue_num", "asc");
			$query = $this->db->get();

			return $query->result_array();
		}

		$query = $this->db->get_where('issues', array('issue_num' => $num));
		$result = $query->row_array();

		return $result['date'];

	}

	public function get_issue($num = FALSE) {

		if ($num === FALSE)
		{
			return $this->db->get('issues');
		}

		$query = $this->db->get_where('issues', array('issue_num' => $num));
		$result = $query->row_array();

		return $result;

	}

	public function set_issue() {

		$data = array(
			'issue_num' => $this->input->post('issue_num'),
			'date' => $this->input->post('date')
		);

		return $this->db->insert('issues', $data);

	}

	public function update_issue($id, $issue_num, $date, $articles) {

	    $data = array(
	        'issue_num' => $issue_num,
			'date' => $date,
			'num_articles' => $articles
	    );

	    $this->db->where('ID', $id);
	    $this->db->update('issues', $data);

	}

	public function delete_issue($ID){

		if (!isset($ID)) {

			$result = "Issue Not Found";
            $this->session->set_flashdata('info',$result);
			redirect('admin'); 

		};

		$this->db->where('ID', $ID);
		$this->db->delete('issues');
		$result = "Issue Deleted";
        $this->session->set_flashdata('info',$result);

	}

}