<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userdetails_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    public function adddetails($uid, $hid){
        $data = array(
            'weiboId' => $uid,
            'time' => time(),
            'toHid' => $hid,
        );
        return $this -> db -> insert('user_details', $data);
    }

    public function checkhave($uid, $hid){
        $dayBegin = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        $dayEnd = mktime(23, 59, 59, date('m'), date('d'), date('Y'));
        $this -> db -> where('time <', $dayEnd);
        $this -> db -> where('time >', $dayBegin);
        $this -> db -> where('weiboId', $uid);
        $this -> db -> where('toHid', $hid);
        $query = $this -> db -> get('user_details');
        return $query -> result_array();
    }

}