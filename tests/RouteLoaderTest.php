<?php


use App\Lib\Helpers\RouteLoader;

class RouteLoaderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @group Helpers
     * @group RouteLoader
     */
    public function testMatchAllRouteFilesInRouteFolder()
    {
        $routeFileName = 'routes.php';
        $expectedPaths = [
            'routes/ping/',
            'routes/users/',
        ];

        $routes = RouteLoader::load();
        foreach ($expectedPaths as $expectedRoute) {
            $this->assertContains(
                $expectedRoute . $routeFileName,
                $routes
            );
        }
    }
}
