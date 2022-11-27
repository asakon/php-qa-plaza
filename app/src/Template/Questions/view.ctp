<h2 class="mp-3"><i class="fas fa-flag"></i> 質問</h2>

<section class="question">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">
                <i class="fas fa-user-circle"></i> <?= 'たろう' // @TODO 追加実装する ?>
            </h5>
            <p class="catd-text"><?= nl2br(h($question->body)) ?></p>
        </div>
    </div>
</section>

<section class="answer mb-4">
    <?php if ($answers->isEmpty()): ?>
        <h5 class="card-title text-answer">回答はまだありません</h5>
    <?php else: ?>
        <?php foreach ($answers as $a): ?>
            <div class="card w-75 mb-2 ml-auto">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fa fa-user-circle"></i> <?= 'じろう' // @TODO あとで実装 ?>
                    </h5>
                    <p class="card-text"><?= nl2br(h($a->body)) ?></p>
                    <p class="card-subtitle mb-2 text-muted">
                        <small><?= h($a->created) ?></small>
                        <?= $this->Form->postLink('削除する', ['controller' => 'Answers', 'action' => 'delete', $a->id],
                        ['confirm' => '回答を削除します。よろしいですか？', 'class' => 'card-link']) ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>

<section class="answer-post mb-5">
    <h2 class="mb-3"><i class="fas fa-comment-dots"></i> 回答する</h2>
    <?php if ($answers->count() >= 100): ?>
        <p class="text-center">回答数が上限に達しているためこれ以上回答することはできません</p>
    <?php else: ?>
        <?= $this->Form->create($newAnswer, ['url' => '/answers/add']) ?>
        <?php
        echo $this->Form->control('body', [
            'type' => 'textarea',
            'label' => false,
            'value' => '',
            'maxLength' => 200
        ]);
        echo $this->Form->hidden('question_id', ['value' => $question->id]);
        ?>
        <?= $this->Form->button('投稿する', ['class' => 'btn btn-warning']) ?>
        <?= $this->Form->end() ?>
    <?php endif; ?>
</section>