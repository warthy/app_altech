<?php


namespace App\Component;


use App\KernelFoundation\Database;
use App\KernelFoundation\Request;
use App\KernelFoundation\Response;
use Exception;

abstract class Controller
{
    const DEFAULT_LAYOUT = "/layout.php";

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    protected function getRepository(string $class): Repository
    {
        try {
            return Database::getRepository($class);
        } catch (Exception $e) {
            die("unable to reach Repository $class");
        }
    }


    protected function render(string $view, array $param = [], Response $response = null, $layout = self::DEFAULT_LAYOUT): Response
    {
        // Check that file does exist otherwise throw exception
        if (!file_exists(View::PATH_TO_VIEWS . $view)) {
            throw new Exception('no template file ' . $view . ' present in directory ' . View::PATH_TO_VIEWS);
        }

        //Generate html page
        if($layout){
            // Start output buffer
            ob_start();
            extract($param);
            include View::PATH_TO_VIEWS . $view;
            $body = ob_get_contents();
            ob_end_clean();

            ob_start();
            include View::PATH_TO_VIEWS . $layout;
            $content = ob_get_contents();
            ob_end_clean();
        }else {
            ob_start();
            include View::PATH_TO_VIEWS . $view;
            $content = ob_get_contents();
            ob_end_clean();
        }


        $response = $response ?? new Response();
        $response->setContent($content);

        return $response;
    }

    protected function getRequest(): Request
    {
        return $this->request;
    }

    protected function getUser()
    {
        //TODO: Return user bla
    }
}