<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Rosem application instance
| which serves as the "glue" for all the components of Rosem, and is
| the IoC container for the system binding all of the various parts.
|
*/
//function test($name) {
//    return "Hello, $name";
//}
//
//class App extends Rosem\Container\Container
//{
//    public function __construct()
//    {
//        $this->set('.env', $this->class(Dotenv\Dotenv::class, [__DIR__]));
//        $this->set('test', $this->function(function ($name) {
//            return "Bie, $name";
//        }, ['Rosem']));
//    }
//}
//
//$app = new App();
//echo '<pre>';
//var_dump($app->get('test'));
//echo '</pre>';
//die;

try {
    $app = \Rosem\Container\ServiceContainer::fromFile(
        __DIR__ . '/config/service-providers.php'
    );
    $app->delegate(
        \Rosem\Container\ConfigurationContainer::fromFile(
            __DIR__ . '/config/app.php'
        )
    );
    $app->get(\Rosem\Psr\Environment\EnvironmentInterface::class)->load();
    $app->get(\Rosem\Psr\Http\Server\MiddlewareRunnerInterface::class)->run();
} catch (Exception $exception) {
    echo $exception->getMessage();
    var_dump($app);
}

//try {
//    $app = Rosem\App\AppFactory::create();
//    $app->loadServiceProviders(__DIR__ . '/config/service_providers.php');
//    $app->loadMiddlewares(__DIR__ . '/config/middlewares.php');
//    $app->boot(__DIR__ . '/config/app.php');

//$atlas = $container->get(\Atlas\Orm\Atlas::class);
//var_dump($atlas->select(\Rosem\DataSource\User\UserMapper::class)->fetchRecordSet()->getArrayCopy());

//    $entityManager = $app->get(\Doctrine\ORM\EntityManager::class);
//    $newUser = new \Rosem\Access\Entity\User;
//    $newUser->setEmail('roshe@smile.fr');
//    $entityManager->persist($newUser);
//    $entityManager->flush();
//} catch (\Exception $e) {
//    echo $e->getMessage();
//}
//$g = $app->get(\Psrnext\GraphQL\GraphInterface::class);
