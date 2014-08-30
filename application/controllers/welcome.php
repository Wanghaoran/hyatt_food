<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $this -> load -> model('hotel_model');
        $this->load->library('encrypt');

        //首页滚动数据
        $new_result = $this -> hotel_model -> getallhotel();
        shuffle($new_result);

        //排行榜
        $numorder_result = $this -> hotel_model -> gethotelbynum();

        //已加入人数
        $this -> load -> model('user_model');
        $all_num = $this -> user_model -> getsum();
        $show_num = str_pad($all_num, 5, 0, STR_PAD_LEFT);

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
            $uid_encrypy = $this -> encrypt -> encode($uid);
        }else if(empty($_GET['key'])){
            //不是微博浏览，跳转到微博首页
            $this->load->helper('url');
            redirect('http://apps.weibo.com/2259266354/Qp1a6Ji');
        }else{
            $uid_encrypy = $this->input->get('key');
        }
        $data = array(
            'hotel_data' => $new_result,
            'num_order' => $numorder_result,
            'count_data' => count($new_result),
            'uid' => $uid_encrypy,
            'show_num' => $show_num,
        );

        $this -> load -> view('index', $data);
    }

    public function enroll()
    {
        $this->load->library('encrypt');
        $result = array();

        $post_str = $this -> input -> post('key');
        $posts = str_replace(' ','+',$post_str);
        $uid = $this->encrypt->decode($posts);

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

        $this->load->library('encrypt');


        $cid = $this -> input -> post('cid');

        $post_str = $this -> input -> post('key');
        $posts = str_replace(' ','+',$post_str);
        $uid = $this->encrypt->decode($posts);

        if(!$uid || !$cid){
            $result['status'] = 'error';
            $result['data'] = '数据错误！请稍后再试试' . $cid . '--' . $uid;
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

            //记录投票明细
            $this -> load -> model('userdetails_model');
            $this -> userdetails_model -> adddetails($uid, $cid);


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


    //ajax获取总人数
    public function ajaxgetusernum(){
        //已加入人数
        $this -> load -> model('user_model');
        $all_num = $this -> user_model -> getsum();
        $show_num = str_pad($all_num, 5, 0, STR_PAD_LEFT);
        echo $show_num;
    }

    public function sendenrollemail(){

        $this->load->library('encrypt');


        $post_str = $this -> input -> post('key');
        $posts = str_replace(' ','+',$post_str);
        $uid = $this->encrypt->decode($posts);

        $this -> load -> model('user_model');
        $result = $this -> user_model -> getUser($uid);
        $toemail = $result[0]['email'];
        if(!$toemail){
            die('bad');
        }

        $content = file_get_contents($this->config->base_url() . 'static/mail/email.html');
        $this->load->library('sendemail');
        $this -> sendemail -> setServer("smtp.exmail.qq.com", "yuexiangjia.hyatt@uniquead.cn", "cxwj9876", 465, true); //设置smtp服务器，到服务器的SSL连接
        $this -> sendemail -> setFrom("yuexiangjia.hyatt@uniquead.cn"); //设置发件人
        $this -> sendemail -> setReceiver($toemail); //设置收件人，多个收件人，调用多次
        $this -> sendemail -> setMail("欢迎加入凯悦悦享家", $content); //设置邮件主题、内容
        $this -> sendemail -> sendMail(); //发送

    }

    public function all()
    {

        $page = !empty($_GET['per_page']) ? $_GET['per_page'] : 1;

        $uid = $this->input->get('key');


        $this -> load -> model('hotel_model');

        $this->load->library('pagination');

        $config['base_url'] = 'http://hyatt.cnhtk.cn/welcome/all?key=' . $uid;
        $config['total_rows'] = $this -> hotel_model -> gettotalnum();
        $config['per_page'] = 9;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 5;
        $config['page_query_string'] = TRUE;
        //当前页
        $config['cur_tag_open'] = '<span class="current">';
        $config['cur_tag_close'] = '</span>';
        //封装
        $config['full_tag_open'] = '<div class="meneame">';
        $config['full_tag_close'] = '</div>';


        $this->pagination->initialize($config);

        $pageshow = $this->pagination->create_links();

        $new_result = $this -> hotel_model -> gethotelbylimit($page);


        $data = array(
            'hotel_data' => $new_result,
            'pageshow' => $pageshow,
            'uid' => $uid,
        );
        $this -> load -> view('all', $data);
    }

    public function old()
    {
        $uid = $this->input->get('key');
        $data = array(
            'uid' => $uid,
        );
        $this -> load -> view('old', $data);
    }

    public function terms()
    {
        $uid = $this->input->get('key');
        $data = array(
            'uid' => $uid,
        );
        $this -> load -> view('terms', $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

