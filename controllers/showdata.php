<?php

/**
 * Created by PhpStorm.
 * User: timodz
 * Date: 8/29/17
 * Time: 11:19 PM
 * Description: showdata controller
 */
class showdata extends controller
{
    public function __construct()
    {
        $this->getData();
    }

    // get and load Data
    public function getData()
    {
        // load view
        parent::LoadView("data", parent::GetData());
    }
}