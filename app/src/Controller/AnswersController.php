<?php

namespace App\Controller;

use Cake\Event\Event;

class AnswersController extends AppController {
    const ANSWER_UPPER_LIMIT = 100;

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->request->allowMethod(['post']);
    }


    public function add() {
        $answer = $this->Answers->newEntity($this->request->getData());
        $count = $this->Answers
            ->find()
            ->where(['question_id' => $answer->question_id])
            ->count();

        if ($count >= self::ANSWER_UPPER_LIMIT) {
            $this->Flash->error('回答の上限数に達しました');

            return $this->redirect(['controller' => 'Questions', 'action' => 'view', $answer->question_id]);
        }

        $answer->user_id = 1; // @TODO ユーザー管理機能実装時に修正する
        if ($this->Answers->save($answer)) {
            $this->Flash->success('回答を投稿しました');
        } else {
            $this->Flash->error('回答の投稿に失敗しました');
        }

        return $this->redirect(['controller' => 'Questions', 'action' => 'view', $answer->question_id]);
    }

    public function delete(int $id) {
        $answer = $this->Answers->get($id);
        $questionId = $answer->question_id;
        // @TODO 回答を削除できるのは回答投稿者のみとする

        if($this->Answers->delete($answer)) {
            $this->Flash->success('回答を削除しました');
        } else {
            $this->Flash->error('回答の削除に失敗しました');
        }

        return $this->redirect(['controller' => 'Questions', 'action' => 'view', $questionId]);
    }
}