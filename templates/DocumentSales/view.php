<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DocumentSale $documentSale
 */
?>

<?php

$icon = "";
if ($documentSale->delete_mark == false) 
{ $icon = '<i class="fas fa-check btn-outline-success" style="float:left; padding-right: 15px"></i>'; }
else
{ $icon = '<i class="fas fa-times btn-outline-danger" style="float:left; padding-right: 15px"></i>'; }

$this->assign('title',  $icon . __('Документ продажи') );

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список документов продажи' => ['action'=>'index'],
      'Просмотр',
    ]
  ])
);
?>

<div class="view card card-primary card-outline">
  <div class="card-header d-sm-flex">
    <h2 class="card-title"><?= h($documentSale->document_numberd) ?></h2>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <tr>
            <th><?= __('Номер документа') ?></th>
            <td><?= h($documentSale->document_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Контрагент') ?></th>
            <td><?= $documentSale->has('contragent') ? $this->Html->link($documentSale->contragent->name, ['controller' => 'Contragents', 'action' => 'view', $documentSale->contragent->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Дата документа') ?></th>
            <td><?= h($documentSale->document_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Документ создан') ?></th>
            <td><?= h($documentSale->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Документ изменен') ?></th>
            <td><?= h($documentSale->modified) ?></td>
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
        $num = 1;
        $sum = 0;
        $documentSaleData = null;
        if (empty($documentSale->document_sales_data)) { ?>
        <tr>
            <td colspan="7" class="text-muted">
              Записи не найдены!
            </td>
        </tr>
      <?php }else{ ?>
        <?php 

          foreach ($documentSale->document_sales_data as $documentSaleData) : ?>
        <tr class="document-row" id = "document-row-<?= h($documentSaleData->id) ?>">
            <td style='display:none'><?= h($documentSaleData->id) ?></td>
            <td><?= '<input id="num-'.$documentSaleData->id.'" class="form-control form-control-sm" type="text" value="' . $num . '" disabled style="background-color: white; width: 50px" >'?></td>
            <td><?= '<select id="nomenclature_id-'.$documentSaleData->id.'" class="form-control form-control-sm" type="text" value="' .h($documentSaleData->nomenclature->name) . '" disabled style="background-color: white;" >'?>
                <?php
                  //$arr = $nomenclatures->toArray();
                  //print_r($nomenclatures_opt); die();
                  foreach($nomenclatures_opt as $key => $val)
                  {
                    if ($documentSaleData->nomenclature->id == $val->id)
                      echo '<option value="'. $val->id .'" selected="selected">'. $val->name .'</option>';
                    else
                      echo '<option value="'. $val->id .'">'. $val->name .'</option>';
                  }
                ?>
                <?= '</select'?>
            </td>
            <td><?= '<div style="display:inline-block">' . '<input id="count-'.$documentSaleData->id.'" class="form-control form-control-sm" type="text" value="' . h($documentSaleData->count) . '" disabled style="background-color: white; text-align: right;" >' . '</div>' . "  " .h($documentSaleData->nomenclature->unit->symbol) ?> </td>
            <td><?= '<input id="price-'.$documentSaleData->id.'" class="form-control form-control-sm" type="text" value="' . h($documentSaleData->price) . '" disabled style="background-color: white; text-align: right;" >'?></td>
            <td><?= '<input id="full_price-'.$documentSaleData->id.'" class="form-control form-control-sm" type="text" value="' . h($documentSaleData->full_price) . '" disabled style="background-color: white; text-align: right;" >'?></td>
            <td class="actions">
              <?= '<div class="btn-group btn-group-sm">'?>
              <?= '<button id="btn-edit-line-'. $documentSaleData->id .'" class="btn-edit-line btn btn-xs btn-success btn-row-control" type="none" style="display:none"> <i class="fas fa-check"></i> </button>'  ?>
              <?= '<button id="btn-undo-line-'. $documentSaleData->id .'" class="btn-undo-line btn btn-xs btn btn-info btn-row-control" type="none" style="display:none"> <i class="fas fa-undo"></i> </button>'  ?>
              <?= '<button id="btn-del-line-'. $documentSaleData->id .'" class="btn-del-line btn btn-xs btn-danger btn-row-control" type="none" style="display:none"> <i class="fas fa-times"></i> </button>'  ?>
              <?= '</div>' ?>
            </td>
        </tr>
        <?php 
          $num = $num + 1;
          $sum = $sum + $documentSaleData->full_price;
          endforeach; ?>
        <?php } ?>
        <tr id='plus-btn'> <td> <i class="fas fa-plus-circle" style="color:green"></i> </td></tr>
        <tr id='new-line' style='display:none'>
          
          <?= $this->Form->create($documentSaleData) ?>
            <?php
              //echo '<i class="fas fa-plus-circle"></i>';
              
              echo "<td>" . $this->Form->control('document_sales_id', ['id'=>'document_sales_id', 'value' => $documentSale->id, 'label' => '', 'type' => 'hidden']) . "</td>";
              echo "<td>" .$this->Form->control('nomenclature_id', ['id' => 'nomenclature_id', 'options' => $nomenclatures, 'label' => '']) . "</td>";
              echo "<td>" .$this->Form->control('count', [ 'id' => 'count', 'label' => '', 'value' => 1]) . "</td>";
              echo "<td>" .$this->Form->control('price', [ 'id' => 'price', 'label' => '' , 'value' => 0]) . "</td>";
              echo "<td>" .$this->Form->control('full_price' , [ 'id' => 'full_price', 'label' => '' , 'value' => 0]) . "</td>";
            ?>


            <td>
              <?= $this->Form->button(__('Save'),['id' => 'new-line-btn', 'class' => '', 'type'=>'none']) ?>
              <?= $this->Html->link(__('Cancel'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
            </td>

          <?= $this->Form->end() ?>
        </tr>

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
    url:"' . $this->Url->build(['controller' => 'DocumentSalesData', 'action' => 'ajaxAdd']) . '",
    data:{
      document_sales_id:$("#document_sales_id").val(),
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
    url:"' . $this->Url->build(['controller' => 'DocumentSalesData', 'action' => 'ajaxEdit']) . '",
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
      url:"' . $this->Url->build(['controller' => 'DocumentSalesData', 'action' => 'ajaxDelete']) . '",
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
      url:"' . $this->Url->build(['controller' => 'DocumentSalesData', 'action' => 'ajaxGet']) . '",
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
