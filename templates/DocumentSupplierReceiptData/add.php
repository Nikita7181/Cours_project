<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSupplierReceiptData $documentSupplierReceiptData
 */
?>

<?php $this->assign('title', __('Add Document Supplier Receipt Data') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Supplier Receipt Data' => ['action'=>'index'],
      'Add',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($documentSupplierReceiptData) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('document_supplier_receipt_id', ['options' => $documentSupplierReceipt]);
      echo $this->Form->control('nomenclature_id', ['options' => $nomenclatures]);
      echo $this->Form->control('count');
      echo $this->Form->control('price');
      echo $this->Form->control('full_price');
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
