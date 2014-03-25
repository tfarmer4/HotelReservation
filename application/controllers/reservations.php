<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reservations
 * Choice template, this is where users will make reservation choices
 * @author Edmund
 */
class Reservations extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('header');
        $this->load->view('home_view');
    }

}

