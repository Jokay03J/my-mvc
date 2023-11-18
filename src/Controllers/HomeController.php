<?php
class HomeController extends BaseController
{
    public function index(Request $request, Response $response)
    {
        $this->view->render("home", ["user" => ["id" => 1, "username" => "jokay03J"]]);
    }

    public function form(Request $request, Response $response)
    {
        $this->view->render("form");
    }

    public function submit(Request $request, Response $response)
    {
        $this->view->render("form", ["message" => "It work ! you can use files, query, and body on \$request for acces to it."]);
    }
}
?>