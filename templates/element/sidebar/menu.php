<!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
<li class="nav-item">
  <a href="\dashboard" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
      Рабочий стол
    </p>
  </a>
</li>
<li class="nav-item has-treeview "><!--menu-open-->
  <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-book"></i>
    <p>
      Справочники
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
	  <li class="nav-item has-treeview">
		  <a href="#" class="nav-link">
			  <i class="nav-icon fas fa-user"></i>
			  <p>
				  Пользователи
			  </p>
		  </a>
		  <ul class="nav nav-treeview">
			  <li class="nav-item "> 
				  <a href="/users/index" class="nav-link">
				  	<i class="far fas fa-user-friends nav-icon"></i>
				  	<p>Список пользователей</p>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a href="/users/add" class="nav-link">
					  <i class="far fas fa-user-plus nav-icon"></i>
					  <p>Добавить пользователя</p>
				  </a>
			  </li>
		  </ul>
	  </li>	
  </ul>
  <ul class="nav nav-treeview">
	  <li class="nav-item has-treeview">
		  <a href="#" class="nav-link">
			  <i class="nav-icon fas fa-id-card"></i>
			  <p>
				  Контрагенты
			  </p>
		  </a>
		  <ul class="nav nav-treeview">
			  <li class="nav-item "> 
				  <a href="/contragents/index" class="nav-link">
				  	<i class="far fas fa-id-card nav-icon"></i>
				  	<p>Список контрагентов</p>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a href="/contragents/add" class="nav-link">
					  <i class="far fas fa-plus-square nav-icon"></i>
					  <p>Добавить контрагента</p>
				  </a>
			  </li>
		  </ul>
	  </li>	
  </ul>
  <ul class="nav nav-treeview">
	  <li class="nav-item has-treeview">
		  <a href="#" class="nav-link">
			  <i class="nav-icon fas fa-ruler"></i>
			  <p>
				  Единицы измерения
			  </p>
		  </a>
		  <ul class="nav nav-treeview">
			  <li class="nav-item "> 
				  <a href="/units/index" class="nav-link">
				  	<i class="far fas fa-ruler nav-icon"></i>
				  	<p>Список ед. измерения</p>
				  </a>
			  </li>
			  <li class="nav-item ">
				  <a href="/units/add" class="nav-link">
					  <i class="far fas fa-plus-square nav-icon"></i>
					  <p>Добавить ед. измерения</p>
				  </a>
			  </li>
		  </ul>
	  </li>	
  </ul>
</li>

<li class="nav-item has-treeview "><!--menu-open-->
  <a href="#" class="nav-link active">
    <i class="nav-icon fas fa-file-invoice"></i>
    <p>
      Документы
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
	<li class="nav-item has-treeview">
		<a href="#" class="nav-link">
			<i class="nav-icon fas fa-file-invoice"></i>
			<p>
				Поступления товаров
			</p>
		</a>
		<ul class="nav nav-treeview">
			<li class="nav-item "> 
				<a href="/documentSupplierReceipt/index" class="nav-link">
					<i class="far fas fa-file nav-icon"></i>
					<p>Список документов</p>
				</a>
			</li>
			<li class="nav-item ">
				<a href="/documentSupplierReceipt/add" class="nav-link">
					<i class="far fas fa-file nav-icon"></i>
					<p>Добавить документ</p>
				</a>
			</li>
		</ul>
	</li>	
		  
  </ul>
  <ul class="nav nav-treeview">
	<li class="nav-item has-treeview">
		<a href="#" class="nav-link">
			<i class="nav-icon fas fa-file-invoice"></i>
			<p>
				Документ продажи
			</p>
		</a>
		<ul class="nav nav-treeview">
			<li class="nav-item "> 
				<a href="/documentSales/index" class="nav-link">
					<i class="far fas fa-file nav-icon"></i>
					<p>Список документов</p>
				</a>
			</li>
			<li class="nav-item ">
				<a href="/documentSales/add" class="nav-link">
					<i class="far fas fa-file nav-icon"></i>
					<p>Добавить документ</p>
				</a>
			</li>
		</ul>
	</li>	
		  
  </ul>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
      Simple Link
      <span class="right badge badge-danger">New</span>
    </p>
  </a>
</li>
