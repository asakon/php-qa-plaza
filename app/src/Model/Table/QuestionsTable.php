<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class QuestionsTable extends Table {
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setDisplayField('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Answers', [
            'foreignKey' => 'question_id'
        ]);
    }
}