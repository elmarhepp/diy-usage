<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class UsageStatistics extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'usage_statistics';

    protected $fillable = array('shop_id', 'start_page_hits', 'new_order_page_hits', 'settings_page_hits',
        'count_api_order', 'count_email_order', 'count_storefront_order', 'count_errors');


}

