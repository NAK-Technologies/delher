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
                                <label class="btn btn-sm btn-info btn-simple active" id="daily-count">
                                    <input type="radio" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Number of Patients</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                {{-- <label class="btn btn-sm btn-info btn-simple" id="daily-types">
                                    <input type="radio" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Types of Diarrhea</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label> --}}
                                </div>
                            </div>
                        </div>
                        <h3 class="card-title" style="color: #2483cf;">
                            {{ $patientsTotal }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="dailyPatientsBarChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3">
                <div class="card card-chart bg-dark">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="card-category">Krachi</h5>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                <label class="btn btn-sm btn-info btn-simple" id="c2-">
                                    <input type="radio" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block"></span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                </div>
                            </div>
                        </div>
                        <h3 class="card-title" style="color: #2483cf;">
                            {{ $patientsTotal }}
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="dailyDiarrheaTypeByCityChart"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
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

            // let patientsCountData = []
            // let patientsCountLabels = []
            // let patientsTypesData = []
            // let patientsTypesLabels = []
            let patientsCountData = []
            let patientsLabels = []
            let patientsTypesData = []
            let patientsTypesLabels = []

            // console.log(patients.count);
            // for(key in patients){
            //     patientsCountData.push(patients[key].count)
            //     patientsCountLabels.push(key)
            //     // console.log(key, patients.count[key]);
            //     for(k in patients[key].types){
            //         patientsTypesData.push(patients[key].types[k])
            //         patientsTypesLabels.push(k)
            //         // console.log(key, patients.count[key]);
            //     }
            // }
            console.log(patients);
                for(date in patients){
                    patientsLabels.push(date)
                    // for(count in patients){
                    //     patientsCountData.push(patientscount)
                    // }
                    patientsCountData.push(patients[date].count)
                    for(type in patients[date].types){
                        if(type){
                            patientsTypesLabels.push(type)
                            if(patientsTypesData[type]){
                                patientsTypesData[type].push(patients[date].types[type])
                            }else{
                                
                            }
                        }
                    }
                }
                console.log(patientsCountData, patientsLabels, patientsTypesLabels, patientsTypesData);
            // console.log(patientsCountData, patientsCountLabels, patientsTypesData, patientsTypesLabels);
            let dailyChart = new Chart(ctx, {
                type: 'line',
                responsive: true,
                options: gradientChartOptionsConfiguration,
                data: {
                    // labels: patientsLabels,
                    labels: patientsLabels,
                    datasets: [
                        {
                            label: "Patients",
                            // fill: true,
                            // backgroundColor: gradientStroke,
                            // hoverBackgroundColor: gradientStroke,
                            // borderColor: "#2483cf",
                            // borderWidth: 2,
                            // borderDash: [],
                            // borderDashOffset: 0.0,
                            borderColor: "rgba(36, 131, 207,1)",
                            pointBorderColor: "#FFF",
                            pointBackgroundColor: "rgba(36, 131, 207,1)",
                            pointBorderWidth: 2,
                            pointHoverRadius: 4,
                            pointHoverBorderWidth: 1,
                            pointRadius: 4,
                            fill: true,
                            backgroundColor: gradientStroke,
                            borderWidth: 2,
                            // data: [53, 20, 10, 80, 100, 45],
                            data: patientsCountData,
                        },
                    ]
                }
            })
            $("#daily-count").click(function () {
                dailyChart.config.data.datasets = [{
                            label: "Patients",
                            // fill: true,
                            // backgroundColor: gradientStroke,
                            // hoverBackgroundColor: gradientStroke,
                            // borderColor: "#2483cf",
                            // borderWidth: 2,
                            // borderDash: [],
                            // borderDashOffset: 0.0,
                            borderColor: "rgba(36, 131, 207,1)",
                            pointBorderColor: "#FFF",
                            pointBackgroundColor: "rgba(36, 131, 207,1)",
                            pointBorderWidth: 2,
                            pointHoverRadius: 4,
                            pointHoverBorderWidth: 1,
                            pointRadius: 4,
                            fill: true,
                            backgroundColor: gradientStroke,
                            borderWidth: 2,
                            // data: [53, 20, 10, 80, 100, 45],
                            data: patientsCountData,
                        }]
                dailyChart.update();
            });
            // $('#daily-types').click(function (){
            //     dailyChart.config.data.datasets = [
            //         {
            //             label: '',
            //         }
            //     ]
            //     dailyChart.update()
            // })
            // console.log(gradientBarChartConfiguration);
        </script>    
    @endpush
</div>
