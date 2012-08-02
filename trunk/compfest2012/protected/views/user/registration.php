<?php 
$this->breadcrumbs=array(
	"Daftar",
);
?>

<h1><?php echo "Daftar"; ?></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>
	
	<?php echo $form->errorSummary(array($model,$profile));?>
	
	<div class="row">
	<?php echo $form->label($model,'username'); ?>
	<?php echo $form->textField($model,'username'); ?>
	<?php echo $form->error($model,'username'); ?>
	</div>
	
	<div class="row">
	<?php echo $form->label($model,'password'); ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	</div>
	
	<div class="row">
	<?php echo $form->label($model,'verifyPassword'); ?>
	<?php echo $form->passwordField($model,'verifyPassword'); ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo $form->label($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->field_type=="DATE"){
			$tempdate=$field->varname;
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'language'=>'en',
			'model'=>$profile,
			'name'=>'Profiles['.$field->varname.']',
			'id'=>'Profiles_'.$field->varname,
			'value'=>$profile->$tempdate,
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'yy-mm-dd',
				'defaultDate'=>'$( ".selector" ).datepicker( "option", "defaultDate", -18y );',
			),
		));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			if ($field->varname=="hp")
			{
				echo $form->textField($profile,$field->varname,array('value'=>'+62','size'=>50,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
			else
			{
				echo $form->textField($profile,$field->varname,array('size'=>50,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	<div class="row submit">
		<?php echo CHtml::submitButton("Mendaftar"); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>