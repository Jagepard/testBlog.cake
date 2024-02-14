<?php
declare(strict_types=1);

namespace Admin\Controller;

use Admin\Controller\AppController;

class MaterialsController extends AppController
{
    protected array $paginate = [
        'maxLimit' => 10,
        'order' => [
            'Materials.id' => 'desc'
        ]
    ];

    public function index()
    {
        $parameters = $this->request->getAttribute('authenticationResult');
        $userName   = ($parameters->isValid()) ? $parameters->getData()->email : '';
        $query      = $this->Materials->find();
        $materials  = $this->paginate($query);
        $title      = "testBlog.cake:: Admin";

        $this->set(compact('materials', 'title', 'userName'));
        $this->viewBuilder()->setLayout('Admin.default');
    }

    public function add()
    {
        $title      = "testBlog.cake:: Admin - add material";
        $parameters = $this->request->getAttribute('authenticationResult');
        $userName   = ($parameters->isValid()) ? $parameters->getData()->email : '';

        $this->set(compact('title', 'userName'));
        $this->viewBuilder()->setLayout('Admin.default');
    }

    public function create()
    {
        $material = $this->Materials->newEmptyEntity();
        $img      = $this->request->getData('file');
        $imgName  = $img->getClientFilename();

        $data = [
            'title' => $this->request->getData('title'),
            'text'  => $this->request->getData('text'),
            'slug'  => $this->Slug->translit($this->request->getData('title'))
        ];

        if(!empty($imgName)) {
            $imgName       = time() . '_' . $imgName;
            $data['image'] = $imgName;

            $this->Image->create($img, $imgName);
        }

        $material = $this->Materials->patchEntity($material, $data);

        if ($this->Materials->save($material)) {
            $this->Flash->success(__('The material has been saved.'));
        } else {
            $this->Flash->error(__('The material could not be saved. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function edit($id = null)
    {
        $material   = $this->Materials->get($id, contain: []);
        $title      = "testBlog.cake:: Admin - update {$material->title}";
        $parameters = $this->request->getAttribute('authenticationResult');
        $userName   = ($parameters->isValid()) ? $parameters->getData()->email : '';

        $this->set(compact('title', 'material', 'userName'));
        $this->viewBuilder()->setLayout('Admin.default');
    }

    public function update($id = null)
    {
        if ($this->request->is(['patch', 'post', 'put'])) {

            $material = $this->Materials->get($id, contain: []);
            $oldImage = $this->request->getData('image');
            $img      = $this->request->getData('file');
            $imgName  = $img->getClientFilename();

            $data = [
                'title' => $this->request->getData('title'),
                'text'  => $this->request->getData('text'),
                'slug'  => $this->Slug->translit($this->request->getData('title'))
            ];

            if(!empty($img->getClientFilename())) {
                if (!empty($oldImage)) {
                    $this->Image->delete($oldImage);
                }

                $imgName       = time() . '_' . $img->getClientFilename();
                $data['image'] = $imgName;
    
                $this->Image->create($img, $imgName);
            } else {
                $data['image'] = $oldImage;
            }

            $material = $this->Materials->patchEntity($material, $data);

            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));
            } else {
                $this->Flash->error(__('The material could not be saved. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['get', 'delete']);
        $material = $this->Materials->get($id);

        if(!empty($material['image'])) $this->Image->delete($material['image']);
        if ($this->Materials->delete($material)) {
            $this->Flash->success(__('The material has been deleted.'));
        } else {
            $this->Flash->error(__('The material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function delimg()
    {
        $material = $this->Materials->get($this->request->getQuery('id'));

        $this->Image->delete($material['image']);
        $this->Materials->patchEntity($material, ['image' => '']);
        $this->Materials->save($material);

        return $this->redirect(['action' => 'index']);
    }
}
