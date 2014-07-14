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

<h1>Churches</h1>
<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'church/church_view',
)); ?>