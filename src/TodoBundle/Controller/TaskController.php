<?php

namespace TodoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use TodoBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;
use TodoBundle\Entity\Task;
use TodoBundle\Entity\Status;
use Doctrine\Common\Persistence\ObjectManager;

class TaskController extends Controller
{


    public function indexAction(Request $request)
    {
        if($request->get('task') != null){
            $task = $request->get('task');
            $em = $this->getDoctrine()->getManager();
            $taskRemove = $em->getRepository('TodoBundle:Task')->find($task);

            $em->remove($taskRemove);
            $em->flush();
        }
        $tasks = $this->getDoctrine()
            ->getRepository('TodoBundle:Task')
            ->findAll();
        return $this->render('TodoBundle:Task:index.html.twig', ['tasks' => $tasks]);
    }

    public function newAction(Request $request)
    {
        $task = new Task();
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(new TaskType(), $task,
            ['action' => $this->generateUrl('new')]);
        $form->handleRequest($request);

        if ($form->isSubmitted() ) {

            $task = $form->getData();

            $status = $this->getDoctrine()
                ->getRepository('TodoBundle:Status')
                ->find(1);

            $task->setStatus($status);

            $em->persist($task);
            $em->flush();

            $tasks = $this->getDoctrine()
                ->getRepository('TodoBundle:Task')
                ->findAll();

            return $this->render('TodoBundle:Task:index.html.twig', ['tasks' => $tasks]);
        }
        return $this->render('TodoBundle:Task:new.html.twig', array('form' => $form->createView()
        ));
    }

    public function updateAction(Request $request, $task = null)
    {
        $em = $this->getDoctrine()->getManager();
        $taskAux = null;
        if($task){
            $taskAux = $this->getDoctrine()
                    ->getRepository('TodoBundle:Task')
                ->find($task) ;
        }


        $form = $this->createForm(new TaskType(), $taskAux ,
            ['action' => $this->generateUrl('update')]);
            $form->handleRequest($request);
            if ($form->isSubmitted()) {
                dump($taskAux);exit;

                $task = $form->getData();
                $em->persist($task);
                $em->flush();

                $tasks = $this->getDoctrine()
                    ->getRepository('TodoBundle:Task')
                    ->findAll();
                return $this->render('TodoBundle:Task:index.html.twig', ['tasks' => $tasks]);
            }

        return $this->render('TodoBundle:Task:update.html.twig', array("form" =>  $form->createView()
        ));
    }



}
