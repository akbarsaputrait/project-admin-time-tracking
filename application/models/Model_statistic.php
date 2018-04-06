<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_statistic extends CI_Model
{

    private $activities = 'activities';
    private $tasks = 'tasks';

    public function activities($id)
    {
        $sql = $this->db->select('app, COUNT(app) AS count')
                        ->from($this->activities)
                        ->where(array('userid' => $id))
                        ->group_by('app')
                        ->order_by('count', 'DESC')
                        ->limit(5)
                        ->get();
        return $sql;
    }

    public function tasks($id)
    {
        $sql = $this->db->select('name, DATEDIFF(done, progress) AS date')
                        ->from($this->tasks)
                        ->where('userid', $id)
                        ->order_by('id', 'desc')
                        ->limit(7)
                        ->get();
        return $sql;
    }
}