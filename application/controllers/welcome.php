<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
        $this -> load -> model('hotel_model');
        $new_result = $this -> hotel_model -> getallhotel();
        var_dump($new_result);
        $this -> load -> view('index');
    }

    public function all()
    {
        $this -> load -> view('all');
    }

    public function old()
    {
        $this -> load -> view('old');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */