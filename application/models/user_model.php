<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    public function insertUser($uid, $email){

        $data = array(
            'weiboId' => $uid,
            'email' => $email,
            'addTime' => time(),
            'status' => 2,
        );

        return $this -> db -> insert('user', $data);
    }

    public function getUser($uid){
        $query = $this -> db -> get_where('user', array('weiboId' => $uid), 1);
        return $query -> result_array();
    }

    //获取人数
    public function getsum(){
        $now = $this->db->count_all_results('user');
        $old = 10732;
        $total = $now + $old;
        return $total;
    }


}
