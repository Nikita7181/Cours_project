<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSupplierReceiptData $documentSupplierReceiptData
 */
?>

<?php
$this->assign('title', __('Document Supplier Receipt Data') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Supplier Receipt Data' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($documentSupplierReceiptData->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Document Supplier Receipt') ?></th>
            <td><?= $documentSupplierReceiptData->has('document_supplier_receipt') ? $this->Html->link($documentSupplierReceiptData->document_supplier_receipt->id, ['controller' => 'DocumentSupplierReceipt', 'action' => 'view', $documentSupplierReceiptData->document_supplier_receipt->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nomenclature') ?></th>
            <td><?= $documentSupplierReceiptData->has('nomenclature') ? $this->Html->link($documentSupplierReceiptData->nomenclature->name, ['controller' => 'Nomenclatures', 'action' => 'view', $documentSupplierReceiptData->nomenclature->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($documentSupplierReceiptData->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Count') ?></th>
            <td><?= $this->Number->format($documentSupplierReceiptData->count) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($documentSupplierReceiptData->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Full Price') ?></th>
            <td><?= $this->Number->format($documentSupplierReceiptData->full_price) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $documentSupplierReceiptData->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $documentSupplierReceiptData->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $documentSupplierReceiptData->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


