<?php
class HomeController extends BaseController
{
    public function index(Request $request, Response $response)
    {
        $this->view->render("home", ["user" => ["id" => 1, "username" => "jokay03J"]]);
    }

    public function test(Request $request, Response $response)
    {
        $this->view->render("form");
    }

    public function submit(Request $request, Response $response)
    {
        $this->view->render("form", ["errors" => "sa marche !", "post" => $request->body, "files" => $request->files]);
    }
}
?>