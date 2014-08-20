<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this -> load -> database();
    }

    public function getallhotel()
    {
        $query = $this -> db -> get('hotel');
        return $query -> result_array();
    }
}