<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Created by PhpStorm.
 * 
 * User: elmarhepp
 * Date: 14/12/14
 * Time: 18:54
 *
 * @property-read \Authorization $shop
 * @property integer $id
 * @property integer $shop_id
 * @property string $shopify_shop_id
 * @property string $currency
 * @property string $email
 * @property string $country
 * @property string $money_format
 * @property string $city
 * @property string $zip
 * @property string $address
 * @property string $name
 * @property string $domain
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class ShopInfo extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'shop_info';

    protected $fillable = array('shop_id', 'shopify_shop_id', 'currency', 'money_format', 'email', 'country',
        'city', 'zip', 'address', 'name', 'domain', 'taxes_included', 'tax_shipping', 'county_taxes',
        'province', 'province_code');

    public function shop()
    {
        return $this->belongsTo('Authorization', 'id', 'shop_id');
    }

} 