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
}