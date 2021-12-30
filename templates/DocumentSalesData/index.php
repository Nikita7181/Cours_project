<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSalesData[]|\Cake\Collection\CollectionInterface $documentSalesData
 */
?>

<?php $this->assign('title', __('Document Sales Data') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Sales Data',
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
      <?= $this->Html->link(__('New Document Sales Data'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('document_sales_id') ?></th>
              <th><?= $this->Paginator->sort('nomenclature_id') ?></th>
              <th><?= $this->Paginator->sort('count') ?></th>
              <th><?= $this->Paginator->sort('price') ?></th>
              <th><?= $this->Paginator->sort('full_price') ?></th>
              <th><?= $this->Paginator->sort('created') ?></th>
              <th><?= $this->Paginator->sort('modified') ?></th>
              <th class="actions"><?= __('Действия') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($documentSalesData as $documentSalesData): ?>
          <tr>
            <td><?= $this->Number->format($documentSalesData->id) ?></td>
            <td><?= $documentSalesData->has('document_sale') ? $this->Html->link($documentSalesData->document_sale->id, ['controller' => 'DocumentSales', 'action' => 'view', $documentSalesData->document_sale->id]) : '' ?></td>
            <td><?= $documentSalesData->has('nomenclature') ? $this->Html->link($documentSalesData->nomenclature->name, ['controller' => 'Nomenclatures', 'action' => 'view', $documentSalesData->nomenclature->id]) : '' ?></td>
            <td><?= $this->Number->format($documentSalesData->count) ?></td>
            <td><?= $this->Number->format($documentSalesData->price) ?></td>
            <td><?= $this->Number->format($documentSalesData->full_price) ?></td>
            <td><?= h($documentSalesData->created) ?></td>
            <td><?= h($documentSalesData->modified) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $documentSalesData->id], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $documentSalesData->id], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $documentSalesData->id], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Are you sure you want to delete # {0}?', $documentSalesData->id)]) ?>
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
