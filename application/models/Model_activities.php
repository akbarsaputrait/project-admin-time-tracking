
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_activities extends CI_Model
{
    public $table = 'activities';
    public $column_order = array(null, 'app', 'title', 'date', 'time'); //set column field database for datatable orderable
    public $column_search = array('id', 'app', 'title', 'date', 'time'); //set column field database for datatable searchable
    public $order = array('id' => 'asc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query($id, $interval = '')
    {
        $this->db->select('id, app, title, date, DATE_FORMAT(time, "%H:%i") as time');
        $this->db->from($this->table);
        $this->db->where('userid', $id);

        switch ($interval) {
            case "today":
                $this->db->where('userid', $id);
                $this->db->where('date', date('Y-m-d'));
                break;
            case "yesterday":
                $this->db->where('userid', $id);    
                $this->db->where('date >', 'NOW() - INTERVAL 1 DAY', FALSE);
                break;
            case "everytime":
                $this->db->where('userid', $id);
                break;
            default:
                $this->db->where('userid', $id);

        }

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if (isset($_POST['search']['value'])) // if datatable send POST for search
            {
                if ($i == 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                {
                    $this->db->group_end();
                }
                //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    // TODAY
    public function get_acivities_today($id, $start, $length)
    {
        $this->_get_datatables_query($id, $interval = 'today');
        if ($length != -1) {
            $this->db->limit($length, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_today($id)
    {
        $this->_get_datatables_query($id, $interval = 'today');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_today($id)
    {
        $this->db->from($this->table);
        $this->db->where(array('userid' => $id, 'date' => date('Y-m-d')));
        return $this->db->count_all_results();
    }

    // YESTERDAY
    public function get_activities_yesterday($id, $start, $length)
    {
        $this->_get_datatables_query($id, $interval = 'yesterday');
        if ($length != -1) {
            $this->db->limit($length, $start);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_yesterday($id)
    {
        $this->_get_datatables_query($id, $interval = 'yesterday');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_yesterday($id)
    {
        $this->db->from($this->table);
        $this->db->where(array('userid' => $id, 'DATE(date)' => 'DATE(NOW() - INTERVAL 1 DAY)'));
        return $this->db->count_all_results();
    }

    // EVERYTIME
    public function get_activities_everytime($id, $start, $length)
    {
        $this->_get_datatables_query($id, $interval = 'everytime');
        if ($length != -1) {
            $this->db->limit($length, $start);
        }

        $query = $this->db->get();

        return $query->result();
    }

    public function count_filtered_everytime($id)
    {
        $this->_get_datatables_query($id, $interval = 'everytime');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_everytime($id)
    {
        $this->db->from($this->table);
        $this->db->where('userid', $id);
        return $this->db->count_all_results();
    }
}
