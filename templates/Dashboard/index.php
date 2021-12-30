<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dashboard[]|\Cake\Collection\CollectionInterface $dashboard
 */
?>

<?php $this->assign('title', __('Рабочий стол') ); ?>

<?php
//$this->set('user', $user);

$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список записи',
    ]
  ])
);
?>

<div class="card card-primary card-outline">
 
  
  <div class="card-header d-sm-flex">
    <h2 class="card-title">Панель записи</h2>
    <div class="card-toolbox">

      <?= $this->Html->link(__('Добавить запись'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                
    </div>
  </div>
  <!-- /.card-header -->
  
  <div class="card-body table-responsive p-0">
    <div id='calendar'></div>
    <table class="table table-hover text-nowrap">
        <thead>
          <tr>
              <th><?= $this->Paginator->sort('id') ?></th>
              <th><?= $this->Paginator->sort('date') ?></th>
              <th><?= $this->Paginator->sort('time') ?></th>
              <th><?= $this->Paginator->sort('contact') ?></th>
              <th><?= $this->Paginator->sort('name') ?></th>
              <th class="actions"><?= __('Действия') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dashboard as $dash): ?>
          <tr>
            <td><?= $this->Number->format($dash->id) ?></td>
            <td><?= h($dash->date) ?></td>
            <td><?= h($dash->time) ?></td>
            <td><?= h($dash->contact) ?></td>
            <td><?= h($dash->name) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('Изменить'), ['action' => 'view', $dash->id], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Html->link(__('Назад'), ['action' => 'edit', $dash->id], ['class'=>'btn btn-xs btn-outline-primary', 'escape'=>false]) ?>
              <?= $this->Form->postLink(__('Удалить'), ['action' => 'delete', $dash->id], ['class'=>'btn btn-xs btn-outline-danger', 'escape'=>false, 'confirm' => __('Действительно хотите удалить эту запись?', $dash->id)]) ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->

  <!-- /.card-footer -->
</div>


<?= $this->Html->script('../cake_lte/AdminLTE/plugins/moment/moment.min.js',['block' => true]); ?>
<?= $this->Html->script('../cake_lte/AdminLTE/plugins/fullcalendar/main.min.js',['block' => true]); ?>
<?= $this->Html->script('../cake_lte/AdminLTE/plugins/fullcalendar-daygrid/main.min.js',['block' => true]); ?>
<?= $this->Html->script('../cake_lte/AdminLTE/plugins/fullcalendar-timegrid/main.min.js',['block' => true]); ?>
<?= $this->Html->script('../cake_lte/AdminLTE/plugins/fullcalendar-interaction/main.min.js',['block' => true]); ?>
<?= $this->Html->script('../cake_lte/AdminLTE/plugins/fullcalendar-bootstrap/main.min.js',['block' => true]); ?>

<?php
$this->Html->css('../cake_lte/AdminLTE/plugins/fullcalendar/main.min.css',['block' => true]);
$this->Html->css('../cake_lte/AdminLTE/plugins/fullcalendar-daygrid/main.min.css',['block' => true]);
$this->Html->css('../cake_lte/AdminLTE/plugins/fullcalendar-timegrid/main.min.css',['block' => true]);
$this->Html->css('../cake_lte/AdminLTE/plugins/fullcalendar-bootstrap/main.min.css',['block' => true]);

?>

<?= $this->Html->scriptStart(['block' => true]); ?>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      'themeSystem': 'bootstrap',
      events    : [
        <?php foreach ($dashboard as $d): ?>
      
        <?= '{
          title          : "' .h($d->name) . ' ' .h($d->contact) .'",
          start          : new Date(' . h(date('Y', strtotime($d->date))) . ', ' . h(date('m', strtotime($d->date)) - 1) . ', ' . h(date('d', strtotime($d->date))) . ' , ' . h(date('H', strtotime($d->time))) . ', ' . h(date('i', strtotime($d->time))) . '),
          backgroundColor: \'#f56954\', //red
          borderColor    : \'#f56954\', //red
          allDay         : false,
          url            : \'' . $this->Url->build(['controller'=>'Dashboard', 'action' => 'view',  $d->id]) . '\',
        },'
        ?>

        <?php endforeach; ?>
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }, 
      firstDay: 1, 
      locale: 'ru',
      eventTimeFormat: 
      { 
          hour: '2-digit',
          minute: '2-digit',
          hour12:false
      },
      buttonText:
      {
        today:    'Сегодня',
        month:    'Месяц',
        week:     'Неделя',
        day:      'День',
        list:     'Список'
      }
    });


    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
<?= $this->Html->scriptEnd(); ?>
<!--
<script src="../cake_lte/AdminLTE/plugins/moment/moment.min.js"></script>
<script src="../cake_lte/AdminLTE/plugins/fullcalendar/main.min.js"></script>
<script src="../cake_lte/AdminLTE/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="../cake_lte/AdminLTE/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="../cake_lte/AdminLTE/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="../cake_lte/AdminLTE/plugins/fullcalendar-bootstrap/main.min.js"></script> -->