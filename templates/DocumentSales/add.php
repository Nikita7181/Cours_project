<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSale $documentSale
 */
?>

<?php $this->assign('title', __('Add Document Sale') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Sales' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($documentSale) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('document_number');
      echo $this->Form->control('document_date');
      echo $this->Form->control('contragent_id', ['options' => $contragents]);
      echo $this->Form->control('delete_mark', ['custom' => true]);
      echo $this->Form->control('document_price');
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
