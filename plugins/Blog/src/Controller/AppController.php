<?php
declare(strict_types=1);

namespace Blog\Controller;

use App\Controller\AppController as BaseController;

class AppController extends BaseController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Blog.Slug');
        $this->Authentication->allowUnauthenticated(['item', 'index']);
    }
}
