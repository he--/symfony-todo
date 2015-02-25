<?php

namespace TodoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
    public function indexAction()
    {
        return $this->render('TodoBundle:Task:index.html.twig', array(// ...
        ));
    }

    public function newAction()
    {
        return $this->render('TodoBundle:Task:new.html.twig', array(// ...
        ));
    }

    public function updateAction()
    {
        return $this->render('TodoBundle:Task:update.html.twig', array(// ...
        ));
    }

}
