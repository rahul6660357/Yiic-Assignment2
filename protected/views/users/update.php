<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->users_id=>array('view','id'=>$model->users_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->users_id)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Update Users <?php echo $model->users_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>