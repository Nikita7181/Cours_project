<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contragent $contragent
 */
?>

<?php
$this->assign('title', __('Контрагент') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список контрагентов' => ['action'=>'index'],
      'Просмотр',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($contragent->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Наименование') ?></th>
            <td><?= h($contragent->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Полное наименование') ?></th>
            <td><?= h($contragent->fullName) ?></td>
        </tr>
        <tr>
            <th><?= __('ИНН') ?></th>
            <td><?= h($contragent->inn) ?></td>
        </tr>
        <tr>
            <th><?= __('КПП') ?></th>
            <td><?= h($contragent->kpp) ?></td>
        </tr>
        <tr>
            <th><?= __('Вид контрагента') ?></th>
            <td><?= h($contragent->contragent_type->name) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">

    <div class="ml-auto">
      <?= $this->Html->link(__('Редактировать'), ['action' => 'edit',  $contragent->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Отмена'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


