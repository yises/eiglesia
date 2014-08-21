
<?php
    if($model->isNewRecord){
        $submitText = 'Create';
        $url = 'poboxCreate/';
    }else{
        $submitText = 'Save';
        $url = 'poboxUpdate/'.$model['id_pobox'];
    }
?>

<div class="form">
<form id="pobox-form" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/<?php echo $url; ?>" method="post">

    <div class="row">
        <label for="Pobox_data">data</label>
        <input size="60" maxlength="45" name="Pobox[data]" id="Pobox_data" type="text" value="<?php echo $model['data']; ?>">
    </div>

    <div class="row">
        <label for="Pobox_zipcode">zipcode</label>
        <input size="60" maxlength="45" name="Pobox[zipcode]" id="Pobox_zipcode" type="text" value="<?php echo $model['zipcode']; ?>">
    </div>
    <div class="row">
        <label for="Pobox_id_church">Id Church</label>
        <input name="Pobox[id_church]" id="Pobox_id_church" type="text" value="<?php echo $model['id_church']; ?>">
    </div>
    <div class="row buttons">
        <input type="submit" name="yt0" value="<?php echo $submitText ?>">
    </div>
</form>
</div>