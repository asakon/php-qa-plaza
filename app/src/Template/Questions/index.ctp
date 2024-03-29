<h2 class="mb-3">質問一覧</h2>
<?php if ($questions->isEmpty()): ?>
    <p>表示できる質問がありません</p>
<?php else: ?>
    <?php foreach ($questions as $q): ?>
        <div class="card mb-2">
            <div class="card-body">
                <p class="card-text">
                    <?= nl2br(h($q->body)) ?>
                </p>
                <p class="card-subtitle mb-2 text-muted">
                    <small><?= h($q->created) ?></small>
                    <small><i class="fas fa-comment-dots"></i> <?= $this->Number->format($q->answered_count) ?></small>
                </p>
                <?= $this->Html->link('詳細へ', ['action' => 'view', $q->id], ['class' => 'card-link']) ?>
                <?= $this->Form->postLink('削除する', ['action' => 'delete', $q->id],
                ['confirm' => '質問を削除します。よろしいですか？'],
                ['class' => 'card-link']) ?>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>