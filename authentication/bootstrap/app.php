<?php

session_start();



require __DIR__ . '/../vendor/autoload.php';
use  Respect\Validation\Validator as v;


/*$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('jsnjocsin@gmail.com')
    ->setPassword('jpskrilljap113');

$mailer = new Swift_Mailer($transport);*/

$app = new \Slim\App([
    
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql', 
            'host' => 'localhost', 
            'database' => 'reactmechanics',
            'username' => 'root', 
            'password' => '', 
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ] 
    ],     
]);

$container  = $app->getContainer();



$app-> get('/foo', function($req, $res, $args){
    $this->flash->addMessage('Test','This is a message'); 
    
    return $res->withStatus(302)->withHeader('Location', '/bar');
});

$app-> get('/bar', function ($req, $res, $args){
    $messages = $this->flash->getMessages();
    print_r($messages);
});


$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule-> addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule)
    {
        return $capsule;
    };

$container['auth'] = function ($container){
    return new \App\Auth\Auth;
};  

$container['flash']= function ($container){
    return new \Slim\Flash\Messages;
};

require __DIR__ .'/../app/routes.php';

$container['view'] = function ($container){
    
    $view = new \Slim\Views\Twig(__DIR__.'/../resources/views', [
        
        'cache' => false, 
        
    ]);
    $view -> addExtension(new \Slim\Views\TwigExtension(
                             
            $container-> router,
            $container->request-> getUri()
                          
    ));
    
    $view ->getEnvironment()->addGlobal('auth', [
        'check' => $container->auth->check(),
        'user' => $container->auth->user(),
        
    ]);
    
    $view ->getEnvironment()->addGlobal('flash', $container->flash);
    
    return $view;
};

/*// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.example.org', 25))
  ->setUsername('your username')
  ->setPassword('your password')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['john@doe.com' => 'John Doe'])
  ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
  ->setBody('Here is the message itself')
  ;

// Send the message
$result = $mailer->send($message);*/

$container['validator'] = function ($container){
    return new \App\Validation\Validator; 
};

$container['HomeController'] = function ($container){
    return new \App\Controllers\HomeController($container);   
};

$container['DashboardController'] = function ($container){
    return new \App\Controllers\DashboardController($container);
};

$container['CampaignsController'] = function ($container){
    return new \App\Controllers\CampaignsController($container);
};

$container['NewCampaignsController'] = function ($container){
    return new \App\Controllers\NewCampaignsController($container);
};
$container['ProjectsController'] = function ($container){
    return new \App\Controllers\ProjectsController($container);
};

$container['CreateProjectController'] = function ($container){
    return new \App\Controllers\CreateProjectController($container);
};

$container['CampaignBuilderController'] = function ($container){
    return new \App\Controllers\CampaignBuilderController($container);
};

$container['TemplatesController'] = function ($container){
    return new \App\Controllers\TemplatesController($container);
};

$container['ContactController'] = function ($container){
    return new \App\Controllers\ContactController($container);
};

$container['CreateContactController'] = function ($container){
    return new \App\Controllers\CreateContactController($container);
};

$container['ReportsController'] = function ($container){
    return new \App\Controllers\ReportsController($container);
};

$container['AuthController'] = function ($container){
    return new \App\Controllers\Auth\AuthController($container);
};

$container['PasswordChangeController'] = function ($container){
    return new \App\Controllers\Auth\PasswordChangeController($container);
};

$container['APIKeysController'] = function ($container){
    return new \App\Controllers\APIKeysController($container);
};

$container['BillingPlanController'] = function ($container){
    return new \App\Controllers\BillingPlanController($container);
};

$container['BillingHistoryController'] = function ($container){
    return new \App\Controllers\BillingHistoryController($container);
};

$container['BillingInfoController'] = function ($container){
    return new \App\Controllers\BillingInfoController($container);
};

$container['ContactInfoController'] = function ($container){
    return new \App\Controllers\ContactInfoController($container);
};

$container['DetailsController'] = function ($container){
    return new \App\Controllers\DetailsController($container);
};

$container['ManageController'] = function ($container){
    return new \App\Controllers\ManageController($container);
};

$container['OverviewController'] = function ($container){
    return new \App\Controllers\OverviewController($container);
};

$container['RegisteredAppsController'] = function ($container){
    return new \App\Controllers\RegisteredAppsController($container);
};

$container['RewardsController'] = function ($container){
    return new \App\Controllers\RewardsController($container);
};

$container['SecurityController'] = function ($container){
    return new \App\Controllers\SecurityController($container);
};

$container['TransactionalController'] = function ($container){
    return new \App\Controllers\TransactionalController($container);
};

$container['UsersController'] = function ($container){
    return new \App\Controllers\UsersController($container);
};

$container['ProfileController'] = function ($container){
    return new \App\Controllers\ProfileController($container);
};

$container['VerifiedDomainsController'] = function ($container){
    return new \App\Controllers\VerifiedDomainsController($container);
};

$container['EmailBuilderController'] = function ($container){
    return new \App\Controllers\EmailBuilderController($container);
};

$container['LoginController'] = function ($container){
    return new \App\Controllers\LoginController($container);
};

/*$container['csrf'] = function($container){
    return new Slim\Csrf\Guard;
};*/

$app->add(new \App\Middleware\ValidationErrorsMiddleware($container));

$app->add(new \App\Middleware\OldInputMiddleware($container));

/*$app->add(new \App\Middleware\CsrfViewMiddleware($container));


$app->add($container->csrf);*/
    
v::with('App\\Validation\\Rules\\');

