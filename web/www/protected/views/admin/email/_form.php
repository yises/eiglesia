
<?php
    if($model->isNewRecord){
        $submitText = 'Create';
        $url = 'emailCreate/';
    }else{
        $submitText = 'Save';
        $url = 'emailUpdate/'.$model['id_email'];
    }
?>

<div class="form">

<form id="email-form" action="<?php echo Yii::app()->request->baseUrl; ?>/admin/<?php echo $url; ?>" method="post">
    <div class="row">
        <label for="Email_email">Email</label>
        <input size="60" maxlength="45" name="Email[email]" id="Email_email" type="text" value="<?php echo $model['email']; ?>">
    </div>

    <div class="row">
        <label for="Email_type">Type</label>
        <input size="60" maxlength="255" name="Email[type]" id="Email_type" type="text" value="<?php echo $model['type']; ?>">
    </div>
    <div class="row">
        <label for="Email_id_church" class="required">Id Church</label>
        <input name="Email[id_church]" id="Email_id_church" type="text" value="<?php echo $model['id_church']; ?>">
    </div>
    <div class="row buttons">
        <input type="submit" name="yt0" value="<?php echo $submitText ?>">
    </div>
</form>
</div>