<?php

/**
 * @var \App\View\AppView $this
 */
?>

<?php $this->layout = "CakeLte.login" ?>
<?= $this->Flash->render() ?>

<div class="card">
  <div class="card-body login-card-body">
    <p class="login-box-msg"><?= __('Вход в систему') ?></p>

    <?= $this->Form->create() ?>

    <?= $this->Form->control('email', [
      'label' => false,
      'placeholder' => __('E-mail'),
      'append' => '<i class="fas fa-user"></i>'
    ]) ?>

    <?= $this->Form->control('password', [
      'label' => false,
      'placeholder' => __('Пароль'),
      'append' => '<i class="fas fa-lock"></i>'
    ]) ?>

    <div class="row">
      <div class="col-8">
        <?php //echo $this->Form->control('remember_me', ['type'=>'checkbox', 'custom'=>true]) ?>
      </div>
      <!-- /.col -->
      <div class="col-4">
        <?= $this->Form->control(__('Войти'), ['type'=>'submit', 'class'=>'btn btn-primary btn-block']) ?>
      </div>
      <!-- /.col -->
    </div>

    <?= $this->Form->end() ?>

    <p class="mb-1">
      <?= $this->Html->link(__('Не помню свой пароль'), '#') ?>
    </p>
    <p class="mb-0">
      <?= $this->Html->link(__('Регистрация'), ['action' => 'add']) ?>
    </p>
  </div>
  <!-- /.login-card-body -->
</div>
