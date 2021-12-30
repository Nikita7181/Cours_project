<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSupplierReceiptData[]|\Cake\Collection\CollectionInterface $documentSupplierReceiptData
 */
?>

<?php $this->assign('title', __('Document Supplier Receipt Data') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Supplier Receipt Data',
    ]
  ])
);
?>

<div class="card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><!-- --></h2>
    <div class="card-toolbox">
      <?= $this->Paginator->limitControl([], null, [
            'label'=>false,
            'class' => 'form-control-sm',
          ]); ?>
      <?= $this->Html->link(__('New Document Supplier Receipt Data'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('document_supplier_receipt_id') ?></th>
              <th><?= $this->Paginator->sort('nomenclature_id') ?></th>
              <th><?= $this->Paginator->sort('count') ?></th>
              <th><?= $this->Paginator->sort('price') ?></th>
              <th><?= $this->Paginator->sort('full_price') ?></th>
              <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($documentSupplierReceiptData as $documentSupplierReceiptData): ?>
          <tr>
            <td><?= $this->Number->format($documentSupplierReceiptData->id) ?></td>
            <td><?= $documentSupplierReceiptData->has('document_supplier_receipt') ? $this->Html->link($documentSupplierReceiptData->document_supplier_receipt->id, ['controller' => 'DocumentSupplierReceipt', 'action' => 'view', $documentSupplierReceiptData->document_supplier_receipt->id]) : '' ?></td>
            <td><?= $documentSupplierReceiptData->has('nomenclature') ? $this->Html->link($documentSupplierReceiptData->nomenclature->name, ['controller' => 'Nomenclatures', 'action' => 'view', $documentSupplierReceiptData->nomenclature->id]) : '' ?></td>
            <td><?= $this->Number->format($documentSupplierReceiptData->count) ?></td>
            <td><?= $this->Number->format($documentSupplierReceiptData->price) ?></td>
            <td><?= $this->Number->format($documentSupplierReceiptData->full_price) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $documentSupplierReceiptData->id], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documentSupplierReceiptData->id], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documentSupplierReceiptData->id], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $documentSupplierReceiptData->id)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-footer d-md-flex paginator">
    <div class="mr-auto" style="font-size:.8rem">
      <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
    </div>

    <ul class="pagination pagination-sm">
      <?= $this->Paginator->first('<i class="fas fa-angle-double-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->prev('<i class="fas fa-angle-left"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next('<i class="fas fa-angle-right"></i>', ['escape'=>false]) ?>
      <?= $this->Paginator->last('<i class="fas fa-angle-double-right"></i>', ['escape'=>false]) ?>
    </ul>

  </div>
  <!-- /.card-footer -->
</div>
