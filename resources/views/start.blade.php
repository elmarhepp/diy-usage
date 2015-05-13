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

                <form class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="countResults" class="col-sm-6 control-label">Number of results</label>

                                <div class="col-sm-3">
                                    <select class="form-control" id="countResults">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>20</option>
                                        <option selected>50</option>
                                        <option>100</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="sortResults" class="col-sm-6 control-label">Sort results</label>

                                <div class="col-sm-5">
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
                            </div>
                        </div>

                        <div class="col-sm-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="installedShops"> Show installed shops
                                </label>
                            </div>

                        </div>
                        <div class="col-sm-2">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="unInstalledShops"> Show uninstalled shops
                                </label>
                            </div>
                        </div>

                    </div>
                </form>

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
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        </div>
    </div>

@stop
