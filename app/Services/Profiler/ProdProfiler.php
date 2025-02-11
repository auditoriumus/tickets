<?php
declare(strict_types=1);

namespace App\Services\Profiler;

use SpiralPackages\Profiler\Profiler;
use SpiralPackages\Profiler\DriverFactory;
use SpiralPackages\Profiler\Storage\WebStorage;
use Symfony\Component\HttpClient\NativeHttpClient;

class ProdProfiler
{
    const string PROFILER_ENDPOINT  = 'http://deb:8000/api/profiler/store';
    const string PROFILER_APP_NAME  = 'new_arm';
    const array PROFILER_TAGS       = ['production'];
    private static Profiler $profiler;

    public static function start(): void
    {
        if (empty(self::$profiler)) {
            $storage = new WebStorage(
                new NativeHttpClient(),
                self::PROFILER_ENDPOINT,
            );

            $driver = DriverFactory::detect();

            self::$profiler = new Profiler(
                storage: $storage,
                driver: $driver,
                appName: self::PROFILER_APP_NAME,
                tags: self::PROFILER_TAGS
            );
        }

        (self::$profiler)->start(ignoredFunctions: []);
    }


    public static function end(): void
    {
        (self::$profiler)->end(tags: []);
    }


    private function __construct()
    {

    }

    private function __clone()
    {

    }
}
