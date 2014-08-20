
<?php
    if($model->isNewRecord){
        $submitText = 'Create';
        $url = 'telephoneCreate/';
    }else{
        $submitText = 'Save';
        $url = 'telephoneUpdate/'.$model['id_telephone'];
    }
?>

<div class="form">

<form id="telephone-form" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/<?php echo $url; ?>" method="post">
    <div class="row">
        <label for="Telephone_number">Number</label>
        <input size="60" maxlength="45" name="Telephone[number]" id="Telephone_number" type="text" value="<?php echo $model['number']; ?>">
    </div>

    <div class="row">
        <label for="Telephone_description">Description</label>
        <input size="60" maxlength="255" name="Telephone[description]" id="Telephone_description" type="text" value="<?php echo $model['description']; ?>">
    </div>
    <div class="row">
        <label for="Telephone_id_church" class="required">Id Church</label>
        <input name="Telephone[id_church]" id="Telephone_id_church" type="text" value="<?php echo $model['id_church']; ?>">
    </div>
    <div class="row buttons">
        <input type="submit" name="yt0" value="<?php echo $submitText ?>">
    </div>

</form>
</div>