<?php
    /**
     * Created by PhpStorm.
     * User: User
     * Date: 20.09.2017
     * Time: 15:30
     */
    /**
     * @var $page \common\modules\pages\models\Pages
     */
    $this->title = $page->title;
    $this->registerMetaTag([
        'name'    => 'description',
        'content' => $page->meta_descr != '' ? $page->meta_descr : $page->caption
    ]);
    ?>
    
    <h1><?=$page->caption;?></h1>
    <div class="page-content">
        <?=$page->text?>
    </div>