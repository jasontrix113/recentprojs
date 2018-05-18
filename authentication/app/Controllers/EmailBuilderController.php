<?php 

namespace App\Controllers;
use App\Models\emailModel;
use App\Models\User;
use Slim\Views\Twig as View;

class EmailBuilderController extends Controller
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'email.twig');
    }
     public function postEmail($request, $response,$app, $mailer)
     {
        $clist = $_POST['contactlist'];
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

         $result = $mailer->send($message);
         

            $email = emailModel::create([
                'eContactlist' => $request->getParam('contactlist'),
                'recipients' => $request->getParam('recipients'),
                'templates' => $request->getParam('templates'),
                'subject' => $request->getParam('subject'),
                'message' => $request->getParam('message'),
            ]);
            return $response->withRedirect($this->router->pathFor('campaigns'));
    }
    
}
