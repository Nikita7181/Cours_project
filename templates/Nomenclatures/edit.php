<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Nomenclature $nomenclature
 */
?>

<?php $this->assign('title', __('Edit Nomenclature') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Nomenclatures' => ['action'=>'index'],
      'View' => ['action'=>'view', $nomenclature->id],
      'Edit',
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
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $nomenclature->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $nomenclature->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
