<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Carts extends Migration
{
    public function up()
    {
        // carts table
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'user_id'     => ['type' => 'INT'],
            'status'      => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'pending'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('carts');

        // cart_items table
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'auto_increment' => true],
            'cart_id'    => ['type' => 'INT'],
            'product_id' => ['type' => 'INT'],
            'quantity'   => ['type' => 'INT'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cart_items');
    }

    public function down()
    {
        $this->forge->dropTable('cart_items');
        $this->forge->dropTable('carts');
    }
}
