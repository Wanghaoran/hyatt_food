<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $this -> load -> model('hotel_model');
        $new_result = $this -> hotel_model -> getallhotel();
        $numorder_result = $this -> hotel_model -> gethotelbynum();

        $this->load->helper('weibo');
        $this->load->helper('cookie');
        //微博POST的数据
        if(!empty($_POST['signed_request'])){
            $weibo_post = parseSignedRequest($_POST['signed_request']);
            $uid = $weibo_post['user_id'];
            set_cookie('user_id', $uid);
        }else if(!empty($_COOKIE['user_id'])){
            $uid = get_cookie('user_id');
        }else{
            $uid = 'null';
        }

        var_dump($_COOKIE);


        $data = array(
            'hotel_data' => $new_result,
            'num_order' => $numorder_result,
            'count_data' => count($new_result),
        );
        $this -> load -> view('index', $data);
    }

    public function all($page = 1)
    {
        $this -> load -> model('hotel_model');
//        $new_result = $this -> hotel_model -> gethotelbylimit($page);
        $new_result = $this -> hotel_model -> getallhotel();

        $data = array(
            'hotel_data' => $new_result,
        );
        $this -> load -> view('all', $data);
    }

    public function old()
    {
        $this -> load -> view('old');
    }

    public function terms()
    {
        $this -> load -> view('terms');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */