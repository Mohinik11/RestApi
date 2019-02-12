<?php

use Phinx\Migration\AbstractMigration;

class FkRelationBetweenCartProductsAndUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {           
        $this->table('basket')
            ->addForeignKey('product_id', 'products', 'id', array('delete'=> 'CASCADE'))
            ->addForeignKey('user_id', 'users', 'id', array('delete'=> 'CASCADE'))
            ->save();
    }

    public function down()
    {
        $this->table('basket')
            ->dropForeignKey('product_id')
            ->dropForeignKey('user_id');
    }
}
