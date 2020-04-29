<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->users_id), array('view', 'id'=>$data->users_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_name')); ?>:</b>
	<?php echo CHtml::encode($data->users_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_email')); ?>:</b>
	<?php echo CHtml::encode($data->users_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_phone')); ?>:</b>
	<?php echo CHtml::encode($data->users_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('users_password')); ?>:</b>
	<?php echo CHtml::encode($data->users_password); ?>
	<br />


</div>