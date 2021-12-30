<?php

namespace App;

use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Identifier\IdentifierInterface;
use Authentication\Middleware\AuthenticationMiddleware;

//$this->load
//$this->loadComponent('Authentication.Authentication');
//$user = $request->getAttribute('identity');

//$this->Html->link($documentSupplierReceipt->contragent->name, ['controller' => 'Contragents', 'action' => 'view', $documentSupplierReceipt->contragent->id]) : ''

//$this->loadHelper('Authentication');
$user = $this->request->getAttribute('identity');

?>
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <?= $this->Html->image('CakeLte./AdminLTE/dist/img/user2-160x160.jpg', ['class'=>'img-circle elevation-2', 'alt'=>'User Image']) ?>
  </div>
  <div class="info">
    <a href="<?= $this->Url->build(['controller'=>'Users', 'action' => 'view',  $user->email])?>" class="d-block"> <?php echo $user->getFullName(); ?></a>
  </div>
</div>
