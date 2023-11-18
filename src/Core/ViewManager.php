<?php
class ViewManager
{
    public $viewPath = "/src/Views/";
    public function render(string $view, array $data = array())
    {
        if (file_exists(ROOT . $this->viewPath . $view . ".php") || file_exists(ROOT . $this->viewPath . $view . ".html")) {
            extract($data);
            // Create a manager for handle ressources
            $ressources = new RessourceManager();
            ob_start();
            include(ROOT . $this->viewPath . $view . ".php");
            $content = ob_get_clean();
            include(ROOT . $this->viewPath . "layout.php");
        } else {
            throw new Exception("View doesn't found");
        }

    }
}
?>