<?php

namespace common\modules\pages\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 * @property string $slug
 * @property string $page_name
 * @property string $page_alias
 * @property string $meta_descr
 * @property string $caption
 * @property string $short_text
 * @property string $text
 * @property integer $updated_at
 * @property integer $created_at
 * @property integer $sort
 * @property integer $active
 */
class Pages extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }
    public function behaviors()
    {
        return [
            /*[
                'class' => SluggableBehavior::className(),
                'attribute' => 'caption',
                'immutable' => true,
                'ensureUnique'=>true,
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],*/
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'updated_at', 'created_at', 'sort', 'active'], 'integer'],
            [['short_text', 'text', 'page_name', 'page_alias'], 'string'],
            [['slug'], 'unique'],
            [['slug', 'page_name'], 'required'],
            [['title', 'slug', 'meta_descr', 'caption'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская страница',
            'title' => 'Title',
            'slug' => 'ЧПУ - адрес страницу',
            'page_name' => 'Имя страницы',
            'page_alias' => 'Псевдоним страницы',
            'meta_descr' => 'Meta Descr',
            'caption' => 'Заголоовк',
            'short_text' => 'Короткий текст ',
            'text' => 'Text',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'sort' => 'Порядок вывода',
            'active' => 'Показывать',
        ];
    }
    
    
    /**
     * @inheritdoc
     * @return PagesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagesQuery(get_called_class());
    }
}
