<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Результат поиска</h1>
<ul>
<?php foreach ($models as $project): ?>
    <div class="card" style="width: 45rem;">
  <div class="card-body">
    <h5 class="card-title">Название проекта : <?= Html::encode("{$project->name}") ?></h5>
    <h6 class="card-subtitle mb-2 ">Автор : <?= Html::encode("{$project->author}") ?></h6>
    <h7 class="card-subtitle mb-2 ">Количество просмотров : <?= Html::encode("{$project->watchers}") ?></h7>
    <p class="card-text">Количество Звезд : <?= Html::encode("{$project->stargazers}") ?></p>
    <a href="<?= Html::encode("{$project->link}") ?>" class="card-link">Ссылка на github</a>
    
  </div>
</div>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

