<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class AnswersTable extends Table {
    public function initialize(array $config) {

        parent::initialize($config);

        $this->setDisplayField('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Questions', [
            'foreignKey' => 'question_id',
            'joinType' => 'INNER'
        ]);
    }
}