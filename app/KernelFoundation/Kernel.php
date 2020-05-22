<?php

namespace App\KernelFoundation;

use Throwable;

class Kernel
{

    private $request;
    private $router;
    private $database;

    private static $conf;

    public function handle(Request $request): Response
    {
        $this->request = $request;
        Router::GenerateRoutes();
        $this->loadConfig();
        $this->connectDatabase();

        $this->router = Router::getInstance($request, self::$conf["security"]["routes"]);

        return $this->router->dispatch();
    }

    public function handleException(Throwable $e)
    {
        die(var_dump($e->getLine()));
    }

    private function loadConfig()
    {
        $cachedConf = __DIR__ . '/../../var/cache/conf.php';
        if (file_exists($cachedConf)) {
            $data = require $cachedConf;
            if (md5_file(__DIR__ . '/../config.json') === $data["sha"]) {
                self::$conf = $data;
                return;
            }
        }
        $json = json_decode(file_get_contents(__DIR__ . '/../config.json', true), true);

        $json["sha"] = md5_file(__DIR__ . '/../config.json');
        $routes = [];
        foreach ($json["security"]["routes"] as $route => $roles) {
            $routes[str_replace('/', '\/', $route)] = $roles;
        }
        $json["security"]["routes"] = $routes;

        self::$conf = $json;
        $handle = fopen($cachedConf, 'w') or die('Cannot open file conf');
        $content = "<?php return " . var_export(self::$conf, true) . ";";

        fwrite($handle, $content);

    }

    private function connectDatabase()
    {
        
        $this->database = Database::getInstance(
            getenv("DB_HOST"),
            getenv("DB_DATABASE"),
            getenv("DB_USERNAME"),
            ''
        );
        
    }
}