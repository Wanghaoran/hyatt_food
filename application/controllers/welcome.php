<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $this -> load -> model('hotel_model');
        $new_result = $this -> hotel_model -> getallhotel();
        $numorder_result = $this -> hotel_model -> gethotelbynum();

        $this->load->helper('weibo');

        //微博POST的数据
        if(!empty($_POST['signed_request'])){
            $weibo_post = parseSignedRequest($_POST['signed_request']);
            //未登录
            if(empty($weibo_post['user_id'])){
                $uid = 'null';
            }else{
                $uid = $weibo_post['user_id'];
            }
            $this->session->set_userdata('user_id', $uid);
        }else if(!empty($_GET['form']) && $_GET['form'] != 'weibo'){
            //不是微博浏览，跳转到微博首页
            redirect('http://apps.weibo.com/2259266354/Qp1a6Ji');
        }else{
            $uid = $this -> session -> userdata('user_id');
        }
        $data = array(
            'hotel_data' => $new_result,
            'num_order' => $numorder_result,
            'count_data' => count($new_result),
            'uid' => $uid,
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