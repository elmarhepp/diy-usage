<?php namespace App\Http\Controllers;

use App\Models\Authorization;
use Log;
use DB;

class MyController extends Controller
{


    public function index()
    {
        Log::debug('MyController.index');


        $countInstalledShops = Authorization::whereRaw('installed = 1')->count();
        $countUninstalledShops = Authorization::whereRaw('installed = 0')->count();
        $countAllShops = Authorization::all()->count();

        //TODO
        $query = "select ";
        $query .= "a.id, a.shop, a.installed, a.updated_at install_date, ";
        $query .= "s.email, s.country, s.province, s.city, ";
        $query .= "u.count_api_order, u.count_email_order, u.count_storefront_order, u.updated_at last_active ";
        $query .= "from authorizations a ";
        $query .= "left join shop_info s ";
        $query .= "on a.id = s.shop_id ";
        $query .= "left join usage_statistics u ";
        $query .= "on a.id = u.shop_id";

        $allShops = DB::select($query);

        return view('start')
            ->with('installedShops', $countInstalledShops)
            ->with('uninstalledShops', $countUninstalledShops)
            ->with('countAllShops', $countAllShops)
            ->with('allShops', $allShops);
    }

}
