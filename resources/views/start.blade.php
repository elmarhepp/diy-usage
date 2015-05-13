@extends('layout')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="xxx">
                <h2>DIY Usage Statistics</h2>

                <div class="row">
                    <div class="col-xs-3">Installed Shops: {{ $installedShops }}</div>
                    <div class="col-xs-3">Uninstalled Shops: {{ $uninstalledShops }}</div>
                </div>
                <br>

                <h3>List of shops and app usage</h3>

                <div>
                    <div class="col-fixed">
                        <select class="form-control" id="countResults">
                            <option>5</option>
                            <option>10</option>
                            <option>20</option>
                            <option selected>50</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="col-fixed2">
                        <select class="form-control" id="sortResults">
                            <option>ID</option>
                            <option>Shop</option>
                            <option>Last activity</option>
                            <option>Api orders</option>
                            <option>Email orders</option>
                            <option>Store orders</option>
                            <option>Country</option>
                        </select>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="installedShops"> Show installed shops
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="unInstalledShops"> Show uninstalled shops
                        </label>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shop</th>
                        <th>Country/City</th>
                        <th>Api orders</th>
                        <th>Email orders</th>
                        <th>Store orders</th>
                        <th>Last activity</th>
                        <th>Installed</th>
                        <th>Install date</th>
                    </tr>
                    </thead>
                    <tbody id="shopDetails">
                    @foreach($allShops as $shop)
                        <tr>
                            <td>{{$shop->id}}</td>
                            <td>{{$shop->shop}} - {{$shop->email}}</td>
                            <td>{{$shop->country}} - {{$shop->province}} - {{$shop->city}}</td>
                            <td>{{$shop->count_api_order}}</td>
                            <td>{{$shop->count_email_order}}</td>
                            <td>{{$shop->count_storefront_order}}</td>
                            <td>{{$shop->last_active}}</td>
                            <td>{{$shop->installed}}</td>
                            <td>{{$shop->install_date}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

            <input type="hidden" id="shopURL" value="{{ $shopURL }}">

        </div>
    </div>

@stop
