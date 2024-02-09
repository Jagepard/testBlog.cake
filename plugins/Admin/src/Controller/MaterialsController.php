<?php
declare(strict_types=1);

namespace Admin\Controller;

use Admin\Controller\AppController;
use Admin\View\Helper\SlugHelper;

class MaterialsController extends AppController
{
    protected array $paginate = [
        'maxLimit' => 3
    ];

    public function index()
    {
        $query     = $this->Materials->find();
        $materials = $this->paginate($query);
        $title     = "testBlog.cake:: Admin";

        $this->set(compact('materials', 'title'));
        $this->viewBuilder()->setLayout('Admin.default');
    }

    public function add()
    {
        $title = "testBlog.cake:: Admin";

        $this->set(compact('title'));
        $this->viewBuilder()->setLayout('Admin.default');
    }

    public function create()
    {
        $material = $this->Materials->newEmptyEntity();

        $data = [
            'title' => $this->request->getData('title'),
            'text'  => $this->request->getData('text'),
            'slug'  => SlugHelper::translit($this->request->getData('text'))
        ];

        $material = $this->Materials->patchEntity($material, $data);

        if ($this->Materials->save($material)) {
            $this->Flash->success(__('The material has been saved.'));

            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('The material could not be saved. Please, try again.'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Material id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $material = $this->Materials->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $material = $this->Materials->patchEntity($material, $this->request->getData());
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('The material has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The material could not be saved. Please, try again.'));
        }
        $this->set(compact('material'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Material id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $material = $this->Materials->get($id);
        if ($this->Materials->delete($material)) {
            $this->Flash->success(__('The material has been deleted.'));
        } else {
            $this->Flash->error(__('The material could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
