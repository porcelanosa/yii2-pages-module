<?php
    /**
     * Created by PhpStorm.
     * User: User
     * Date: 22.09.2017
     * Time: 0:44
     */
    
    namespace common\modules\pages\widgets\pageTitleWidget;
    
    use yii\base\Widget;
    
    use Yii;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Url;
    use yii\helpers\Html;
    
    use common\modules\pages\models\Pages;
    
    class pageTitleWidget extends Widget
    {
        public $alias;
        
        public function run()
        {
            $page = Pages::find()->where(['page_alias' => $this->alias])->one();
            return $page->title;
        }
    }