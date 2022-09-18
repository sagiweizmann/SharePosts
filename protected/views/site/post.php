<?php
/* @var $this SiteController */
/* @var $model PostForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Share New Post';
$this->breadcrumbs=array(
	'Post',
);
?>
<?php if(Yii::app()->user->hasFlash('post')): ?>

<div class="alert alert-success">
<?php echo Yii::app()->user->getFlash('post'); 	?>
</div>
<?php else: ?>
<h1>Share New Post</h1>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'post-post-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<div style="height: 20px;"></div>

	<?php echo $form->textFieldRow($model,'title'); ?>

	<?php echo $form->textFieldRow($model,'body'); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Post',
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
