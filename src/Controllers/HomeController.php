<?php
class HomeController extends BaseController
{
    public function index()
    {
        $this->view->render("home");
    }

    public function test()
    {
        return new Response("test", ["status" => 500]);
    }
}
?>