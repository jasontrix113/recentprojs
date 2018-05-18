<?php 

namespace App\Controllers;

use App\Models\projectModel;
use Slim\Views\Twig as View;
use App\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index($request, $response)
    {
        return $this->view->render($response, 'projects.twig');
    }
    public function postProject($request, $response)
    {
        
        $projectsModel = projectModel::create([
            'pName' => $request->getParam('project_name'),
            'pContactlist' => $request->getParam('proj_contactlist'),
            'pContactName' => $request->getParam('proj_contactName'),
            'pContactEmail' => $request->getParam('proj_contactEmail'),
            'pMCName' => $request->getParam('proj_mcontactName'),
            'pMCEmail' => $request->getParam('proj_mcontactEmail'),
            'pMCPhone' => $request->getParam('proj_mcontactPhone'),
            'pMCCompany' => $request->getParam('proj_mcontactCompany')
        ]);
        return $response->withRedirect($this->router->pathFor('createproject'));
    }
}
