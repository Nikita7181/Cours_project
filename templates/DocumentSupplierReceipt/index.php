<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSupplierReceipt[]|\Cake\Collection\CollectionInterface $documentSupplierReceipt
 */
?>

<?php $this->assign('title', __('Документ поступления от поставщика') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список документов поступления от поставщика',
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
      <?= $this->Html->link(__('Новый документ'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('delete_mark', ['title'=>' ']) ?></th>              
              <th><?= $this->Paginator->sort('document_number', ['title'=>'Номер документа']) ?></th>
              <th><?= $this->Paginator->sort('document_date', ['title'=>'Дата']) ?></th>
              <th><?= $this->Paginator->sort('contragent.name', ['title'=>'Поставщик']) ?></th>
              <th><?= $this->Paginator->sort('documet_price', ['title'=>'Сумма документа']) ?></th>
              <th class="actions"><?= __('Действия') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($documentSupplierReceipt as $documentSupplierReceipt): ?>
          <tr>
            <td><?php if ( $this->Number->format($documentSupplierReceipt->delete_mark) == 0) 
                  { echo '<i class="fas fa-check"></i>'; }
                  else
                  { echo '<i class="fas fa-times btn-outline-danger"></i>'; }
            
              ?>
            </td>            
            <td><?= h($documentSupplierReceipt->document_number) ?></td>
            <td><?= h($documentSupplierReceipt->document_date) ?></td>
            <td><?= $documentSupplierReceipt->has('contragent') ? $this->Html->link($documentSupplierReceipt->contragent->name, ['controller' => 'Contragents', 'action' => 'view', $documentSupplierReceipt->contragent->id]) : '' ?></td>

            <td><?= $this->Number->format($documentSupplierReceipt->documet_price) ?></td>
            <td class="actions">
              <?php echo "<a href=\"".$this->Url->build(['controller'=>'DocumentSupplierReceipt', 'action' => 'view',  $documentSupplierReceipt->id])."\"><i class=\"fas fa-edit\"></i></a>" ?>
              <?php if ( $this->Number->format($documentSupplierReceipt->delete_mark) == 0)
              {
                echo $this->Form->postLink(__(''), ['action' => 'delete', $documentSupplierReceipt->id], ['class'=>'fas fa-minus-circle btn-outline-danger', 'escape'=>false, 'confirm' => __('Действительно хотите пометить на удаление # {0}?', $documentSupplierReceipt->id)]);
              } 
              else
              {
                echo $this->Form->postLink(__(''), ['action' => 'delete', $documentSupplierReceipt->id], ['class'=>'fas fa-check btn-outline-danger', 'escape'=>false, 'confirm' => __('Действительно хотите снять пометку удаления # {0}?', $documentSupplierReceipt->id)]);
              } ?>  
          </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <div class="card-footer d-md-flex paginator">
    <div class="mr-auto" style="font-size:.8rem">
      <?= $this->Paginator->counter(__('Страница {{page}} из {{pages}}, показано {{current}} записей из {{count}} всего')) ?>
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
