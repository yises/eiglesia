<?php
/* @var $this ChurchController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Churches',
);

$this->menu=array(
    array('label'=>'Create Church', 'url'=>array('create')),
    array('label'=>'Manage Church', 'url'=>array('admin')),
);
?>

<div class="tamanyo960">
	<h1><span>Iglesias</span></h1>

	<?php $this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,
	    'itemView'=>'church/church_index_row',
	)); ?>
</div>