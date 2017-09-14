<?php

/**
 * Created by PhpStorm.
 * User: timodz
 * Date: 8/29/17
 * Time: 6:26 PM
 * Description: home controller
 */
class home extends controller
{
    public function __construct()
    {
        // load view
        parent::LoadView("main", $Data = []);
    }
}