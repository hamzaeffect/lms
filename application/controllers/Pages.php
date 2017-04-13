<?php

class Pages extends CI_Controller 
{
	public function index()
	{
		if ( ! file_exists(APPPATH.'views/home.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $this->load->view('home');
	}
}