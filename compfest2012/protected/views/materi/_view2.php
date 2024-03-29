<div class="post">
	<div class="title">
		<div class="datebox">
			<span class="month"><?php echo date('M',$data->update_time); ?></span>
			<span class="date"><?php echo date('d',$data->update_time); ?></span>
		</div>
		<h2><?php echo CHtml::encode($data->title);
			  $profile=Profiles::model()->findByAttributes(array('user_id'=>$data->author->id));
		?></h2>
	</div>
	
	<div class="cover">
		<div class="entry">
			<?php
				$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
				echo $data->content;
				$this->endWidget();
			?>
		</div>
		<div class="clear"></div>
	</div>
	<div class="singleinfo">
		<span class="comm"> Ditulis  <?php echo ' pada ' . date('j F Y',$data->create_time); ?></span>
	</div>
</div>
