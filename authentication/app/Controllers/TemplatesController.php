<?php 

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;

class TemplatesController extends Controller
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'templates.twig');
    }
}