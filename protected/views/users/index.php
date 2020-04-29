<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Signup', 'url'=>array('create')),

	
);
?>

<h1>Login</h1>

<?php $this->renderPartial('_login_form', array('model'=>$model)); ?>

<?php
