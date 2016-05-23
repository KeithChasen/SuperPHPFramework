<?php
namespace Framework;

class View
{

    public function render($view, $layout = 'layout.phtml')
    {
        ob_start();
        require_once(ROOT . 'application/views/' . $view);
        $content = ob_get_contents();
        ob_end_clean();

        ob_start();
        $allView = ROOT . 'application/views/' . $layout;
        if (file_exists($allView)) {
            require $allView;
        } else {
            throw new \Exception($layout . " file is not exist!");
        }
        $page = ob_get_contents();
        ob_end_clean();
        return $page;
    }
}