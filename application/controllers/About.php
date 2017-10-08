<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application
{

    /**
     * About Page.
     *
     * Maps to the following URL
     * 		http://example.com/about
     *
     * So any other public methods not prefixed with an underscore will
     * map to /about/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->data['pagetitle'] = 'About - Unlikely Wacky';
        $this->data['pagebody'] = 'about';
        $this->render();
    }

}
