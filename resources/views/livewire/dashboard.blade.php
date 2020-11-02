<div class="col-xl-9 col-md-8">
    <h4 class="widget-title">Dashboard</h4>
    <div class="row">
        <div class="col-lg-4">
            <a href="javascript:void(0)" class="dash-widget dash-bg-1" style="">
                <span class="dash-widget-icon">{{ Auth::user()->children->count() }}</span>
                <div class="dash-widget-info">
                    <span>Directos</span>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a href="javascript:void(0)" class="dash-widget dash-bg-2" style="">
                <span class="dash-widget-icon">{{$users_down_count}}</span>
                <div class="dash-widget-info">
                    <span>Total</span>
                </div>
            </a>
        </div>
        {{-- <div class="col-lg-4">
            <a href="notifications.html" class="dash-widget dash-bg-3" style="">
                <span class="dash-widget-icon">8</span>
                <div class="dash-widget-info">
                    <span>Notification</span>
                </div>
            </a>
        </div> --}}
    </div>
    <div class="card mb-0">
        <div class="row no-gutters">
            <div class="col-lg-8">
                <div class="card-body">
                    <h6 class="title">Detalles</h6>
                    <div class="sp-plan-name">
                        <h6 class="title">
                            Usuario <span class="badge badge-success badge-pill">Activo</span>
                        </h6>
                        <p>Subscription ID: <span class="text-base">{{ Auth::user()->id }}</span></p>
                        <p>Link Registro: <span class="text-base">{{Auth::user()->url_for_register}}</span></p>
                    </div>
                    {{-- <ul class="row">
                        <li class="col-6 col-lg-6">
                            <p>Started On 15 Jul, 2020</p>
                        </li>
                        <li class="col-6 col-lg-6">
                            <p>Price $1502.00</p>
                        </li>
                    </ul> --}}
                    {{-- <h6 class="title">Last Payment</h6>
                    <ul class="row">
                        <li class="col-sm-6">
                            <p>Paid at 15 Jul 2020</p>
                        </li>
                        <li class="col-sm-6">
                            <p><span class="text-success">Paid</span> <span class="amount">$1502.00</span>
                            </p>
                        </li>
                    </ul> --}}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sp-plan-action card-body">
                    {{-- <div class="mb-2">
                        <a href="provider-subscription.html" class="btn btn-primary" style=""><span>Change
                                Plan</span></a>
                    </div>
                    <div class="next-billing">
                        <p>Next Billing on <span>15 Jul, 2021</span></p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
