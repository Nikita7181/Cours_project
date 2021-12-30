<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSalesData $documentSalesData
 */
?>

<?php $this->assign('title', __('Add Document Sales Data') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Sales Data' => ['action'=>'index'],
      'Add',
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
    <div class="ml-auto">
      <?= $this->Form->button(__('Save')) ?>
      <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
