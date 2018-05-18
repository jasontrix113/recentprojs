<?php



namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;
use \App\Auth\Auth;

class AuthController extends Controller

{   
    public function getSignOut($request, $response)
    {
        $this->auth->logout();
        return $response->withRedirect($this->router->pathFor('auth.signin'));               
    }
    public function getSignIn($request, $response)
    {
        return $this->view->render($response, 'auth/signin.twig'); 
    }
    public function postSignIn($request, $response)
    {
        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );
        if(!$auth){
            $this->flash->addMessage('error', 'Login failed!');
            return $response->withRedirect($this->router->pathFor('auth.signin'));   
        }
            return $response->withRedirect($this->router->pathFor('dashboard'));               
    }
    public function getSignUp($request, $response)
    {
        
        return $this->view->render($response, 'auth/signup.twig');
    }
    
    public function postSignUp($request, $response)
    {
        
        $validation = $this->validator->validate($request,[
            
            'firstname' => v::notEmpty()->alpha(),
            'lastname' => v::notEmpty()->alpha(),
            'email' => v::noWhitespace()->notEmpty()->email()->EmailAvailable(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);
        
        if($validation->failed()){
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $user = User::create([
            
            'firstname' => $request->getParam('firstname'),
            'lastname' => $request->getParam('lastname'),
            'email' => $request->getParam('email'),
            /*'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),*/
            'password' => md5($request->getParam('password')),
            
        ]);
       
        $this->flash->addMessage('success', 'Account Created Succesfully');
        return $response->withRedirect($this->router->pathFor('home'));
    }
}
