<?php
declare(strict_types=1);

namespace Blog\Controller;

use App\View\Helper\SlugHelper;
use Blog\Controller\AppController;

class MaterialsController extends AppController
{
    protected array $paginate = [
        'maxLimit' => 10
    ];

    public function index()
    {
        $query     = $this->Materials->find();
        $materials = $this->paginate($query);
        $title     = 'testBlog.cake';

        $this->set(compact('materials', 'title'));
        $this->viewBuilder()->setLayout('Blog.default');
    }

    public function item($slug = null)
    {
        $id       = SlugHelper::getIdFromSlug($slug);
        $material = $this->Materials->get($id, contain: []);
        $title    = 'testBlog.cake:: ' . $material['title'];

        $this->set(compact('material', 'title'));
        $this->viewBuilder()->setLayout('Blog.default');
    }
}
