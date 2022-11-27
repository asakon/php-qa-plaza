<?php

namespace App\Controller;

class QuestionsController extends AppController {
    public function intialize() {
        parent::initialize();
    }

    public function index() {
        $questions = $this->Questions->find();

        $this->set(compact('questions'));
    }

    public function add() {
        $question = $this->Questions->newEntity();

        if($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            $question->user_id = 1;

            if($this->Questions->save($question)) {
                $this->Flash->success('質問を投稿しました');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('質問の投稿に失敗しました');
        }

        $this->set(compact('question'));
    }

    public function view(int $id) {
        $question = $this->Questions->get($id);

        $this->loadModel('Answers');
        
        $answers = $this->Answers->find()
            ->where([ 'Answers.question_id' => $id])
            ->orderAsc('Answers.id')
            ->all();
        
        $newAnswer = $this->Answers->newEntity();

        $this->set(compact('question', 'answers', 'newAnswer'));
    }

    public function delete(int $id) {
        $this->request->allowMethod(['post']);

        $question = $this->Questions->get($id);
        // @TODO 質問を削除できるのは質問投稿者のみとする

        if($this->Questions->delete($question)) {
            $this->Flash->success('質問を削除しました');
        } else {
            $this->Flash->error('質問の削除に失敗しました');
        }

        return $this->redirect(['action' => 'index']);
    }
}