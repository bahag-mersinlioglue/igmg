<?php

/** @var yii\web\View $this */
/** @var \app\models\HutbePage $page */
/** @var array $languages */

$this->title = 'Hutbe';

?>
<div class="hutbe-wrapper" data-page-id="<?= $page->id ?>">

    <?php foreach ($languages as $lang): ?>

        <div class="<?= $lang ?>">
            <?= $page->{$lang} ?>
        </div>

    <?php endforeach; ?>

</div>
