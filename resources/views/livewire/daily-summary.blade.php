<div class="">
    <h2 class="text-dark">Daily Summary</h2>
    <div class="row">
        <div class="col-lg-12">
                <div class="card card-chart bg-dark">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="card-category">Patients</h5>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                {{-- <label class="btn btn-sm btn-info btn-simple" id="c2-">
                                    <input type="radio" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"></span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label> --}}
                                </div>
                            </div>
                        </div>
                        <h3 class="card-title" style="color: #2483cf;">
                            {{ $total }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="dailyPatientsBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @push('js')
    @include('layouts.includes.scripts')
        <script>
            
        let patients = {!! $patients !!}

        // console.log( patients );


        let ctx = document.getElementById('dailyPatientsBarChart').getContext('2d');
        var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

            gradientStroke.addColorStop(1, "rgba(36, 131, 207,0.2)");
            gradientStroke.addColorStop(0.2, "rgba(36, 131, 207,0.0)");
            gradientStroke.addColorStop(0, "rgba(36, 131, 207,0)"); //purple colors

            let patientsData = []
            let patientsLabels = []
            for(key in patients){
                patientsData.push(patients[key])
                patientsLabels.push(key)
                // console.log(key, patients[key]);
            }
            let chart = new Chart(ctx, {
                type: 'bar',
                responsive: true,
                legend: {
                    display: false
                },
                options: gradientBarChartConfiguration,
                data: {
                    labels: patientsLabels,
                    datasets: [
                        {
                            // label: "Patients",
                            fill: true,
                            backgroundColor: gradientStroke,
                            hoverBackgroundColor: gradientStroke,
                            borderColor: "#2483cf",
                            borderWidth: 2,
                            borderDash: [],
                            borderDashOffset: 0.0,
                            // // data: [53, 20, 10, 80, 100, 45],
                            data: patientsData,
                        }
                    ]
                }
            })
            // console.log(gradientBarChartConfiguration);
        </script>    
    @endpush
</div>
