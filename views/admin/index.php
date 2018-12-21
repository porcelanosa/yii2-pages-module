<?php
	
	use kartik\grid\GridView;
	use yii\helpers\Html;
	use yii\widgets\Pjax;
	
	//use yii\grid\GridView;
	
	/* @var $this yii\web\View */
    /* @var $searchModel common\modules\pages\models\search\PagesSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */
    
    $this->title                   = 'Страницы';
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('Создать страницу', ['create'], ['class' => 'btn btn-success'])?>
    </p>
    <?php Pjax::begin(); ?>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel'  => $searchModel,

        'responsive'   => true,
        'striped'      => true,
        'hover'        => true,
        'export'       => false,
        'pjax'         => true,

        'layout'       => "{pager}\n{summary}\n{items}\n{summary}\n{pager}",
        'columns'      => [
            //['class' => 'yii\grid\SerialColumn'],
            
            //'id',
            //'parent_id',
            'page_name',
	        [
		        'attribute'      => 'page_name',
		        'content'        => function ($data) {
			        
			        return $data->page_name;
		        },
		        'contentOptions' => ['style' => 'width:250px; max-width:250px;'],
	        ],
            'caption',
            'title',
            'slug',
            //'meta_descr',
            // 'short_text:ntext',
            // 'text:ntext',
            // 'updated_at',
            // 'created_at',
            // 'sort',
            // 'active',
    
            [
                'class'          => 'porcelanosa\yii2togglecolumn\ToggleColumn',
                'attribute'      => 'active',
                // Uncomment if  you don't want AJAX
                'enableAjax'     => true,
                'contentOptions' => [ 'style' => 'width:150px;' ]
            ],
            
	        [
		        'class'          => 'yii\grid\ActionColumn',
		        'header'         => 'Действия',
		        'headerOptions'  => ['width' => '80'],
		        'contentOptions' => ['style' => 'width:60px; text-align:center'],
		        'template'       => '{update}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{delete}',
	        ],
        ],
    ]);?>
    <?php Pjax::end(); ?></div>
