<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php $this->assign('title', __('Создание пользователя') ); ?>
<?= $this->Flash->render() ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список пользователей' => ['action'=>'index'],
      'Добавить',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($user) ?>
  <div class="card-body">
    <?php
      //echo $this->Form->control('id');
      echo $this->Form->control('email');
      echo $this->Form->control('password', ['label' => 'Пароль']);
      echo $this->Form->control('firstname', ['label' => 'Имя']);
      echo $this->Form->control('lastname', ['label' => 'Фамилия']);
      
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="ml-auto">
      <?= $this->Form->button(__('Сохранить')) ?>
      <?= $this->Html->link(__('Отменить'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
