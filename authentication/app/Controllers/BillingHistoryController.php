<?php 

namespace App\Controllers;

use App\Models\User;
use Slim\Views\Twig as View;

class BillingHistoryController extends Controller
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'TabContents/billinghistory.twig');
    }
}