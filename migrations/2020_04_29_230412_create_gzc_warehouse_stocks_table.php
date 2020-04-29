<?php

use Hyperf\Database\Schema\Schema;
use Hyperf\Database\Schema\Blueprint;
use Hyperf\Database\Migrations\Migration;

class CreateGzcWarehouseStocksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_warehouse_stocks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->integer('store_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->char('pro_sku');
            $table->integer('stock_num');
            $table->integer('freeze_num');
            $table->integer('disabled_num');
            $table->integer('block_num');
            $table->integer('inbound_diff_num');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gzc_warehouse_stocks');
    }
}
