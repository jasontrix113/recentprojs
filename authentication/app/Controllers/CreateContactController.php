<?php 

namespace App\Controllers;

use App\Models\contactModel;
use App\Models\User;
use Slim\Views\Twig as View;

class CreateContactController extends Controller
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'Contact/createcontact.twig');
    }
    public function postContact($request, $response)
    {
        
        $contact = contactModel::create([
            'contact_Name' => $request->getParam('contact-name'),
            'contact_defEmail' => $request->getParam('de-list-email'),
            'contact_defName' => $request->getParam('de-list-name'),
            'contact_company' => $request->getParam('com/org'),
            'contact_address' => $request->getParam('address'),
            'contact_city' => $request->getParam('city'),
            'contact_zipcode' => $request->getParam('zip'),
            'contact_country' => $request->getParam('country'),
            'contact_phone' => $request->getParam('phone'),
        ]);
        return $response->withRedirect($this->router->pathFor('contact'));
    }
}