<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NomenclatureType $nomenclatureType
 */
?>

<?php $this->assign('title', __('Edit Nomenclature Type') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Nomenclature Types' => ['action'=>'index'],
      'View' => ['action'=>'view', $nomenclatureType->id],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($nomenclatureType) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $nomenclatureType->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $nomenclatureType->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
