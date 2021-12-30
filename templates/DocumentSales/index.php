<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSale[]|\Cake\Collection\CollectionInterface $documentSales
 */
?>

<?php $this->assign('title', __('Документ продажи') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список документов продажи',
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
              <th><?= $this->Paginator->sort('contragent_id', ['title'=>'Контрагент']) ?></th>

              <th><?= $this->Paginator->sort('document_price', ['title'=>'Сумма документа']) ?></th>

              <th class="actions"><?= __('Действия') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($documentSales as $documentSale): ?>
          <tr>
            <?php // $this->Number->format($documentSale->id) ?>
            <td><?php if ( $documentSale->delete_mark == false) 
                  { echo '<i class="fas fa-check"></i>'; }
                  else
                  { echo '<i class="fas fa-times btn-outline-danger"></i>'; }
            
              ?>
            </td>             
            <td><?= h($documentSale->document_number) ?></td>
            <td><?= h($documentSale->document_date) ?></td>
            <td><?= $documentSale->has('contragent') ? $this->Html->link($documentSale->contragent->name, ['controller' => 'Contragents', 'action' => 'view', $documentSale->contragent->id]) : '' ?></td>

            <td><?= $this->Number->format($documentSale->document_price) ?></td>

            <td class="actions">
            <?php echo "<a href=\"".$this->Url->build(['controller'=>'DocumentSales', 'action' => 'view',  $documentSale->id])."\"><i class=\"fas fa-edit\"></i></a>" ?>
              <?php if ( $this->Number->format($documentSale->delete_mark) == 0)
              {
                echo $this->Form->postLink(__(''), ['action' => 'delete', $documentSale->id], ['class'=>'fas fa-minus-circle btn-outline-danger', 'escape'=>false, 'confirm' => __('Действительно хотите пометить на удаление # {0}?', $documentSale->id)]);
              } 
              else
              {
                echo $this->Form->postLink(__(''), ['action' => 'delete', $documentSale->id], ['class'=>'fas fa-check btn-outline-danger', 'escape'=>false, 'confirm' => __('Действительно хотите снять пометку удаления # {0}?', $documentSale->id)]);
              } ?>             </td>
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
