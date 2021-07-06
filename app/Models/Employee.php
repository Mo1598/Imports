<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $guarded = [];

    public function importToDB()
    {
        $path = resource_path('pending-uploads/*.csv');
        $g = glob($path);

        foreach (array_slice($g, 0, 1) as $file) {
            $data = array_map('str_getcsv', file($file));
            foreach ($data as $row) {
                //dd($data);
                self::updateOrCreate([
                    'sku' => $row['0'],
                    'store_view_code' => $row['1'],
                    'attribute_set_code' => $row['2'],
                    'product_type' => $row['3'],
                    'categories' => $row['4'],
                    'product_websites' => $row['5'],
                    'name' => $row['6'],
                    'description' => $row['7'],
                    'short_description' => $row['8'],
                    'weight' => $row['9'],
                    'product_online' => $row['10'],
                    'tax_class_name' => $row['11'],
                    'visibility' => $row['12'],
                    'price' => $row['13'],
                    'special_price' => $row['14'],
                    'special_price_from_date' => $row['15'],
                    'special_price_to_date' => $row['16'],
                    'url_key' => $row['17'],
                    'meta_title' => $row['18'],
                    'meta_keywords' => $row['19'],
                    'meta_description' => $row['20'],
                    'created_at' => $row['21'],
                    'updated_at' => $row['22'],
                    'new_from_date' => $row['23'],
                    'new_to_date' => $row['24'],
                    'display_product_options_in' => $row['25'],
                    'map_price' => $row['26'],
                    'msrp_price' => $row['27'],
                    'map_enabled' => $row['28'],
                    'gift_message_available' => $row['29'],
                    'custom_design' => $row['30'],
                    'custom_design_from' => $row['31'],
                    'custom_design_to' => $row['32'],
                    'custom_layout_update' => $row['33'],
                    'page_layout' => $row['34'],
                    'products_options_container' => $row['35'],
                    'msrp_display_actual_price_type' => $row['36'],
                    'country_of_manufacture' => $row['37'],
                    'additional_attributes' => $row['38'],
                    'qty' => $row['39'],
                    'out_of_stock_qty' => $row['40'],
                    'use_config_min_qty' => $row['41'],
                    'is_qty_decimal' => $row['42'],
                    'allow_backorders' => $row['43'],
                    'use_config_backorders' => $row['44'],
                    'min_cart_qty' => $row['45'],
                    'use_config_min_sale_qty' => $row['46'],
                    'max_cart_qty' => $row['47'],
                    'use_config_max_sale_qty' => $row['48'],
                    'is_in_stock' => $row['49'],
                    'notify_on_stock_below' => $row['50'],
                    'use_config_notify_stock_qty' => $row['51'],
                    'manage_stock' => $row['52'],
                    'use_config_manage_stock' => $row['53'],
                    'use_config_qty_increments' => $row['54'],
                    'qty_increments' => $row['55'],
                    'use_config_enable_qty_inc' => $row['56'],
                    'enable_qty_increments' => $row['57'],
                    'is_decimal_divided' => $row['58'],
                    'website_id' => $row['59'],
                    'deferred_stock_update' => $row['60'],
                    'use_config_deferred_stock_update' => $row['61'],
                    'related_skus' => $row['62'],
                    'crosssell_skus' => $row['63'],
                    'upsell_skus' => $row['64'],
                    'hide_from_product_page' => $row['65'],
                    'custom_options' => $row['66'],
                    'bundle_price_type' => $row['67'],
                    'bundle_sku_type' => $row['68'],
                    'bundle_price_view' => $row['69'],
                    'bundle_weight_type' => $row['70'],
                    'bundle_values' => $row['71'],
                    'associated_skus' => $row['72']

                ]);
            }
            unlink($file);
        }
        return;
    }
    public function importDB($data)
    {
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                $dataInRow =    explode(',', $value);
                //dd($dataInRow);
                foreach ($dataInRow as $key => $value) {
                    self::updateOrCreate([
                        'sku' => $row['0'],
                        'store_view_code' => $row['1'],
                        'attribute_set_code' => $row['2'],
                        'product_type' => $row['3'],
                        'categories' => $row['4'],
                        'product_websites' => $row['5'],
                        'name' => $row['6'],
                        'description' => $row['7'],
                        'short_description' => $row['8'],
                        'weight' => $row['9'],
                        'product_online' => $row['10'],
                        'tax_class_name' => $row['11'],
                        'visibility' => $row['12'],
                        'price' => $row['13'],
                        'special_price' => $row['14'],
                        'special_price_from_date' => $row['15'],
                        'special_price_to_date' => $row['16'],
                        'url_key' => $row['17'],
                        'meta_title' => $row['18'],
                        'meta_keywords' => $row['19'],
                        'meta_description' => $row['20'],
                        'created_at' => $row['21'],
                        'updated_at' => $row['22'],
                        'new_from_date' => $row['23'],
                        'new_to_date' => $row['24'],
                        'display_product_options_in' => $row['25'],
                        'map_price' => $row['26'],
                        'msrp_price' => $row['27'],
                        'map_enabled' => $row['28'],
                        'gift_message_available' => $row['29'],
                        'custom_design' => $row['30'],
                        'custom_design_from' => $row['31'],
                        'custom_design_to' => $row['32'],
                        'custom_layout_update' => $row['33'],
                        'page_layout' => $row['34'],
                        'products_options_container' => $row['35'],
                        'msrp_display_actual_price_type' => $row['36'],
                        'country_of_manufacture' => $row['37'],
                        'additional_attributes' => $row['38'],
                        'qty' => $row['39'],
                        'out_of_stock_qty' => $row['40'],
                        'use_config_min_qty' => $row['41'],
                        'is_qty_decimal' => $row['42'],
                        'allow_backorders' => $row['43'],
                        'use_config_backorders' => $row['44'],
                        'min_cart_qty' => $row['45'],
                        'use_config_min_sale_qty' => $row['46'],
                        'max_cart_qty' => $row['47'],
                        'use_config_max_sale_qty' => $row['48'],
                        'is_in_stock' => $row['49'],
                        'notify_on_stock_below' => $row['50'],
                        'use_config_notify_stock_qty' => $row['51'],
                        'manage_stock' => $row['52'],
                        'use_config_manage_stock' => $row['53'],
                        'use_config_qty_increments' => $row['54'],
                        'qty_increments' => $row['55'],
                        'use_config_enable_qty_inc' => $row['56'],
                        'enable_qty_increments' => $row['57'],
                        'is_decimal_divided' => $row['58'],
                        'website_id' => $row['59'],
                        'deferred_stock_update' => $row['60'],
                        'use_config_deferred_stock_update' => $row['61'],
                        'related_skus' => $row['62'],
                        'crosssell_skus' => $row['63'],
                        'upsell_skus' => $row['64'],
                        'hide_from_product_page' => $row['65'],
                        'custom_options' => $row['66'],
                        'bundle_price_type' => $row['67'],
                        'bundle_sku_type' => $row['68'],
                        'bundle_price_view' => $row['69'],
                        'bundle_weight_type' => $row['70'],
                        'bundle_values' => $row['71'],
                        'associated_skus' => $row['72']
                    ]);
                }
            }
        }
        // dd('Edn');
        // foreach (array_slice($g, 0, 1) as $file) {
        //     $data = array_map('str_getcsv', file($file));
        //     //dd($data);


        //     unlink($file);
        // }
        return;
    }
}
