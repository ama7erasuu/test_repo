<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Поиск';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

<div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['action' => 'search', 'id' => 'test-form']); ?>
        <div class="search_box pull-right">
                  <?= $form->field($model, 'name')->textInput()->label('Название проекта') ?>
                  <div class="form-group">
                    <?= Html::submitButton('Искать', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
                </div>
              </div>             


            <?php ActiveForm::end(); ?>
        </div>
    <div class="body-content">

</div>
