@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','order_detail')->first()->custom_text }}</title>
@endsection
@section('admin-content')
<h1 class="h3 mb-2 text-gray-800"><a href="{{ route('admin.order') }}" class="btn btn-success"><i class="fas fa-backward" aria-hidden="true"></i> {{ $websiteLang->where('lang_key','go_back')->first()->custom_text }} </a></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $websiteLang->where('lang_key','order_detail')->first()->custom_text }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">

                   <tr>
                       <td>{{ $websiteLang->where('lang_key','agent')->first()->custom_text }}</td>
                       <td>{{ $order->user->name }}</td>
                   </tr>
                   <tr>
                       <td>{{ $websiteLang->where('lang_key','email')->first()->custom_text }}</td>
                       <td>{{ $order->user->email }}</td>
                   </tr>
                   <tr>
                       <td>{{ $websiteLang->where('lang_key','package_name')->first()->custom_text }}</td>
                       <td>{{ $order->package->package_name }}</td>
                   </tr>

                   <tr>
                       <td>{{ $websiteLang->where('lang_key','amount')->first()->custom_text }}</td>
                       <td>{{ $order->currency_icon }}{{ $order->amount_real_currency }}</td>
                   </tr>

                   <tr>
                       <td>{{ $websiteLang->where('lang_key','payment_method')->first()->custom_text }}</td>
                       <td>{{ $order->payment_method }}</td>
                   </tr>
                   <tr>
                       <td>{{ $websiteLang->where('lang_key','trans_id')->first()->custom_text }}</td>
                       <td>{!! clean(nl2br(e($order->transaction_id))) !!} </td>
                   </tr>
                   <tr>
                       <td>{{ $websiteLang->where('lang_key','purchase_date')->first()->custom_text }}</td>
                       <td>{{ $order->purchase_date }}</td>
                   </tr>
                   <tr>
                       <td>{{ $websiteLang->where('lang_key','expired_date')->first()->custom_text }}</td>
                       <td>
                            @if ($order->expired_date==null)
                                <span class="badge badge-success">{{ $websiteLang->where('lang_key','unlimited')->first()->custom_text }}</span>
                            @else
                            {{ $order->expired_date }}
                            @endif
                       </td>
                   </tr>
                   <tr>
                       <td>{{ $websiteLang->where('lang_key','status')->first()->custom_text }}</td>
                       <td>
                        @if ($order->status==1)
                            @if ($order->expired_date==null)
                                <span class="badge badge-success">{{ $websiteLang->where('lang_key','active')->first()->custom_text }}</span>
                            @else
                                @if (date('Y-m-d') < $order->expired_date)
                                <span class="badge badge-success">{{ $websiteLang->where('lang_key','active')->first()->custom_text }}</span>
                                @else
                                <span class="badge badge-danger">{{ $websiteLang->where('lang_key','expired')->first()->custom_text }}</span>
                                @endif
                            @endif
                        @else
                        <span class="badge badge-danger">{{ $websiteLang->where('lang_key','expired')->first()->custom_text }}</span>
                        @endif
                    </td>
                   </tr>



                </table>

                <a href="{{ route('admin.order-delete',$order->id) }}" class="btn btn-danger">{{ $websiteLang->where('lang_key','delete')->first()->custom_text }}</a>

            </div>
        </div>
    </div>
@endsection
