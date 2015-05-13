<?php namespace App\MyClasses;

use DB;
use Exception;
use Log;


/**
 * Class for the model methods of the shopify api
 * User: elmarhepp
 * Date: 13/05/15
 */
class ShopifyModel
{

    public function getShops($page, $sortResults = '', $installedShops = '', $unInstalledShops = '')
    {
        Log::debug("ShopifyModel.getShops for page=$page, sortResults=$sortResults, installedShops=$installedShops, unInstalledShops=$unInstalledShops.");

        try {
            $query = "select ";
            $query .= "a.id, a.shop, a.installed, a.updated_at install_date, ";
            $query .= "s.email, s.country, s.province, s.city, ";
            $query .= "u.count_api_order, u.count_email_order, u.count_storefront_order, u.updated_at last_active ";
            $query .= "from authorizations a ";
            $query .= "left join shop_info s ";
            $query .= "on a.id = s.shop_id ";
            $query .= "left join usage_statistics u ";
            $query .= "on a.id = u.shop_id ";

            // filter
            if (($installedShops == 'true') || ($unInstalledShops == 'true')) {
                $query .= "where ";
                if ($installedShops == 'true') {
                    $query .= "a.installed = 1 ";
                    if ($unInstalledShops == 'true') {
                        $query .= "or a.installed = 0 ";
                    }
                }
                if ($installedShops == 'false' && $unInstalledShops == 'true') {
                    $query .= " a.installed = 0 ";
                }
            }
            // sort
            if (!empty($sortResults)) {
                if ($sortResults == 'ID')
                    $query .= "order by a.id ";
                if ($sortResults == 'Shop')
                    $query .= "order by a.shop ";
                if ($sortResults == 'Last activity')
                    $query .= "order by u.updated_at desc ";
                if ($sortResults == 'Api orders')
                    $query .= "order by u.count_api_order desc ";
                if ($sortResults == 'Email orders')
                    $query .= "order by u.count_email_order desc ";
                if ($sortResults == 'Store orders')
                    $query .= "order by u.count_storefront_order desc ";
                if ($sortResults == 'Country')
                    $query .= "order by s.country, s.province, s.city ";
            }

            Log::debug("ShopifyModel.getShops query = $query");
            $allShops = DB::select($query);
            return $allShops;
        } catch (Exception $e) {
            Log::error("ShopifyModel.getShops Exception = " . $e->getMessage(), $e->getTraceAsString());
        }
        return null;
    }

}
