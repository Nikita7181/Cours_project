<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Unit $unit
 */
?>

<?php
$this->assign('title', __('Unit') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Units' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($unit->name) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($unit->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Symbol') ?></th>
            <td><?= h($unit->symbol) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($unit->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= $this->Number->format($unit->code) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $unit->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $unit->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $unit->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


<div class="related related-nomenclatures view card">
  <div class="card-header d-sm-flex">
    <h3 class="card-title"><?= __('Related Nomenclatures') ?></h3>
    <div class="card-toolbox">
      <?= $this->Html->link(__('New'), ['controller' => 'Nomenclatures' , 'action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <?= $this->Html->link(__('List '), ['controller' => 'Nomenclatures' , 'action' => 'index'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th><?= __('Id') ?></th>
          <th><?= __('Name') ?></th>
          <th><?= __('Full Name') ?></th>
          <th><?= __('Nomclature Type Id') ?></th>
          <th><?= __('Unit Id') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
      </tr>
      <?php if (empty($unit->nomenclatures)) { ?>
        <tr>
            <td colspan="6" class="text-muted">
              Nomenclatures record not found!
            </td>
        </tr>
      <?php }else{ ?>
        <?php foreach ($unit->nomenclatures as $nomenclatures) : ?>
        <tr>
            <td><?= h($nomenclatures->id) ?></td>
            <td><?= h($nomenclatures->name) ?></td>
            <td><?= h($nomenclatures->full_name) ?></td>
            <td><?= h($nomenclatures->nomclature_type_id) ?></td>
            <td><?= h($nomenclatures->unit_id) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['controller' => 'Nomenclatures', 'action' => 'view', $nomenclatures->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Html->link(__('Edit'), ['controller' => 'Nomenclatures', 'action' => 'edit', $nomenclatures->id], ['class'=>'btn btn-xs btn-outline-primary']) ?>
              <?= $this->Form->postLink(__('Delete'), ['controller' => 'Nomenclatures', 'action' => 'delete', $nomenclatures->id], ['class'=>'btn btn-xs btn-outline-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $nomenclatures->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      <?php } ?>
    </table>
  </div>
</div>

