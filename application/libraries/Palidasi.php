<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Palidasi
{
	public function __construct()
	{
        $this->CI = &get_instance();
    }

	public function user()
	{
		$config = array(
        array(
                'field' => 'role_id',
                'label' => 'user group',
                'rules' => 'required'
        ),
        array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required'
                ),
        );
	}

}

/* End of file Palidasi.php */
/* Location: ./application/libraries/Palidasi.php */