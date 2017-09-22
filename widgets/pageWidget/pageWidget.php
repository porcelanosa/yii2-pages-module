<?php
    /**
     * Created by PhpStorm.
     * User: User
     * Date: 22.09.2017
     * Time: 0:44
     */
    
    namespace common\modules\pages\widgets\pageWidget;
    
    use yii\base\Widget;
    
    use Yii;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Url;
    use yii\helpers\Html;
    
    use common\modules\pages\models\Pages;
    
    class pageWidget extends Widget
    {
        public $alias;
        public $showCaption = false;
        public $captionTag = 'h1';
        public $contentBlockClass = 'page-content';
        
        public function run()
        {
            $page = Pages::find()->where(['page_alias' => $this->alias])->one();
            echo $this->showCaption?Html::tag($this->captionTag, $page->caption):'';
            echo Html::tag('div', $page->text, ['class'=>$this->contentBlockClass]);
        }
    }