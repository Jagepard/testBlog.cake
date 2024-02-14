<?php
declare(strict_types=1);

namespace Admin\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Admin.Slug');
    }
}
