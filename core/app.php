<?php

/**
 * Created by PhpStorm.
 * User: timodz
 * Date: 8/29/17
 * Time: 6:18 PM
 * Description: Main Web application Class
 */
Class app
{
    protected $Data = array();

    public function __construct()
    {
        //Load Requested Page
        $this->SelectDest();
    }

    public function SelectDest()
    {
        //testing the p parameter to decide what controller to load
        if (isset($_GET['p'])) {
            $page = $_GET['p'];
            if ($page === 'countries') {
                // load controller responsible of getting and showing data
                new showdata();
            } elseif ($page === 'download') {
                // load controller responsible of downloading data
                new download();
            } else {
                // if other then those two options are set as parameter is set we go back to home
                new home();
            }
        } else {
            // if no parameter is set we go back to home
            new home();
        }
    }
}