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
            //获取酒店名称和菜品名称
            $this -> load -> model('hotel_model');
            $info = $this -> hotel_model -> get_hotel($cid);
            $url_t = 'http://service.weibo.com/share/share.php?url=http%3A%2F%2Fopen.weibo.com%2Fsharebutton&appkey=2131282401&language=zh_cn&title=#凯悦悦享家#我在评选“最佳时令菜肴”活动中，把票投给了' . $info['hotel_name'] . '酒店的【' . $info['food_name'] . '】。快来和我一起为喜爱的菜肴投票，就有机会赢取双人免费酒店餐券!source=&sourceUrl=&ralateUid=2259266354&message=&uids=&pic=&searchPic=false&content=';

            $url_t = 'http://service.weibo.com/share/share.php?url=http%3A%2F%2Fopen.weibo.com%2Fsharebutton&appkey=2131282401&language=zh_cn&title=#中把票投给了' . $info['hotel_name'] . '酒' . $info['food_name'] . '快来和我一source=&sourceUrl=&ralateUid=2259266354&message=&uids=&pic=&searchPic=false&content=';

            $url = urldecode($url_t);
            $result['url'] = $url;

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