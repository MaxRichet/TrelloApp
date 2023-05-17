<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cards Controller
 *
 * @method \App\Model\Entity\Card[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CardsController extends AppController
{
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $card = $this->Cards->newEmptyEntity();
        if ($this->request->is('post')) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            $card->creator = $this->request->getAttribute('identity')->id;
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

            }else
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Boards', 'action' => 'view', $this->request->getData('board_id')]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $card = $this->Cards->get($id, [
            'contain' => ['Categories'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $card = $this->Cards->patchEntity($card, $this->request->getData());
            if ($this->Cards->save($card)) {
                $this->Flash->success(__('The card has been saved.'));

                return $this->redirect(['controller' => 'Boards', 'action' => 'view', $card->category->board_id]);
            }
            $this->Flash->error(__('The card could not be saved. Please, try again.'));
        }
        $this->set(compact('card'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Card id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $card = $this->Cards->get($id, ['contain' => ['Categories']]);
        if ($this->Cards->delete($card)) {
            $this->Flash->success(__('The card has been deleted.'));
        } else {
            $this->Flash->error(__('The card could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'Boards', 'action' => 'view', $card->category->board_id]);
    }
}
