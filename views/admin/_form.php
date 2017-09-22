<?php
    
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    use \kartik\switchinput\SwitchInput;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    
    /* @var $this yii\web\View */
    /* @var $model common\modules\pages\models\Pages */
    /* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <? /*= $form->field($model, 'parent_id')->textInput() */ ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"><?=$form->field($model, 'caption')->textInput(['maxlength' => true])?></div>
        <div class="col-md-6"><?=$form->field($model, 'slug')->textInput(['maxlength' => true])?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?=$form->field($model, 'page_name')->textInput(['maxlength' => true])?></div>
        <div class="col-md-6"><?=$form->field($model, 'page_alias')->textInput(['maxlength' => true])?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?=$form->field($model, 'title')->textInput(['maxlength' => true])?></div>
        <div class="col-md-6"><?=$form->field($model, 'meta_descr')->textInput(['maxlength' => true])?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?=$form->field($model, 'short_text')->textarea(['rows' => 6])?></div>
        <div class="col-md-6"><?=$form->field($model, 'text')->widget(CKEditor::className(), [
                'editorOptions' => ElFinder::ckeditorOptions(
                    [
                        'elfinder',
                        'path' => Yii::getAlias('@userfiles')
                    ],
                    [
                        'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                        'inline' => false, //по умолчанию false
                    ]),
            ])
            ;?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?=$form->field($model, 'sort')->textInput()?></div>
        <div class="col-md-6"><?=$form->field($model, 'active')->widget(
                SwitchInput::className(),
                [
                    'type'          => SwitchInput::CHECKBOX,
                    'inlineLabel'   => true,
                    'pluginOptions' => [
                        'size'      => 'normal',
                        'labelText' => '<i class="glyphicon glyphicon-eye-open"></i>',
                        'onText'    => Yii::t('app', 'Показывать'),
                        'offText'   => Yii::t('app', 'Скрыть'),
                        /*'onColor' => 'aqua',
                        'offColor' => 'grey',*/
                    ],
                ]
            )
            ;?></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?=Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
            </div>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
