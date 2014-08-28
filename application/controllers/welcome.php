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


        $cid = $this -> input -> post('cid');
        $uid = $this -> session -> userdata('user_id');

        if(!$uid || !$cid){
            $result['status'] = 'error';
            $result['data'] = '数据错误！请稍后再试试';
            echo json_encode($result);
            return;
        }


        //查询会员今日已投票数，是否超过每天10票
        $this -> load -> model('userdate_model');
        if($this -> userdate_model -> gettodaynum($uid) < 10){

            //会员当日投票数＋1
            if(!$this -> userdate_model -> addtodaynum($uid)){
                $result['status'] = 'error';
                $result['data'] = '投票数更新失败！请稍后再试';
                echo json_encode($result);
                return;
            }

            //获取会员当日已投票数
            $have_num = $this -> userdate_model -> gettodaynum($uid);

            //会员总投票数+1
            $this -> load -> model('usertotal_model');
            $this -> usertotal_model -> addtotal($uid);


        }else{
            $result['status'] = 'error';
            $result['data'] = '您今日投票数已达上限，请您明日再来！';
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
            $con_t = '#凯悦悦享家#我在评选“最佳时令菜肴”活动中，把票投给了' . $info['hotel_name'] . '的【' . $info['food_name'] . '】。快来和我一起为喜爱的菜肴投票，就有机会赢取双人免费酒店餐券!';
            $con = urlencode($con_t);

            $url = 'http://service.weibo.com/share/share.php?url=http%3A%2F%2Fapps.weibo.com%2F2259266354%2FQp1a6Ji&appkey=392409152&language=zh_cn&title=' . $con . '&source=&sourceUrl=&ralateUid=2259266354&message=&uids=&pic=&searchPic=false&content=';
            $result['url'] = $url;
            $result['data'] = '您今日已投' . $have_num . '票，还可以投' . (10 - $have_num) . '票';

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