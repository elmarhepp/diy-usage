<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;


class LogForHealthCheck extends Eloquent
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_for_heath_check';

    protected $fillable = array('shop_id', 'count_db_update', 'count_webhook_update');


}
