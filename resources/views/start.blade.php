@extends('layout')

@section('content')

    <br><br>
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="xxx">
                <h2>DIY Usage Statistics</h2>

                <div class="row">
                    <div class="col-xs-2">Installed Shops: {{ $installedShops }}</div>
                    <div class="col-xs-2">Uninstalled Shops: {{ $uninstalledShops }}</div>
                </div>
                <br>

                <h3>List of shops and app usage</h3>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shop</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Api orders</th>
                        <th>Email orders</th>
                        <th>Storefront orders</th>
                        <th>Last activity</th>
                        <th>Installed</th>
                        <th>Install date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allShops as $shop)
                        <tr>
                            <td>{{$shop->id}}</td>
                            <td>{{$shop->shop}}</td>
                            <td>{{$shop->country}}</td>
                            <td>{{$shop->province}}</td>
                            <td>{{$shop->city}}</td>
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
        </div>
    </div>

@stop
