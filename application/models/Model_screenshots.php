<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_screenshots extends CI_Model
{

    private $table = 'screenshot';

    public function today($id)
    {
        $sql = $this->db->select('*')
                        ->from($this->table)
                        ->where(array('userid' => $id, 'date' => date('Y-m-d')))
                        ->order_by('id', 'desc')
                        ->get();
        return $sql;
    }

    public function yesterday($id)
    {
        $sql = $this->db->select('filename, app, title, date, DATE_FORMAT(time, "%H:%i") as time')
                        ->from($this->table)
                        ->where(array('userid' => $id, 'DATE(date)' => 'DATE(NOW() - INTERVAL 1 DAY)'))
                        ->order_by('id', 'desc')
                        ->get();
        return $sql;
    }

    public function week($id)
    {
        $sql = $this->db->select('filename, date, app, title, DATE_FORMAT(time, "%H:%i") as time')
                        ->from($this->table)
                        ->where(array('userid' => $id, 'DATE(date) >=' => 'DATE(NOW() - INTERVAL 7 DAY)'))
                        ->order_by('id', 'desc')
                        ->get();
        return $sql;
    }

    public function by_date($id, $startdate, $enddate)
    {
        $sql = $this->db->select('userid, filename, app, title, date, DATE_FORMAT(time, "%H:%i") as time')
                        ->from('screenshot')
                        ->where('userid = ' . $id . ' AND date BETWEEN "' . $startdate . '" AND "' . $enddate . '"')
                        ->order_by('id', 'asc')
                        ->get();
        return $sql;                        
    }

    public function all($id)
    {
        $sql = $this->db->select('userid, filename, app, title, date, DATE_FORMAT(time, "%H:%i") as time')
                        ->from('screenshot')
                        ->where(array('userid' => $id))
                        ->order_by('id', 'desc')
                        ->get();
        return $sql;    
    }
}