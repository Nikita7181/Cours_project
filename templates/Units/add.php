<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>

<?php $this->assign('title', __('Добавление единицы измерения') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список единиц измерения' => ['action'=>'index'],
      'Создать',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($unit) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name', ['label' => 'Наименование']);
      echo $this->Form->control('symbol', ['label' => 'Символьное обозначение']);
      echo $this->Form->control('code', ['label' => 'Код']);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Сохранить')) ?>
      <?= $this->Html->link(__('Отмена'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
