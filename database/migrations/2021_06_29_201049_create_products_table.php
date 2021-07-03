<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->string('cidade')->primary();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('codProduto');
            $table->char('nomeProduto',20);
            $table->decimal('valorProduto', $precision=5, $scale=2);
            $table->integer('estoque'); 
            $table->string('nomeCidade');                  
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('nomeCidade')->references('cidade')->on('cities');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
