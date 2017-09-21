# Page Module
## Dependencies
```php
    use \kartik\switchinput\SwitchInput;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    
```
	"porcelanosa/yii2-toggle-column": "dev-master",
        
## Installation

1. Add module folder into 'common/modules/'
2. Add to _'common/config/main.php'_ 
```php 
'modules'    => [
    ...
    'pages' => [
           'class' => 'common\modules\pages\Module',
            ],
    ...
 ]
```
3. Add to _'backend/config/main.php_
```php
'module' => [
    ...
    
            'pages' => [
                'class' => 'common\modules\pages\Module',
                'controllerMap' => [
                    'admin' => [
                        'class' => 'common\modules\pages\controllers\AdminController',
                        'as access' => [
                            'class' => \yii\filters\AccessControl::className(),
                            'rules' => [
                                [
                                    'allow' => true,
                                    'roles' => ['admin'],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
    ],
    ...
```
4. Run migration
```
yii migrate --migrationPath=@common/modules/pages/migrations
```
5. Add rules to UrlManager
```php
// Pages
[ 'pattern' => '<slug>', 'route' => 'pages/default/view' ],
```
or different for route to _'pages/default/view'_