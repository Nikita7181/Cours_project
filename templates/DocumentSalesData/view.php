<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSalesData $documentSalesData
 */
?>

<?php
$this->assign('title', __('Document Sales Data') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Sales Data' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($documentSalesData->id) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Document Sale') ?></th>
            <td><?= $documentSalesData->has('document_sale') ? $this->Html->link($documentSalesData->document_sale->id, ['controller' => 'DocumentSales', 'action' => 'view', $documentSalesData->document_sale->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Nomenclature') ?></th>
            <td><?= $documentSalesData->has('nomenclature') ? $this->Html->link($documentSalesData->nomenclature->name, ['controller' => 'Nomenclatures', 'action' => 'view', $documentSalesData->nomenclature->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($documentSalesData->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Count') ?></th>
            <td><?= $this->Number->format($documentSalesData->count) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($documentSalesData->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Full Price') ?></th>
            <td><?= $this->Number->format($documentSalesData->full_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($documentSalesData->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($documentSalesData->modified) ?></td>
        </tr>
    </table>
  </div>
  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete',  $documentSalesData->id],
          ['confirm' => __('Are you sure you want to delete # {0}?',  $documentSalesData->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Html->link(__('Edit'), ['action' => 'edit',  $documentSalesData->id], ['class' => 'btn btn-secondary']) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>
</div>


