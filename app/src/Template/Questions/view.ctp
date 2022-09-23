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
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</section>