<div>
    {{-- {{ $charts }} --}}
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="row">
        <div class="col-12">
            <div class="card card-chart bg-dark">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">Total</h5>
                            <h2 class="card-title text-primary">Patients</h2>
                        </div>
                        {{-- <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">City</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Age</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-primary btn-simple" id="2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Occupation</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartBig1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart bg-dark">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="card-category">Life Style</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                @foreach($arr['c2'] as $tab)
                                {{-- @dd($tab) --}}
                            <label class="btn btn-sm btn-info btn-simple {{ $loop->first ? 'active' : '' }}" id="c2-{{ $loop->iteration -1 }}">
                                <input type="radio" name="options" {{ $loop->first ? 'checked' : '' }}>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">{{ $tab->alias }}</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            @endforeach
                            {{-- <label class="btn btn-sm btn-info btn-simple" id="c2-1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Toilet</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-info btn-simple" id="c2-2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Pet Animals</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-info btn-simple" id="c2-3">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Transfusion</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label> --}}
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title" style="color: #2483cf;">
                        {{-- <i class="tim-icons icon-bell-55"></i> --}}
                         0</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart bg-dark">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="card-category">Treatment History</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                @foreach($arr['c3'] as $tab)
                            <label class="btn btn-sm btn-info btn-simple {{ $loop->first ? 'active' : '' }}" id="c3-{{ $loop->iteration -1 }}">
                                <input type="radio" name="options" {{ $loop->first ? 'checked' : '' }}>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">{{ $tab->alias ?? $tab->question }}</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            @endforeach
                            {{-- <label class="btn btn-sm btn-info btn-simple" id="c3-1">
                                <input type="radio" class="d-none d-sm-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Compliance</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-gift-2"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-info btn-simple" id="c3-2">
                                <input type="radio" class="d-none" name="options">
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Transfusion</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-tap-02"></i>
                                </span>
                            </label> --}}
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title text-info">
                        {{-- <i class="tim-icons icon-delivery-fast"></i> --}}
                         0</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-chart bg-dark">
                <div class="card-header">
                    <h5 class="card-category">Family History</h5>
                    <h3 class="card-title text-success">
                        {{-- <i class="tim-icons icon-send text-success"></i> --}}
                         0</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                        {{-- <canvas id="CountryChart2"></canvas> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
