<?php

namespace App\KernelFoundation;

class Kernel
{

    private $request;
    private $router;
    private $database;

    private static $conf;

    public function __construct()
    {

    }

    public function handle(Request $request): Response
    {
        $this->request = $request;
        Router::GenerateRoutes();
        $this->loadConfig();
        $this->connectDatabase();

        $this->router = Router::getInstance($request);

        return $this->router->dispatch();
    }

    private function loadConfig()
    {
        if (file_exists('../../var/cache/KernelConf.php')) {
            self::$conf = require '../../var/cache/KernelConf.php';
        } else {
            self::$conf = json_decode(file_get_contents(__DIR__ . '/../config.json', true), true);

            $handle = fopen('../var/cache/KernelConf.php', 'w') or die('Cannot open file routesGenerated');
            $content = "<?php return " . var_export(self::$conf, true) . ";";

            fwrite($handle, $content);
        }
    }

    private function connectDatabase()
    {
        $credentials = self::$conf["database"];
        $this->database = Database::getInstance(...array_values($credentials));
    }
}