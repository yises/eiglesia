
<?php
    if($model->isNewRecord){
        $submitText = 'Create';
        $url = 'addressCreate/';
    }else{
        $submitText = 'Save';
        $url = 'addressUpdate/'.$model['id_address'];
    }
?>


<div class="form">

<form id="address-form" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/<?php echo $url; ?>" method="post">
    <div class="row">
        <label for="Address_name">Name</label>
        <input size="60" maxlength="255" name="Address[name]" id="Address_name" type="text" value="<?php echo $model['name']; ?>">
    </div>

    <div class="row">
        <label for="Address_street">Street</label>
        <input size="60" maxlength="255" name="Address[street]" id="Address_street" type="text" value="<?php echo $model['street']; ?>">
    </div>

    <div class="row">
        <label for="Address_number">Number</label>
        <input size="45" maxlength="45" name="Address[number]" id="Address_number" type="text" value="<?php echo $model['number']; ?>">
    </div>

    <div class="row">
        <label for="Address_zipcode">Zipcode</label>
        <input size="45" maxlength="45" name="Address[zipcode]" id="Address_zipcode" type="text" value="<?php echo $model['zipcode']; ?>">
    </div>

    <div class="row">
        <label for="Address_latitude">Latitude</label>
        <input size="45" maxlength="45" name="Address[latitude]" id="Address_latitude" type="text" value="<?php echo $model['latitude']; ?>">
    </div>

    <div class="row">
        <label for="Address_longitude">Longitude</label>
        <input size="45" maxlength="45" name="Address[longitude]" id="Address_longitude" type="text" value="<?php echo $model['longitude']; ?>">
    </div>

    <div class="row">
        <label for="Address_image">Image</label>
        <input size="60" maxlength="255" name="Address[image]" id="Address_image" type="text" value="">
    </div>

    <div class="row">
        <label for="Address_is_active">Is Active</label>
        <input name="Address[is_active]" id="Address_is_active" type="text" value="<?php echo $model['is_active']; ?>">
    </div>

    <div class="row">
        <label for="Address_id_church" class="required">Id Church</label>
        <input name="Address[id_church]" id="Address_id_church" type="text" value="<?php echo $model['id_church']; ?>">
    </div>

    <div class="row">
        <label for="Address_id_municipality" class="required">Id Municipality</label>
        <input name="Address[id_municipality]" id="Address_id_municipality" type="text" value="<?php echo $model['id_municipality']; ?>">
    </div>

    <div class="row">
        <label for="Address_id_province" class="required">Id Province</label>
        <input name="Address[id_province]" id="Address_id_province" type="text" value="<?php echo $model['id_province']; ?>">
    </div>

    <div class="row buttons">
        <input type="submit" name="yt0" value="<?php echo $submitText ?>">
    </div>

</form>
</div>