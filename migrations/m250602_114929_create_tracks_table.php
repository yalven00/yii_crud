<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tracks}}`.
 */
class m250602_114929_create_tracks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tracks}}', [
            'id' => $this->primaryKey(),
            'track_number' => $this->integer()->notNull()->unique(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);


         $this->execute("ALTER TABLE tracks ADD status ENUM ('new','in_progress','completed', 'failed', 'canceled');");

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tracks}}');
    }
}
