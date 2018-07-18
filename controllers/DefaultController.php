<?php
    
    namespace common\modules\pages\controllers;
    
    use common\modules\pages\models\Pages;
    use backend\controllers\BasebackendController as Controller;
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;
    //use yii\web\Controller;
    use yii\web\NotFoundHttpException;
    
    /**
     * Default controller for the `pages` module
     */
    class DefaultController extends Controller
    {
        /**
         * Renders the index view for the module
         *
         * @return string
         */
        public function actionIndex()
        {
            return $this->render('index');
        }
        
        /**
         * Renders the index view for the module
         *
         * @return string
         * @throws NotFoundHttpException
         */
        public function actionView($slug)
        {
            $page = Pages::find()->where(['slug' => rtrim($slug, '/')])->andWhere('active=1')->one();
            if ($page) {
                return $this->render('view',
                    ['page' => $page]
                );
            } else {
                throw new NotFoundHttpException('Страница не найдена');
            }
        }
        
        
    }
