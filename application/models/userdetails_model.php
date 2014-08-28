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

}