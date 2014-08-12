<?php
/* @var $this ChurchController */
/* @var $data Church */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_church')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id_church), array('view', 'id'=>$data->id_church)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_motherchurch')); ?>:</b>
    <?php echo CHtml::encode($data->id_motherchurch); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('numbermember')); ?>:</b>
    <?php echo CHtml::encode($data->numbermember); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('exists')); ?>:</b>
    <?php echo CHtml::encode($data->exists); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id_denomination')); ?>:</b>
    <?php echo CHtml::encode($data->id_denomination); ?>
    <br />


</div>