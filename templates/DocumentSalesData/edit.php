<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSalesData $documentSalesData
 */
?>

<?php $this->assign('title', __('Edit Document Sales Data') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Sales Data' => ['action'=>'index'],
      'View' => ['action'=>'view', $documentSalesData->id],
      'Edit',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($documentSalesData) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('document_sales_id', ['options' => $documentSales]);
      echo $this->Form->control('nomenclature_id', ['options' => $nomenclatures]);
      echo $this->Form->control('count');
      echo $this->Form->control('price');
      echo $this->Form->control('full_price');
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Delete'),
          ['action' => 'delete', $documentSalesData->id],
          ['confirm' => __('Are you sure you want to delete # {0}?', $documentSalesData->id), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
