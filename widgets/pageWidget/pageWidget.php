<?php
    /**
     * Created by PhpStorm.
     * User: User
     * Date: 22.09.2017
     * Time: 0:44
     */
    
    namespace common\modules\pages\widgets\pageWidget;
    
    use common\modules\pages\models\Pages;
    use Yii;
    use yii\base\Widget;
    use yii\helpers\Html;

    class pageWidget extends Widget
    {
        public $alias;
        public $showCaption = false;
        public $captionTag = 'h1';
        public $contentBlockClass = 'page-content';
        public $host = "";
        
        public function run()
        {
            $page = Pages::find()->where(['page_alias' => $this->alias])->one();
            if($this->host==""){
	            $this->host = Yii::$app->request->hostInfo;
            }
	        Yii::$app->view->registerLinkTag( [ 'rel' => 'canonical', 'href' => str_replace('http://','https://',$this->host).'/'.$page->slug ] );
            Yii::$app->view->registerMetaTag([
		        'name' => 'description',
		        'content' => $page->meta_descr,
	        ]);
	        
            echo $this->showCaption?Html::tag($this->captionTag, $page->caption):'';
            echo Html::tag('div', $page->text, ['class'=>$this->contentBlockClass]);
        }
    }
