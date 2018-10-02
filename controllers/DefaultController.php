<?php
    
    namespace common\modules\pages\controllers;
    
    use backend\controllers\BasebackendController as Controller;
    use common\modules\pages\models\Pages;
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;
    use yii\web\NotFoundHttpException;

    //use yii\web\Controller;

    /**
     * Default controller for the `pages` module
     */
    class DefaultController extends Controller
    {
	    /**
	     * @inheritdoc
	     */
	    public function behaviors()
	    {
		    return [
			    'access' => [
				    'class' => AccessControl::className(),
				    'only'  => ['logout', 'signup'],
				    'rules' => [
					    [
						    'actions' => ['signup'],
						    'allow'   => true,
						    'roles'   => ['?'],
					    ],
					    [
						    'actions' => ['logout'],
						    'allow'   => true,
						    'roles'   => ['@'],
					    ],
				    ],
			    ],
			    'verbs'  => [
				    'class'   => VerbFilter::className(),
				    'actions' => [
					    'logout' => ['post'],
				    ],
			    ],
		    ];
	    }
	    
	    
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
