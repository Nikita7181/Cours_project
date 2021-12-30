<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSupplierReceipt $documentSupplierReceipt
 */
?>

<?php
  $icon = "";
  if ( $this->Number->format($documentSupplierReceipt->delete_mark) == 0) 
  { $icon = '<i class="fas fa-check btn-outline-success" style="float:left; padding-right: 15px"></i>'; }
  else
  { $icon = '<i class="fas fa-times btn-outline-danger" style="float:left; padding-right: 15px"></i>'; }


$this->assign('title', $icon . __('Документ поступления товаров и услуг') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'List Document Supplier Receipt' => ['action'=>'index'],
      'View',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header">


    <h2 class="card-title" style="float:left;">Реквизиты документа</h2>
    <div class="card-tools" style="float: right;">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Номер документа:') ?></th>
            <td><input id="document-number-<?= $documentSupplierReceipt->id ?>" class="form-control form-control-sm" type="text" value="<?= h($documentSupplierReceipt->document_number) ?>" >
            <th><?= __('Дата') ?></th>
            <td>
          
              <div class="input-group date input-group-sm" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php //echo h($documentSupplierReceipt->document_date) ?>">
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>    
            
            
            
            </td>
        
        </tr>
        <tr>
            <th><?= __('Контрагент') ?></th>
            <td>
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text"><a href="<?= $this->Url->build(['controller'=>'Contragents', 'action' => 'view',  $documentSupplierReceipt->contragent_id]) ?>"><i class="fas fa-edit"></i></a></span>
                </div>
              <?php 

            echo '<select id="contragent_id-'.$documentSupplierReceipt->id.'" class="form-control form-control-sm" type="text" value="' .h($documentSupplierReceipt->contragent->name) . '" style="background-color: white;" >'?>
                <?php
                  //$arr = $nomenclatures->toArray();
                  //print_r($nomenclatures_opt); die();
                  foreach($contragents_opt as $key => $val)
                  {
                    if ($documentSupplierReceipt->contragent->id == $val->id)
                      echo '<option value="'. $val->id .'" selected="selected">'. $val->name .'</option>';
                    else
                      echo '<option value="'. $val->id .'">'. $val->name .'</option>';
                  }
                ?>
                <?= '</select'?>
                <?php // echo $documentSupplierReceipt->has('contragent') ? $this->Html->link($documentSupplierReceipt->contragent->name, ['controller' => 'Contragents', 'action' => 'view', $documentSupplierReceipt->contragent->id]) : '' ?>
                </div>
            </td>
            <th><?= __('Сумма документа') ?></th>
            <td><?= $this->Number->format($documentSupplierReceipt->documet_price) ?></td>            
        </tr>


    </table>
  </div>
</div>


<div class="card">
  <div class="card-header">
    <h3 class="card-title" style="float: left;">Табличная часть</h3>
    <div class="card-tools ">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
  </div>

  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <tr>
          <th style="width: 5%"><?= __('№') ?></th>
          <th style="width: 50%;"><?= __('Номенклатура') ?></th>
          <th><?= __('Количество') ?></th>
          <th><?= __('Цена') ?></th>
          <th><?= __('Сумма') ?></th>
          
      </tr>
      <?php 
        $documentSupplierReceiptData = null;
        $num = 1;
        $sum = 0;
        if (empty($documentSupplierReceipt->document_supplier_receipt_data)) { ?>
        <tr id="doc-no-record">
            <td colspan="7" class="text-muted" >
              Записи не найдены
            </td>
        </tr>
      <?php }else{ ?>
        <?php 

          foreach ($documentSupplierReceipt->document_supplier_receipt_data as $documentSupplierReceiptData) : ?>
        <tr class="document-row" id = "document-row-<?= h($documentSupplierReceiptData->id) ?>">
            <td style='display:none'><?= h($documentSupplierReceiptData->id) ?></td>
            <td><?= '<input id="num-'.$documentSupplierReceiptData->id.'" class="form-control form-control-sm" type="text" value="' . $num . '" disabled style="background-color: white; width: 50px" >'?></td>
            <td><?= '<select id="nomenclature_id-'.$documentSupplierReceiptData->id.'" class="form-control form-control-sm" type="text" value="' .h($documentSupplierReceiptData->nomenclature->name) . '" disabled style="background-color: white;" >'?>
                <?php
                  //$arr = $nomenclatures->toArray();
                  //print_r($nomenclatures_opt); die();
                  foreach($nomenclatures_opt as $key => $val)
                  {
                    if ($documentSupplierReceiptData->nomenclature->id == $val->id)
                      echo '<option value="'. $val->id .'" selected="selected">'. $val->name .'</option>';
                    else
                      echo '<option value="'. $val->id .'">'. $val->name .'</option>';
                  }
                ?>
                <?= '</select'?>
            </td>
            <td><?= '<div style="display:inline-block">' . '<input id="count-'.$documentSupplierReceiptData->id.'" class="form-control form-control-sm" type="text" value="' . h($documentSupplierReceiptData->count) . '" disabled style="background-color: white; text-align: right;" >' . '</div>' . "  " .h($documentSupplierReceiptData->nomenclature->unit->symbol) ?> </td>
            <td><?= '<input id="price-'.$documentSupplierReceiptData->id.'" class="form-control form-control-sm" type="text" value="' . h($documentSupplierReceiptData->price) . '" disabled style="background-color: white; text-align: right;" >'?></td>
            <td><?= '<input id="full_price-'.$documentSupplierReceiptData->id.'" class="form-control form-control-sm" type="text" value="' . h($documentSupplierReceiptData->full_price) . '" disabled style="background-color: white; text-align: right;" >'?></td>
            <td class="actions">
              <?= '<div class="btn-group btn-group-sm">'?>
              <?= '<button id="btn-edit-line-'. $documentSupplierReceiptData->id .'" class="btn-edit-line btn btn-xs btn-success btn-row-control" type="none" style="display:none"> <i class="fas fa-check"></i> </button>'  ?>
              <?= '<button id="btn-undo-line-'. $documentSupplierReceiptData->id .'" class="btn-undo-line btn btn-xs btn btn-info btn-row-control" type="none" style="display:none"> <i class="fas fa-undo"></i> </button>'  ?>
              <?= '<button id="btn-del-line-'. $documentSupplierReceiptData->id .'" class="btn-del-line btn btn-xs btn-danger btn-row-control" type="none" style="display:none"> <i class="fas fa-times"></i> </button>'  ?>
              <?= '</div>' ?>
            </td>
        </tr>
        <?php
          $num = $num + 1;
          $sum = $sum + $documentSupplierReceiptData->full_price;
          endforeach; ?>
      <?php } ?>          
        <tr id='plus-btn'> <td> <i class="fas fa-plus-circle" style="color:green"></i> </td></tr>
        <tr id='new-line' style='display:none'>
          
          <?= $this->Form->create($documentSupplierReceiptData) ?>
            <?php
              //echo '<i class="fas fa-plus-circle"></i>';
              
              echo "<td>" . $this->Form->control('document_supplier_receipt_id', ['id'=>'document_supplier_receipt_id', 'value' => $documentSupplierReceipt->id, 'label' => '', 'type' => 'hidden']) . "</td>";
              echo "<td>" .$this->Form->control('nomenclature_id', ['id' => 'nomenclature_id', 'options' => $nomenclatures, 'label' => '']) . "</td>";
              echo "<td>" .$this->Form->control('count', [ 'id' => 'count', 'label' => '', 'value' => 1]) . "</td>";
              echo "<td>" .$this->Form->control('price', [ 'id' => 'price', 'label' => '' , 'value' => 0]) . "</td>";
              echo "<td>" .$this->Form->control('full_price' , [ 'id' => 'full_price', 'label' => '' , 'value' => 0]) . "</td>";
            ?>


            <td>
              <?= $this->Form->button(__('Добавить'),['id' => 'new-line-btn', 'class' => '', 'type'=>'none']) ?>
              <?php //echo $this->Html->link(__('Отмена'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
            </td>

          <?= $this->Form->end() ?>
        </tr>
      <?php //} ?>
    </table>
  </div>
</div>


<?php 
$this->Html->script('../cake_lte/AdminLTE/plugins/daterangepicker/daterangepicker.js',['block' => true]);
$this->Html->scriptStart(['block' => true]); 
echo '
$("#full_price").prop(\'disabled\',true).css(\'background-color\', \'white\');

$(".edit-row").click(
  function(e) {
    e.preventDefault();
    e.stopPropagation();
    alert(\'Edit\');
    //e.stopPropagation();
  }
)

$(".document-row").click(
  function(e) {
      //alert($(this).attr(\'class\'));
      $row = $(this);
      $row.find(\'input,select\').each(function(index, elem)
      {
        var elem = $(elem);
        //alert(elem.val());
        //$(this).prop(\'disabled\',false);
        if (elem.attr(\'class\') == \'form-control form-control-sm\')
        {
          elem.prop(\'disabled\',false);
        };
      });
      $row.find(\'button\').each(function(index, elem)
      {
        var elem = $(elem);
          elem.show();
      });
      $row.addClass (\'document-row-act\');
      e.stopPropagation();
  }
  
);

$("#count").change(function(){
  $("#full_price").val($("#count").val() * $("#price").val());
});

$("#price").change(function(){
  $("#full_price").val($("#count").val() * $("#price").val());
});

$("#plus-btn").click(function(){
  $("#plus-btn").hide();
  $("#new-line").show();
});

$("#new-line-btn").click(function(e){
  
  e.preventDefault();
  
  $.ajax({
    method:"POST",
    url:"' . $this->Url->build(['controller' => 'DocumentSupplierReceiptData', 'action' => 'ajaxAdd']) . '",
    data:{
      document_supplier_receipt_id:$("#document_supplier_receipt_id").val(),
      nomenclature_id:$("#nomenclature_id").val(),
      count:$("#count").val(),
      price:$("#price").val(),
      full_price:$("#full_price").val()
    },
    headers:{
      \'X-CSRF-Token\':$(\'[name="_csrfToken"]\').val()
    },
    success:function(result){
      location.reload();  
    }
  });
  
});

$(".btn-edit-line").click(function(e){
  
   e.preventDefault();
  
  var id_val = $(this).attr(\'id\');
  id_val = id_val.replace(\'btn-edit-line-\', \'\');
  //alert (id_val);
  $.ajax({
    method:"POST",
    url:"' . $this->Url->build(['controller' => 'DocumentSupplierReceiptData', 'action' => 'ajaxEdit']) . '",
    data:{
      id:id_val,
      nomenclature_id:$("#nomenclature_id"+"-"+id_val).val(),
      count:$("#count"+"-"+id_val).val(),
      price:$("#price"+"-"+id_val).val(),
      full_price:$("#full_price"+"-"+id_val).val()
    },
    headers:{
      \'X-CSRF-Token\':$(\'[name="_csrfToken"]\').val()
    },
    success:function(result){
      //location.reload();  
    }
  });
  
});

$(".btn-del-line").click(function(e){
  
  e.preventDefault();
 
  var id_val = $(this).attr(\'id\');
  id_val = id_val.replace(\'btn-del-line-\', \'\');
  if (confirm (\'Действительно удалить строку?\'))
  {
    $.ajax({
      method:"POST",
      url:"' . $this->Url->build(['controller' => 'DocumentSupplierReceiptData', 'action' => 'ajaxDelete']) . '",
      data:{
        id:id_val
      },
      headers:{
        \'X-CSRF-Token\':$(\'[name="_csrfToken"]\').val()
      },
      success:function(result){
        var id = result.data.id;
        var sum = '. $sum .' - parseInt($("#full-price-"+id).val(), 10);
        //$("#document-row-"+id).remove();
        console.log ($("#full-price-"+id).val());
      }
    });
  }
});

$(".btn-undo-line").click(function(e){
  
  e.preventDefault();
 
  var id_val = $(this).attr(\'id\');
  id_val = id_val.replace(\'btn-undo-line-\', \'\');
  if (confirm (\'Действительно отменить изменения строки?\'))
  {
    $.ajax({
      method:"POST",
      url:"' . $this->Url->build(['controller' => 'DocumentSupplierReceiptData', 'action' => 'ajaxGet']) . '",
      data:{
        id:id_val
      },
      headers:{
        \'X-CSRF-Token\':$(\'[name="_csrfToken"]\').val()
      },
      success:function(result){
        var id = result.id;
        $("#nomenclature_id-"+id).val(result.nomenclature_id);
        $("#price-"+id).val(result.price);
        $("#count-"+id).val(result.count);
        $("#full_price-"+id).val(result.full_price);
        
        
      }
    });
  }
});


// $(function () {
//   $(\'#datetimepicker\').datetimepicker({
//       locale: \'ru\'
//   });
// });
';
$this->Html->scriptEnd();

?>

