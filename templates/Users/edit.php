<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php $this->assign('title', __('Редактирование пользователя') ); ?>

<?php
$this->assign('breadcrumb',
  $this->element('content/breadcrumb', [
    'home' => true,
    'breadcrumb' => [
      'Список пользователей' => ['action'=>'index'],
      'Просмотр' => ['action'=>'view', $user->username],
      'Редактирование',
    ]
  ])
);
?>


<div class="card card-primary card-outline">
  <?= $this->Form->create($user) ?>
  <div class="card-body">
    <?php
      echo $this->Form->control('email');
      echo $this->Form->control('password', ['label' => 'Пароль']);
      echo $this->Form->control('firstname', ['label' => 'Имя']);
      echo $this->Form->control('lastname', ['label' => 'Фамилия']);
    ?>
  </div>

  <div class="card-footer d-flex">
    <div class="">
      <?= $this->Form->postLink(
          __('Удалить'),
          ['action' => 'delete', $user->username],
          ['confirm' => __('Действительно хотите удалить пользователя {0}?', $user->username), 'class' => 'btn btn-danger']
      ) ?>
    </div>
    <div class="ml-auto">
      <?= $this->Form->button(__('Сохранить')) ?>
      <?= $this->Html->link(__('Отмена'), ['action'=>'index'], ['class'=>'btn btn-default']) ?>
    </div>
  </div>

  <?= $this->Form->end() ?>
</div>
