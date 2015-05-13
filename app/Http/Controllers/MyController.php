<?php namespace App\Http\Controllers;

use App\Models\Authorization;
use Log;
use DB;
use Input;
use App\MyClasses\ShopifyModel;

class MyController extends Controller
{
    private $shopifyModel;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->shopifyModel = new ShopifyModel();
    }

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


    /**
     * AJAX function to paginate product
     * @return array
     */
    public function shopPage()
    {
        $page = Input::get('page');
        $sortResults = Input::get('sortResults');
        $installedShops = Input::get('installedShops');
        $unInstalledShops = Input::get('unInstalledShops');


        $allShops = $this->shopifyModel->getShops($page, $sortResults, $installedShops, $unInstalledShops);
        $result = array(
            'allShops' => $allShops,
            'totalPages' => 1
        );

        $jsonResult = json_encode($result);
        Log::debug("shopPage: page = $page, jsonResult = $jsonResult");

        return $jsonResult;
    }



}
