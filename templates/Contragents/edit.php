<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contragent $contragent
 */
?>

<?php $this->assign('title', __('Редактирование контрагента') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список контрагентов' => ['action'=>'index'],
      'Просмотр' => ['action'=>'view', $contragent->id],
      'Редактирование',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($contragent) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name', ['label' => 'Наименование']);
      echo $this->Form->control('fullName', ['label' => 'Полное наименование']);
      echo $this->Form->control('inn', ['label' => 'ИНН']);
      echo $this->Form->control('kpp', ['label' => 'КПП']);
      echo $this->Form->control('contragent_type_id', ['required' => false, 'label' => 'Вид контрагента',]);
    ?>
  </div>

  <div class="card-footer d-flex">
  
    <div class="ml-auto">
      <?= $this->Form->button(__('Сохранить')) ?>
      <?= $this->Html->link(__('Отменить'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
