<?php
$this->breadcrumbs=array(
	'Materi'=>array('index'),
	'Create Kuliah',
);
?>

<div style="margin-left:20px; font-size:25px;padding-bottom:25px; ">Edit Materi</div>

<?php echo $this->renderPartial('_form_kuliah', array('model'=>$model,'model2'=>$model2)); ?>