<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nomenclature $nomenclature
 */
?>

<?php
$this->assign('title', __('Nomenclature') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Nomenclatures' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($nomenclature->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($nomenclature->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Full Name') ?></th>
            <td><?= h($nomenclature->full_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Nomenclature Type') ?></th>
            <td><?= $nomenclature->has('nomenclature_type') ? $this->Html->link($nomenclature->nomenclature_type->name, ['controller' => 'NomenclatureTypes', 'action' => 'view', $nomenclature->nomenclature_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Unit') ?></th>
            <td><?= $nomenclature->has('unit') ? $this->Html->link($nomenclature->unit->name, ['controller' => 'Units', 'action' => 'view', $nomenclature->unit->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($nomenclature->id) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $nomenclature->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $nomenclature->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $nomenclature->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


