<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeederCustom extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Permission::generateFor('products');

        Permission::generateFor('coupons');

        Permission::generateFor('category');

        Permission::generateFor('category-product');

        Permission::generateFor('orders');
    }
}
