<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Hutbe $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\HutbePage[] $pages */

?>

<style>
    textarea {
        width: 100%;
    }
    #pages-wrapper .row:first-child .close {
        visibility: hidden;
    }
</style>

<?php

$this->registerJs(<<<'EOD'
    $('#add-new-page').click(function (e) {
        e.preventDefault();
        var pagesWrapper = $('#pages-wrapper');
        var copy = pagesWrapper.find('.row:last-child').clone();
        
        var key = pagesWrapper.children().length +1;
        copy.find('.de').attr('name', 'Pages[' + key + '][de]');
        copy.find('.tr').attr('name', 'Pages[' + key + '][tr]');
        copy.find('.ar').attr('name', 'Pages[' + key + '][ar]');
        copy.find('textarea').val('');  
        
        copy.appendTo(pagesWrapper);
    }) 
    
    $('#pages-wrapper').on('click', '.close.btn', function() {
        $(this).closest('.row').remove();
    })
EOD,
    \yii\web\View::POS_READY,
    'my-button-handler'
);
?>
<script>

</script>

<div class="hutbe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tarih')->textInput() ?>

    <?= $form->field($model, 'hafta')->textInput() ?>

    <br>

    <div class="row">
        <div class="col text-center">
            DE
        </div>
        <div class="col text-center">
            TR
        </div>
        <div class="col text-center">
            AR
        </div>
        <div class="col-1"></div>
    </div>

    <div id="pages-wrapper">
        <?php foreach ($pages as $key => $page): ?>
            <div class="row">
                <div class="col">
                    <?= Html::textarea("Pages[$key][de]", $page->de, ['rows' => 10, 'class' => 'de']) ?>
                </div>
                <div class="col">
                    <?= Html::textarea("Pages[$key][tr]", $page->tr, ['rows' => 10, 'class' => 'tr']) ?>
                </div>
                <div class="col" dir="ltr">
                    <?= Html::textarea("Pages[$key][ar]", $page->ar, ['rows' => 10, 'class' => 'ar', 'dir' => 'rtl']) ?>
                </div>
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <span class="close btn btn-danger" >&times;</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="row d-flex justify-content-end">
        <span class="btn btn-primary" id="add-new-page">Neue Seite hinzufügen</span>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
