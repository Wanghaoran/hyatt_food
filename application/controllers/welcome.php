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
        }else if(empty($_GET['form'])){
            //不是微博浏览，跳转到微博首页
            $this->load->helper('url');
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

    public function enroll()
    {
        $result = array();
        $uid = $this -> session -> userdata('user_id');
        $email = $this -> input -> post('email');
        if(!$uid || !$email){
            $result['status'] = 'error';
            $result['data'] = '数据错误！请稍后再试试';
            echo json_encode($result);
            return;
        }

        $this -> load -> model('user_model');
        if($this -> user_model -> getUser($uid)){
            $result['status'] = 'error';
            $result['data'] = '您已注册成为凯悦悦享家，请勿重复申请！';
            echo json_encode($result);
            return;
        }

        if($this -> user_model -> insertUser($uid, $email)){
            $result['status'] = 'success';
            $result['data'] = '恭喜您成功注册凯悦悦享家！';
            echo json_encode($result);
            return;
        }else{
            $result['status'] = 'error';
            $result['data'] = '数据传输错误！请稍后再试试';
            echo json_encode($result);
            return;
        }

    }

    public function vote(){
        //TODO:会员表增加投票总次数
        //TODO:增加一个表记录所有投票，包含时间，UID，CID
        //TODO:增加一个表，记录会员每天的投票量
        //TODO:增加每个会员每天10票限制


        $cid = $this -> input -> post('cid');
        $uid = $this -> session -> userdata('user_id');

        if(!$uid || !$cid){
            $result['status'] = 'error';
            $result['data'] = '数据错误！请稍后再试试';
            echo json_encode($result);
            return;
        }

        //更新酒店得票数
        $this -> load -> model('hotel_model');
        if($this -> hotel_model -> addnum($cid)){
            $result['status'] = 'success';
            //是否已注册
            $this -> load -> model('user_model');
            if($this -> user_model -> getUser($uid)){
                $result['isregister'] = 'yes';
            }else{
                $result['isregister'] = 'no';
            }
            echo json_encode($result);
            return;
        }else{
            $result['status'] = 'error';
            $result['data'] = '数据传输错误！请稍后再试试';
            echo json_encode($result);
            return;
        }


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