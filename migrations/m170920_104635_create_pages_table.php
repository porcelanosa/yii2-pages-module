<?php
    
    use yii\db\Migration;
    
    /**
     * Handles the creation of table `pages`.
     */
    class m170920_104635_create_pages_table extends Migration
    {
        /**
         * @inheritdoc
         */
        public function up()
        {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
            }
            $this->createTable('{{%pages}}', [
                'id'         => $this->primaryKey(),
                'parent_id'  => $this->integer()->defaultValue(null),
                'title'      => $this->string(255),
                'slug'      => $this->string(255),
                'page_name' => $this->string(255),
                'page_alias' => $this->string(255),
                'meta_descr' => $this->string(255),
                'caption'    => $this->string(255),
                'short_text' => $this->text(),
                'text'       => $this->text(),
                'updated_at' => $this->integer()->defaultValue(null),
                'created_at' => $this->integer()->defaultValue(null),
                'sort'       => $this->integer()->defaultValue(null),
                'active'     => $this->integer()->defaultValue(1),
            
            ], $tableOptions);
        }
        
        /**
         * @inheritdoc
         */
        public function down()
        {
            $this->dropTable('{{%pages}}');
        }
    }
