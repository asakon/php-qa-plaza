<h2 class="mb-3">質問一覧</h2>
<?php if ($questions->isEmpty()): ?>
    <p>表示できる質問がありません</p>
<?php else: ?>
    <?php foreach ($questions as $q): ?>
        <div class="card mb-2">
            <div class="card-body">
                <p class="card-text">
                    <?= nl2br(h($q->body)) ?>
                    <small><?= h($q->created) ?></small>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>