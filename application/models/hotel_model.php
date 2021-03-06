<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    public function getallhotel()
    {

        $this -> db -> where('show', 1);
        $query = $this -> db -> get('hotel');
        return $query -> result_array();
    }

    public function gethotelbynum()
    {

        $this->db->order_by("num", "DESC");
        $this->db->limit(3);
        $query = $this -> db -> get('hotel');
        return $query -> result_array();
    }

    public function gethotelbylimit($page)
    {
        $start = $page * 9 - 9;
        $this->db->limit(9, $start);
        $query = $this -> db -> get('hotel');
        return $query -> result_array();
    }

    public function addnum($cid, $step = 1){

        $query = $this -> db -> get_where('hotel', array('id' => $cid), 1);
        $result = $query -> row_array();
        $data = array(
            'num' => $result['num'] + $step,
        );
        $this -> db -> where('id', $cid);
        return $this -> db -> update('hotel', $data);
    }

    public function get_hotel($id)
    {
        $query = $this -> db -> get_where('hotel', array('id' => $id), 1);
        return $query -> row_array();
    }

    //获得酒店数量
    public function gettotalnum(){
        $now = $this->db->count_all_results('hotel');
        return $now;
    }

    //获得所有酒店按投票数排序
    public function getallhotelbynum(){
        $this->db->order_by("num", "DESC");
        $query = $this -> db -> get('hotel');
        return $query -> result_array();
    }
}
