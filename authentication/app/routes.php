<?php


/*$app -> get('/home', function($request, $response){
   
    return $this->view->render($response,'home.twig');
    
});*/



$app->get('/', 'HomeController:index')->setName('home');

$app->get('/dashboard', 'DashboardController:index')->setName('dashboard');

$app->get('/campaigns', 'CampaignsController:index')->setName('campaigns');

$app->get('/ncampaigns', 'NewCampaignsController:index')->setName('newcampaigns');

$app->get('/projects', 'ProjectsController:index')->setName('projects');
$app->post('/projects', 'ProjectsController:postProject');

$app->get('/campaignbuilder', 'CampaignBuilderController:index')->setName('campaignbuilder');

$app->get('/templates', 'TemplatesController:index')->setName('templates');

$app->get('/contact', 'ContactController:index')->setName('contact');


$app->get('/reports', 'ReportsController:index')->setName('reports');

$app->get('/createcontact', 'CreateContactController:index')->setName('createcontact');
$app->post('/createcontact', 'CreateContactController:postContact');

$app->get('/createproject', 'CreateProjectController:index')->setName('createproject');

$app->get('/apikeys', 'APIKeysController:index')->setName('apikeys');

$app->get('/billingplan', 'BillingPlanController:index')->setName('billingplan');

$app->get('/billinghistory', 'BillingHistoryController:index')->setName('billinghistory');

$app->get('/billinginfo', 'BillingInfoController:index')->setName('billinginfo');

$app->get('/contactinfo', 'ContactInfoController:index')->setName('contactinfo');

$app->get('/details', 'DetailsController:index')->setName('details');

$app->get('/manage', 'ManageController:index')->setName('manage');

$app->get('/overview', 'OverviewController:index')->setName('overview');

$app->get('/profile', 'ProfileController:index')->setName('profile');

$app->get('/registeredapps', 'RegisteredAppsController:index')->setName('registeredapps');

$app->get('/rewards', 'RewardsController:index')->setName('rewards');

$app->get('/security', 'SecurityController:index')->setName('security');

$app->get('/transactional', 'TransactionalController:index')->setName('transactional');

$app->get('/users', 'UsersController:index')->setName('users');

$app->get('/verifieddomains', 'VerifiedDomainsController:index')->setName('verifieddomains');

$app->get('/index', 'LoginController:index')->setName('index');

$app->get('/email', 'EmailBuilderController:index')->setName('email');
$app->post('/email', 'EmailBuilderController:postEmail');

$app-> get('/auth/signup', 'AuthController:getSignUp')->setName('auth.signup');
$app-> post('/auth/signup', 'AuthController:postSignUp');

$app-> get('/auth/signin', 'AuthController:getSignIn')->setName('auth.signin');
$app-> post('/auth/signin', 'AuthController:postSignIn');

$app-> get('/auth/signout', 'AuthController:getSignOut')->setName('auth.signout');


$app-> get('/auth/password/change', 'PasswordChangeController:getChangePass')->setName('auth.password.change');
$app-> post('/auth/password/change', 'PasswordChangeController:postChangePass');

/*
$app->post('/email', function() use ($app, $mailer){
    //$this->EmailController:messageSave();
    
    //grab post data
    /*$clist = $_POST['contactlist'];
    $recipients = $_POST['recipients'];
    $templates = $_POST['templates'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $body = "Contact list: " .  $clist . "<br>". "Recipients: ". $recipients . "<br>" . "Templates: " .  $templates . "<br>" . "Subject: " . $subject . "<br>" . "Message: " . $message; 

    $message = (new Swift_Message($subject))
        ->setFrom(array('jsnjocsin@gmail.com' =>  'Jason 1'))
        ->setTo(array($clist => 'Jason'))
        ->setBody($body)
        ->setContentType('text/html');
        
    $result = $mailer->send($message);*/
/*});
*/


?>