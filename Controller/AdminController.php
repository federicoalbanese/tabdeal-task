<?php

namespace MauticPlugin\TabdealTaskBundle\Controller;

use Mautic\CoreBundle\Controller\CommonController;
use Symfony\Component\HttpFoundation\Request;
use MauticPlugin\TabdealTaskBundle\Entity\Task;
use MauticPlugin\TabdealTaskBundle\Form\TaskType;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends CommonController
{
    public function indexAction(Request $request): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->doctrine->getManager();
            $em->persist($task);
            $em->flush();
            $this->addFlash('notice', 'Your task has been saved successfully.');
        }

        return $this->delegateView(
            [
                'viewParameters'  => ['form' => $form->createView()],
                'contentTemplate' => '@TabdealTask/Admin/index.html.twig',
                'passthroughVars' => ['activeLink' => 'tabdealtask.admin'],
            ]
        );
    }

}