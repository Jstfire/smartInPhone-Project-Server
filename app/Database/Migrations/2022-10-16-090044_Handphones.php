<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Handphones extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'phone_photo' => [
                'type' => 'longblob'
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'network' => [
                'type' => 'TEXT'
            ],
            'launch' => [
                'type' => 'datetime'
            ],
            'body' => [
                'type' => 'TEXT'
            ],
            'display' => [
                'type' => 'TEXT'
            ],
            'platform' => [
                'type' => 'TEXT'
            ],
            'memory' => [
                'type' => 'TEXT'
            ],
            'maincam' => [
                'type' => 'TEXT'
            ],
            'selfcam' => [
                'type' => 'TEXT'
            ],
            'sound' => [
                'type' => 'TEXT'
            ],
            'comms' => [
                'type' => 'TEXT'
            ],
            'features' => [
                'type' => 'TEXT'
            ],
            'battery' => [
                'type' => 'TEXT'
            ],
            'tests' => [
                'type' => 'TEXT'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('handphones');
    }

    public function down()
    {
        //
    }
}
