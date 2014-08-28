<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usertotal_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    public function addtotal($uid){
        //查询数据，
        $where = array(
            'weiboId' => $uid,
        );
        $query = $this -> db -> get_where('user_total', $where, 1);
        $result = $query -> result_array();

        //有则更新，没有则添加
        if($result){
            $data = array(
                'total' => $result[0]['total'] + 1,
            );
            $this -> db -> where('weiboId', $uid);
            return $this -> db -> update('user_total', $data);
        }else{

            $data = array(
                'weiboId' => $uid,
                'total' => 1,
            );
            return $this -> db -> insert('user_total', $data);

        }

    }

}