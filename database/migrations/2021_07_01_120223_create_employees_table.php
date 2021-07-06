<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string( 'store_view_code')->nullable();
            $table->string( 'attribute_set_code')->default('Default');
            $table->string('product_type')->default('Simple'); 
            $table->string ('categories')->nullable();
            $table->string('product_websites')->nullable();
            $table->string('name');
            $table->text( 'description');
            $table->text('short_description');
            $table->integer('weight');
            $table->integer('product_online')->default('1'); 
            $table->string('tax_class_name')->default('Taxable Goods'); 
            $table->string('visibility')->default('Catalog, Search'); 
            $table->integer('price'); 
            $table->integer('special_price')->nullable(); 
            $table->string('special_price_from_date')->nullable(); 
            $table->string('special_price_to_date')->nullable();
            $table->string('url_key')->nullable(); 
            $table->text('meta_title'); 
            $table->string('meta_keywords'); 
            $table->string('meta_description'); 
            $table->string('created_at')->nullable(); 
            $table->string('updated_at')->nullable();
            $table->string('new_from_date')->nullable(); 
            $table->string('new_to_date')->nullable(); 
            $table->string('display_product_options_in')->default('Block after Info Column'); 
            $table->integer('map_price')->nullable(); 
            $table->integer('msrp_price')->nullable();
            $table->string('map_enabled')->nullable(); 
            $table->string('gift_message_available')->default('No'); 
            $table->string('custom_design')->nullable(); 
            $table->string('custom_design_from')->nullable(); 
            $table->string('custom_design_to')->nullable(); 
            $table->string('custom_layout_update')->nullable(); 
            $table->string('page_layout')->nullable(); 
            $table->string('products_options_container')->nullable(); 
            $table->string('msrp_display_actual_price_type')->default('Use config'); 
            $table->string('country_of_manufacture')->nullable(); 
            $table->string('additional_attributes')->nullable(); 
            $table->integer('qty')->default('1000'); 
            $table->integer('out_of_stock_qty')->default('0'); 
            $table->integer('use_config_min_qty')->default('1'); 
            $table->integer ('is_qty_decimal')->default('0'); 
            $table->integer('allow_backorders')->default('0'); 
            $table->integer('use_config_backorders')->default('1'); 
            $table->integer('min_cart_qty')->default('1'); 
            $table->integer('use_config_min_sale_qty')->default('1'); 
            $table->integer('max_cart_qty')->default('1000'); 
            $table->integer('use_config_max_sale_qty')->default('1'); 
            $table->integer('is_in_stock')->default('1');	
            $table->integer('notify_on_stock_below')->default('1'); 
            $table->integer('use_config_notify_stock_qty')->default('1');
            $table->integer('manage_stock')->default('1'); 
            $table->integer('use_config_manage_stock')->default('1'); 
            $table->integer('use_config_qty_increments')->default('1'); 
            $table->integer('qty_increments')->default('1'); 
            $table->integer('use_config_enable_qty_inc')->default('1'); 
            $table->integer('enable_qty_increments')->default('0'); 
            $table->integer('is_decimal_divided')->default('0'); 
            $table->integer('website_id')->default('0'); 
            $table->integer('deferred_stock_update')->default('0'); 	
            $table->string('use_config_deferred_stock_update')->nullable(); 	
            $table->string('related_skus')->nullable(); 	
            $table->string('crosssell_skus')->nullable(); 	
            $table->string('upsell_skus')->nullable(); 	
            $table->string('hide_from_product_page')->nullable(); 	
            $table->string('custom_options')->nullable(); 	
            $table->string('bundle_price_type')->nullable(); 
            $table->string('bundle_sku_type')->nullable();	
            $table->string('bundle_price_view')->nullable(); 	
            $table->string('bundle_weight_type')->nullable();
            $table->string ('bundle_values')->nullable();
            $table->string ('associated_skus')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
