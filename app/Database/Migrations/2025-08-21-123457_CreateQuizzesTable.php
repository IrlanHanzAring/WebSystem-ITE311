<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuizzesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'lesson_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'question_text' => [
                'type'       => 'TEXT',
            ],
            'question_type' => [
                'type'       => 'ENUM',
                'constraint' => ['multiple_choice', 'true_false', 'short_answer'],
                'default'    => 'multiple_choice',
            ],
            'options' => [
                'type'       => 'JSON',
                'null'       => true,
                'comment'    => 'JSON array of possible answers',
            ],
            'correct_answer' => [
                'type'       => 'TEXT',
                'comment'    => 'Correct answer or JSON for multiple correct answers',
            ],
            'time_limit' => [
                'type'       => 'INT',
                'constraint' => 5,
                'null'       => true,
                'comment'    => 'Time limit in minutes',
            ],
            'points' => [
                'type'       => 'INT',
                'constraint' => 5,
                'default'    => 1,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('lesson_id', 'lessons', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('quizzes');
    }

    public function down()
    {
        $this->forge->dropTable('quizzes');
    }
}