<?php

return [
    'name' => 'Tabdeal Task',
    'description' => 'task for tabdeal.',
    'version' => '1.0.0',
    'author' => 'Roohan',
    'routes' => [
        'main' => [
            'tabdealtask_admin' => [
                'path' => '/tabdealtask',
                'controller' => 'MauticPlugin\TabdealTaskBundle\Controller\AdminController::indexAction'
            ],
        ],
    ],
    'menu' => [
        'main' => [
            'tabdealtask' => [
                'route' => 'tabdealtask_admin',
                'iconClass' => 'ri-barricade-fill flip-vertically',
                'access' => ['tabdealtask:tasks:view'],
            ],
        ],
    ],
    'permissions' => [
        'tabdealtask:tasks' => [
            'label' => 'tabdealtask.plugin.menu',
            'form' => [
                'view'   => 'mautic.core.permission.view',
                'create' => 'mautic.core.permission.create',
            ],
        ],
    ],
    'services' => [],
    'forms' => [
        'tabdealtask.task' => [
            'class' => \MauticPlugin\TabdealTaskBundle\Form\TaskType::class,
        ],
    ],
];
