<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nomenclature $nomenclature
 */
?>

<?php $this->assign('title', __('Add Nomenclature') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Nomenclatures' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($nomenclature) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('name');
      echo $this->Form->control('full_name');
      echo $this->Form->control('nomclature_type_id', ['options' => $nomenclatureTypes]);
      echo $this->Form->control('unit_id', ['options' => $units]);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
