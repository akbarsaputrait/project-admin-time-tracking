<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_tasks extends CI_Model
{

    var $table = 'tasks';
    var $join = 'project';
	var $column_order = array(null, 'project.name AS project','tasks.name','tasks.waiting','tasks.progress','tasks.done'); //set column field database for datatable orderable
	var $column_search = array('project.name','tasks.name','tasks.waiting','tasks.progress','tasks.done'); //set column field database for datatable searchable 
    var $order = array('tasks.id' => 'asc'); // default order 
    
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($id)
	{
		$this->db->select('tasks.name, tasks.waiting, tasks.progress, tasks.done, project.name AS project');
        $this->db->from($this->table);
        $this->db->join($this->join, 'tasks.id_project = project.id');
        $this->db->where('tasks.userid', $id);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if(isset($_POST['search']['value'])) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($id, $length, $start)
	{
		$this->_get_datatables_query($id);
		if($length != -1)
		$this->db->limit($length, $start);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($id)
	{
		$this->_get_datatables_query($id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($id)
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

    
    public function get_count_status($id)
    {
        $sql = $this->db->query('SELECT name  FROM ' . $this->table . ' WHERE userid = ' . $id . ' AND (waiting IS NOT NULL OR progress IS NOT NULL) AND done is NULL')->num_rows();
        return $sql;
    }
    
    public function project($id)
    {
        $sql = $this->db->select('project.name AS name')
            ->from('project')
            ->join($this->table, 'project.id = tasks.id_project')
            ->where('userid', $id)
            ->group_by('project.name')
            ->get();
        return $sql;
    }
}
