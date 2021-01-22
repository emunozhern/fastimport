<div>
    <x-page-header title="Panel de administrador"></x-page-header>

    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-primary">
                            <i class="far fa-user"></i>
                        </span>
                        <div class="dash-widget-info">
                            <h3><span style="color: red; font-weight: bold">{{$users_count}}</span> /  <span style="color: green; font-weight: bold">{{$users_approved}}</span></h3>
                            <h6 class="text-muted">Usuarios</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-primary">
                            <i class="fas fa-user-shield"></i>
                        </span>
                        <div class="dash-widget-info">
                            <h3>{{ $network_level->level }}</h3>
                            <h6 class="text-muted">Network Level</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-primary">
                            <i class="fas fa-qrcode"></i>
                        </span>
                        <div class="dash-widget-info">
                            <h3>124</h3>
                            <h6 class="text-muted">Services</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-primary">
                            <i class="far fa-credit-card"></i>
                        </span>
                        <div class="dash-widget-info">
                            <h3>$11378</h3>
                            <h6 class="text-muted">Subscription</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
