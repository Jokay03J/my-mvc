<?php
class BaseController
{
    public ViewManager $view;

    function __construct()
    {
        $this->view = new ViewManager();
    }

}
?>