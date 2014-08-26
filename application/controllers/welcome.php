<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $this -> load -> model('hotel_model');
        $new_result = $this -> hotel_model -> getallhotel();
        $numorder_result = $this -> hotel_model -> gethotelbynum();
        $data = array(
            'hotel_data' => $new_result,
            'num_order' => $numorder_result,
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