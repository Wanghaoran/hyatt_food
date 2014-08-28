<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userdate_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    //获取此微博用户今日投票数量
    public function gettodaynum($uid){
        $where = array(
            'weiboId' => $uid,
            'date' => date('Y-m-d'),
        );
        $query = $this -> db -> get_where('user_date_votes', $where, 1);
        $result = $query -> result_array();
        if($result){
            $num = $result['sum'];
        }else{
            $num = 0;
        }
        return $num;
    }

    //会员当日投票数＋1
    public function addtodaynum($uid, $step = 1){
        //先查询是否有当日数据
        $where = array(
            'weiboId' => $uid,
            'date' => date('Y-m-d'),
        );
        $query = $this -> db -> get_where('user_date_votes', $where, 1);
        $result = $query -> result_array();
        if($result){
            //有数据更新
            $data = array(
                'sum' => $result['sum'] + $step,
            );
            $this -> db -> where('id', $result['id']);
            return $this -> db -> update('user_date_votes', $data);
        }else{
            //无数据创建
            $data = array(
                'weiboId' => $uid,
                'date' => date('Y-m-d'),
                'sum' => 1,
            );
            return $this -> db -> insert('user_date_votes', $data);
        }
    }

}