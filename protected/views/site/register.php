<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
$this->pageTitle=Yii::app()->name . ' - Register';
$this->breadcrumbs=array(
	'Register',
);
?>

<h1>Register</h1>

<?php if(Yii::app()->user->hasFlash('register')): ?>

<div class="alert alert-success">
<?php echo Yii::app()->user->getFlash('register'); 	?>
</div>
<?php endif; ?>
<?php
if(!Yii::app()->user->isGuest):?>
<div class="alert alert-block">
	<p>You already Logged in !</p>
</div>
<?php else: ?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'users-register-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldRow($model,'username',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>

		<?php echo $form->textFieldRow($model,'email',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>

		<?php echo $form->passwordFieldRow($model,'password',array('maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Register',
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>