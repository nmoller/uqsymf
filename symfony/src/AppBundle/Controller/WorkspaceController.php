<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/dashboard/workspace")
 */
class WorkspaceController extends Controller
{
    /**
     * @Route("/{name}", name="workspace_show")
     */
    public function showAction($name)
    {
        //....
    }
}