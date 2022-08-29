<div>
    
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @foreach($charts as $group => $chart)
    @php
        $colors =  ['info', 'primary', 'success'];
        $color = $colors[array_rand($colors, 1)];
    @endphp
    <div class="row">
        <div class="col-12">
            <div class="card card-chart bg-dark">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            {{-- <h5 class="card-category">Total</h5> --}}
                            <h2 class="card-title text-{{ $color }}">{{ ucwords(implode(' ', explode('-', $group))) }}</h2>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                {{-- @dd($chart->question) --}}
                                @foreach($chart as $question)
                                <label class="btn btn-sm btn-{{ $color }} btn-simple {{ $question->question == $selected ? 'active' : '' }}" id="{{ implode('', explode('/',$group)) }}-{{ $loop->iteration }}">
                                    <input type="radio" wire:click="selected($question->question)" name="options" {{ $question->question == $selected ? 'checked' : '' }}>
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">{{ $question->question }}</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-single-02"></i>
                                    </span>
                                </label>
                                {{-- <label class="btn btn-sm btn-{{ $color }} btn-simple" id="1">
                                    <input type="radio" class="d-none d-sm-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Age</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-gift-2"></i>
                                    </span>
                                </label>
                                <label class="btn btn-sm btn-{{ $color }} btn-simple" id="2">
                                    <input type="radio" class="d-none" name="options">
                                    <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Occupation</span>
                                    <span class="d-block d-sm-none">
                                        <i class="tim-icons icon-tap-02"></i>
                                    </span>
                                </label> --}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="{{ implode('', explode('/', implode('', explode('-', $group)))) }}"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart bg-dark">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="card-category">Life Style</h5>
                        </div>
                        <div class="col-sm-6">
                            <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                            <label class="btn btn-sm btn-info btn-simple active" id="c2-0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Water</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-info btn-simple" id="c2-1">
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
                            </label>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title" style="color: #2483cf;">
                        <i class="tim-icons icon-bell-55"></i>
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
                            <label class="btn btn-sm btn-info btn-simple active" id="c3-0">
                                <input type="radio" name="options" checked>
                                <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Medications</span>
                                <span class="d-block d-sm-none">
                                    <i class="tim-icons icon-single-02"></i>
                                </span>
                            </label>
                            <label class="btn btn-sm btn-info btn-simple" id="c3-1">
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
                            </label>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-title text-info">
                        <i class="tim-icons icon-delivery-fast"></i>
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
                        <i class="tim-icons icon-send text-success"></i>
                         0</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                        <canvas id="CountryChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    @endforeach

    @push('js')
        type = ["primary", "info", "success", "warning", "danger"];

demo2 = {
    initPickColor: function () {
        $(".pick-class-label").click(function () {
            var new_class = $(this).attr("new-class");
            var old_class = $("#display-buttons").attr("data-class");
            var display_div = $("#display-buttons");
            if (display_div.length) {
                var display_buttons = display_div.find(".btn");
                display_buttons.removeClass(old_class);
                display_buttons.addClass(new_class);
                display_div.attr("data-class", new_class);
            }
        });
    },

    initDocChart: function () {
        chartColor = "#FFFFFF";

        // General configuration for the charts with Line gradientStroke
        gradientChartOptionsConfiguration = {
            maintainAspectRatio: false,
            legend: {
                display: false,
            },
            tooltips: {
                bodySpacing: 4,
                mode: "nearest",
                intersect: 0,
                position: "nearest",
                xPadding: 10,
                yPadding: 10,
                caretPadding: 10,
            },
            responsive: true,
            scales: {
                yAxes: [
                    {
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false,
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false,
                        },
                    },
                ],
                xAxes: [
                    {
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false,
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false,
                        },
                    },
                ],
            },
            layout: {
                padding: {
                    left: 0,
                    right: 0,
                    top: 15,
                    bottom: 15,
                },
            },
        };

        ctx = document.getElementById("lineChartExample").getContext("2d");

        gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
        gradientStroke.addColorStop(0, "#80b6f4");
        gradientStroke.addColorStop(1, chartColor);

        gradientFill = ctx.createLinearGradient(0, 170, 0, 50);
        gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
        gradientFill.addColorStop(1, "rgba(249, 99, 59, 0.40)");

        // myChart = new Chart(ctx, {
        //     type: "line",
        //     responsive: true,
        //     data: {
        //         labels: [
        //             "Jan",
        //             "Feb",
        //             "Mar",
        //             "Apr",
        //             "May",
        //             "Jun",
        //             "Jul",
        //             "Aug",
        //             "Sep",
        //             "Oct",
        //             "Nov",
        //             "Dec",
        //         ],
        //         datasets: [
        //             {
        //                 label: "Active Users",
        //                 borderColor: "#f96332",
        //                 pointBorderColor: "#FFF",
        //                 pointBackgroundColor: "#f96332",
        //                 pointBorderWidth: 2,
        //                 pointHoverRadius: 4,
        //                 pointHoverBorderWidth: 1,
        //                 pointRadius: 4,
        //                 fill: true,
        //                 backgroundColor: gradientFill,
        //                 borderWidth: 2,
        //                 data: [
        //                     542, 480, 430, 550, 530, 453, 380, 434, 568, 610,
        //                     700, 630,
        //                 ],
        //             },
        //         ],
        //     },
        //     options: gradientChartOptionsConfiguration,
        // });
    },

    // initDashboardPageCharts: function () {
    //     gradientChartOptionsConfigurationWithTooltipBlue = {
    //         maintainAspectRatio: false,
    //         legend: {
    //             display: false,
    //         },

    //         tooltips: {
    //             backgroundColor: "#f5f5f5",
    //             titleFontColor: "#333",
    //             bodyFontColor: "#666",
    //             bodySpacing: 4,
    //             xPadding: 12,
    //             mode: "nearest",
    //             intersect: 0,
    //             position: "nearest",
    //         },
    //         responsive: true,
    //         scales: {
    //             yAxes: [
    //                 {
    //                     barPercentage: 1.6,
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(29,140,248,0.0)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         suggestedMin: 60,
    //                         suggestedMax: 125,
    //                         padding: 20,
    //                         fontColor: "#2380f7",
    //                     },
    //                 },
    //             ],

    //             xAxes: [
    //                 {
    //                     barPercentage: 1.6,
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(29,140,248,0.1)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         padding: 20,
    //                         fontColor: "#2380f7",
    //                     },
    //                 },
    //             ],
    //         },
    //     };

    //     gradientChartOptionsConfigurationWithTooltipPurple = {
    //         maintainAspectRatio: false,
    //         legend: {
    //             display: false,
    //         },

    //         tooltips: {
    //             backgroundColor: "#f5f5f5",
    //             titleFontColor: "#333",
    //             bodyFontColor: "#666",
    //             bodySpacing: 4,
    //             xPadding: 12,
    //             mode: "nearest",
    //             intersect: 0,
    //             position: "nearest",
    //         },
    //         responsive: true,
    //         scales: {
    //             yAxes: [
    //                 {
    //                     barPercentage: 1.6,
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(29,140,248,0.0)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         suggestedMin: 60,
    //                         suggestedMax: 125,
    //                         padding: 20,
    //                         fontColor: "#9a9a9a",
    //                     },
    //                 },
    //             ],

    //             xAxes: [
    //                 {
    //                     barPercentage: 1.6,
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(36, 147, 229,0.1)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         padding: 20,
    //                         fontColor: "#9a9a9a",
    //                     },
    //                 },
    //             ],
    //         },
    //     };

    //     gradientChartOptionsConfigurationWithTooltipOrange = {
    //         maintainAspectRatio: false,
    //         legend: {
    //             display: false,
    //         },

    //         tooltips: {
    //             backgroundColor: "#f5f5f5",
    //             titleFontColor: "#333",
    //             bodyFontColor: "#666",
    //             bodySpacing: 4,
    //             xPadding: 12,
    //             mode: "nearest",
    //             intersect: 0,
    //             position: "nearest",
    //         },
    //         responsive: true,
    //         scales: {
    //             yAxes: [
    //                 {
    //                     barPercentage: 1.6,
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(29,140,248,0.0)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         suggestedMin: 50,
    //                         suggestedMax: 110,
    //                         padding: 20,
    //                         fontColor: "#ff8a76",
    //                     },
    //                 },
    //             ],

    //             xAxes: [
    //                 {
    //                     barPercentage: 1.6,
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(220,53,69,0.1)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         padding: 20,
    //                         fontColor: "#ff8a76",
    //                     },
    //                 },
    //             ],
    //         },
    //     };

    //     gradientChartOptionsConfigurationWithTooltipGreen = {
    //         maintainAspectRatio: false,
    //         legend: {
    //             display: false,
    //         },

    //         tooltips: {
    //             backgroundColor: "#f5f5f5",
    //             titleFontColor: "#333",
    //             bodyFontColor: "#666",
    //             bodySpacing: 4,
    //             xPadding: 12,
    //             mode: "nearest",
    //             intersect: 0,
    //             position: "nearest",
    //         },
    //         responsive: true,
    //         scales: {
    //             yAxes: [
    //                 {
    //                     barPercentage: 1.6,
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(29,140,248,0.0)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         suggestedMin: 50,
    //                         suggestedMax: 125,
    //                         padding: 20,
    //                         fontColor: "#9e9e9e",
    //                     },
    //                 },
    //             ],

    //             xAxes: [
    //                 {
    //                     barPercentage: 1.6,
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(0,242,195,0.1)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         padding: 20,
    //                         fontColor: "#9e9e9e",
    //                     },
    //                 },
    //             ],
    //         },
    //     };

    //     gradientBarChartConfiguration = {
    //         maintainAspectRatio: false,
    //         legend: {
    //             display: false,
    //         },

    //         tooltips: {
    //             backgroundColor: "#f5f5f5",
    //             titleFontColor: "#333",
    //             bodyFontColor: "#666",
    //             bodySpacing: 4,
    //             xPadding: 12,
    //             mode: "nearest",
    //             intersect: 0,
    //             position: "nearest",
    //         },
    //         responsive: true,
    //         scales: {
    //             yAxes: [
    //                 {
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(29,140,248,0.1)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         suggestedMin: 60,
    //                         suggestedMax: 120,
    //                         padding: 20,
    //                         fontColor: "#9e9e9e",
    //                     },
    //                 },
    //             ],

    //             xAxes: [
    //                 {
    //                     gridLines: {
    //                         drawBorder: false,
    //                         color: "rgba(29,140,248,0.1)",
    //                         zeroLineColor: "transparent",
    //                     },
    //                     ticks: {
    //                         padding: 20,
    //                         fontColor: "#9e9e9e",
    //                     },
    //                 },
    //             ],
    //         },
    //     };
    //     Livewire.on("loadCharts", function (wdata) {
    //         var groups = Object.keys(wdata);
    //         // console.log(wdata);

    //         for (var i = 0; i < groups.length; i++) {
    //             // console.log(groups);
    //             // console.log(wdata[groups[i]]);
    //             var group = groups[i];
    //             var questions = wdata[group];
    //             // console.log(questions);
    //             for (let j = 0; j < questions.length; j++) {
    //                 // console.log(questions[j]);
    //                 // console.log(wdata[dataKeys[i]][j]);
    //                 var question = questions[j];
    //                 // console.log(question);
    //                 // let options = wdata[dataKeys[i]][j].options;
    //                 let options = question.options;
    //                 // console.log(options);
    //                 // var optionsKeys = Object.keys(wdata[dataKeys[i].options]);
    //                 var ctx = document
    //                     .getElementById(
    //                         group.split("/").join("").split("-").join("")
    //                     )
    //                     .getContext("2d");

    //                 var gradientStroke = ctx.createLinearGradient(
    //                     0,
    //                     230,
    //                     0,
    //                     50
    //                 );

    //                 gradientStroke.addColorStop(1, "rgba(72,72,176,0.2)");
    //                 gradientStroke.addColorStop(0.2, "rgba(72,72,176,0.0)");
    //                 gradientStroke.addColorStop(0, "rgba(119,52,169,0)"); //purple colors

    //                 // Livewire.on("chart_2", function (wdata) {
    //                 // console.log(wdata.c2);
    //                 var optionData = [];
    //                 // if (k == 0) {
    //                 //     console.log(question);
    //                 //     break;
    //                 // }
    //                 for (var k = 0; k < options.length; k++) {
    //                     var option = options[k];
    //                     if (k == 0) {
    //                         // console.log(question.options);
    //                         for (var p = 0; p < question.options.length; p++) {
    //                             if (optionData[question.options[p].question]) {
    //                                 if (question.options[p].answer) {
    //                                     optionData[
    //                                         question.options[p].question
    //                                     ]++;
    //                                 }
    //                             } else {
    //                                 if (question.options[p].answer) {
    //                                     optionData[
    //                                         question.options[p].question
    //                                     ] = 1;
    //                                 } else {
    //                                     optionData[
    //                                         question.options[p].question
    //                                     ] = 0;
    //                                 }
    //                             }
    //                         }
    //                         // console.log(question);
    //                         // optionLabels.push(option.question);
    //                         // break;
    //                         // console.log(option);
    //                     }
    //                     $("#c2-0").click(function () {
    //                         var data = chart_2.config.data;
    //                         data.datasets[0].data = Object.values(optionData);
    //                         data.labels = Object.keys(optionData);
    //                         chart_2.update();
    //                     });
    //                 }
    //                 // $("#c2-1").click(function () {
    //                 //     var chart_data = Object.values(wdata);
    //                 //     var data = chart_2.config.data;
    //                 //     data.datasets[0].data = chart_data;
    //                 //     data.labels = Object.keys(wdata);
    //                 //     chart_2.update();
    //                 // });

    //                 // $("#c2-2").click(function () {
    //                 //     var chart_data = Object.values(wdata);
    //                 //     var data = chart_2.config.data;
    //                 //     data.datasets[0].data = chart_data;
    //                 //     data.labels = Object.keys(wdata);
    //                 //     chart_2.update();
    //                 // });
    //                 // $("#c2-3").click(function () {
    //                 //     var chart_data = Object.values(wdata);
    //                 //     var data = chart_2.config.data;
    //                 //     data.datasets[0].data = chart_data;
    //                 //     data.labels = Object.keys(wdata);
    //                 //     chart_2.update();
    //                 // });
    //             }
    //         }
    //         var chart_2 = new Chart(ctx, {
    //             type: "pie",
    //             responsive: true,
    //             legend: {
    //                 display: false,
    //             },
    //             // options: gradientBarChartConfiguration,
    //             data: {
    //                 // labels: ["USA", "GER", "AUS", "UK", "RO", "BR"],
    //                 labels: Object.keys(optionData),
    //                 datasets: [
    //                     {
    //                         label: "Patients",
    //                         fill: true,
    //                         backgroundColor: gradientStroke,
    //                         hoverBackgroundColor: gradientStroke,
    //                         borderColor: "#2483cf",
    //                         borderWidth: 2,
    //                         borderDash: [],
    //                         borderDashOffset: 0.0,
    //                         // data: [53, 20, 10, 80, 100, 45],
    //                         data: Object.values(optionData),
    //                     },
    //                 ],
    //             },
    //         });

    //         // var c2data = {
    //         //     labels: ["JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
    //         //     datasets: [
    //         //         {
    //         //             label: "Data",
    //         //             fill: true,
    //         //             backgroundColor: gradientStroke,
    //         //             borderColor: "#2483cf",
    //         //             borderWidth: 2,
    //         //             borderDash: [],
    //         //             borderDashOffset: 0.0,
    //         //             pointBackgroundColor: "#2483cf",
    //         //             pointBorderColor: "rgba(255,255,255,0)",
    //         //             pointHoverBackgroundColor: "#2483cf",
    //         //             pointBorderWidth: 20,
    //         //             pointHoverRadius: 4,
    //         //             pointHoverBorderWidth: 15,
    //         //             pointRadius: 4,
    //         //             data: [80, 100, 70, 80, 120, 80],
    //         //         },
    //         //     ],
    //         // };
    //         // // Livewire.on("chart_2", function () {
    //         // var chart_2 = new Chart(ctx, {
    //         //     type: "line",
    //         //     data: c2data,
    //         //     options: gradientChartOptionsConfigurationWithTooltipPurple,
    //         //     // options: gradientBarChartConfiguration,
    //         // });
    //         // console.log(chart_2);
    //         // });

    //         //     var ctxGreen = document
    //         //         .getElementById("chartLineGreen")
    //         //         .getContext("2d");

    //         //     var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    //         //     gradientStroke.addColorStop(1, "rgba(66,134,121,0.15)");
    //         //     gradientStroke.addColorStop(0.4, "rgba(66,134,121,0.0)"); //green colors
    //         //     gradientStroke.addColorStop(0, "rgba(66,134,121,0)"); //green colors

    //         //     var data = {
    //         //         labels: ["JUL", "AUG", "SEP", "OCT", "NOV"],
    //         //         datasets: [
    //         //             {
    //         //                 label: "My First dataset",
    //         //                 fill: true,
    //         //                 backgroundColor: gradientStroke,
    //         //                 borderColor: "#00d6b4",
    //         //                 borderWidth: 2,
    //         //                 borderDash: [],
    //         //                 borderDashOffset: 0.0,
    //         //                 pointBackgroundColor: "#00d6b4",
    //         //                 pointBorderColor: "rgba(255,255,255,0)",
    //         //                 pointHoverBackgroundColor: "#00d6b4",
    //         //                 pointBorderWidth: 20,
    //         //                 pointHoverRadius: 4,
    //         //                 pointHoverBorderWidth: 15,
    //         //                 pointRadius: 4,
    //         //                 data: [90, 27, 60, 12, 80],
    //         //             },
    //         //         ],
    //         //     };

    //         //     var myChart = new Chart(ctxGreen, {
    //         //         type: "bar",
    //         //         data: data,
    //         //         // options: gradientChartOptionsConfigurationWithTooltipGreen,
    //         //         options: gradientBarChartConfiguration,
    //         //     });

    //         //     var chart_labels = [
    //         //         "JAN",
    //         //         "FEB",
    //         //         "MAR",
    //         //         "APR",
    //         //         "MAY",
    //         //         "JUN",
    //         //         "JUL",
    //         //         "AUG",
    //         //         "SEP",
    //         //         "OCT",
    //         //         "NOV",
    //         //         "DEC",
    //         //     ];

    //         //     var chart_1;
    //         //     // Livewire.on("chart_1", function (wdata) {
    //         //     // var chart_data = [100, 70, 90, 70, 85, 60, 75, 60, 90, 80, 110, 100];
    //         //     console.log(wdata);
    //         //     chart_labels = Object.keys(wdata.c1.cities);
    //         //     var chart_data = Object.values(wdata.c1.cities);

    //         //     var ctx = document.getElementById("chartBig1").getContext("2d");

    //         //     var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    //         //     // gradientStroke.addColorStop(1, "rgba(72,72,176,0.1)");
    //         //     // gradientStroke.addColorStop(0.4, "rgba(72,72,176,0.0)");
    //         //     // gradientStroke.addColorStop(0, "rgba(119,52,169,0)"); //purple colors
    //         //     gradientStroke.addColorStop(1, "rgba(72,72,176,0.1)");
    //         //     gradientStroke.addColorStop(0.4, "rgba(72,72,176,0.0)");
    //         //     gradientStroke.addColorStop(0, "rgba(119,52,169,0)"); //purple colors
    //         //     var config = {
    //         //         type: "bar",
    //         //         responsive: true,
    //         //         legend: {
    //         //             display: false,
    //         //         },
    //         //         data: {
    //         //             labels: chart_labels,
    //         //             datasets: [
    //         //                 {
    //         //                     label: wdata.c1.label,
    //         //                     fill: true,
    //         //                     backgroundColor: gradientStroke,
    //         //                     hoverBackgroundColor: gradientStroke,
    //         //                     borderColor: "#50e5fe",
    //         //                     borderWidth: 2,
    //         //                     borderDash: [],
    //         //                     borderDashOffset: 0.0,
    //         //                     // pointBackgroundColor: "#50e5fe",
    //         //                     // pointBorderColor: "rgba(255,255,255,0)",
    //         //                     // pointHoverBackgroundColor: "#50e5fe",
    //         //                     // pointBorderWidth: 20,
    //         //                     // pointHoverRadius: 4,
    //         //                     // pointHoverBorderWidth: 15,
    //         //                     // pointRadius: 4,
    //         //                     data: chart_data,
    //         //                 },
    //         //             ],
    //         //         },
    //         //         // options: gradientChartOptionsConfigurationWithTooltipPurple,
    //         //         options: gradientBarChartConfiguration,
    //         //     };
    //         //     // console.log(config);
    //         //     chart_1 = new Chart(ctx, config);

    //         //     $("#0").click(function () {
    //         //         var data = chart_1.config.data;
    //         //         data.datasets[0].data = Object.values(wdata.c1.cities);
    //         //         data.labels = Object.keys(wdata.c1.cities);
    //         //         chart_1.update();
    //         //     });
    //         //     $("#1").click(function () {
    //         //         var chart_data = Object.values(wdata.c1.age);
    //         //         var data = chart_1.config.data;
    //         //         data.datasets[0].data = chart_data;
    //         //         data.labels = Object.keys(wdata.c1.age);
    //         //         chart_1.update();
    //         //     });

    //         //     $("#2").click(function () {
    //         //         var chart_data = Object.values(wdata.c1.occupation);
    //         //         var data = chart_1.config.data;
    //         //         data.datasets[0].data = chart_data;
    //         //         data.labels = Object.keys(wdata.c1.occupation);
    //         //         chart_1.update();
    //         //     });
    //         //     // });

    //         //     var ctx = document.getElementById("CountryChart").getContext("2d");

    //         //     var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

    //         //     gradientStroke.addColorStop(1, "rgba(29,140,248,0.2)");
    //         //     gradientStroke.addColorStop(0.4, "rgba(29,140,248,0.0)");
    //         //     gradientStroke.addColorStop(0, "rgba(29,140,248,0)"); //blue colors

    //         //     // Livewire.on("chart_3", function (wdata) {
    //         //     var chart_3 = new Chart(ctx, {
    //         //         type: "bar",
    //         //         responsive: true,
    //         //         legend: {
    //         //             display: false,
    //         //         },
    //         //         data: {
    //         //             // labels: ["USA", "GER", "AUS", "UK", "RO", "BR"],
    //         //             labels: Object.keys(wdata.c3.medications),
    //         //             datasets: [
    //         //                 {
    //         //                     label: "Patients",
    //         //                     fill: true,
    //         //                     backgroundColor: gradientStroke,
    //         //                     hoverBackgroundColor: gradientStroke,
    //         //                     borderColor: "#1f8ef1",
    //         //                     borderWidth: 2,
    //         //                     borderDash: [],
    //         //                     borderDashOffset: 0.0,
    //         //                     // data: [53, 20, 10, 80, 100, 45],
    //         //                     data: Object.values(wdata.c3.medications),
    //         //                 },
    //         //             ],
    //         //         },
    //         //         options: gradientBarChartConfiguration,
    //         //     });
    //         //     $("#c3-0").click(function () {
    //         //         var data = chart_3.config.data;
    //         //         data.datasets[0].data = Object.values(wdata.c3.medications);
    //         //         data.labels = Object.keys(wdata.c3.medications);
    //         //         chart_3.update();
    //         //     });
    //         //     $("#c3-1").click(function () {
    //         //         var chart_data = Object.values(wdata.c3.compliance);
    //         //         var data = chart_3.config.data;
    //         //         data.datasets[0].data = chart_data;
    //         //         data.labels = Object.keys(wdata.c3.compliance);
    //         //         chart_3.update();
    //         //     });

    //         //     $("#c3-2").click(function () {
    //         //         var chart_data = Object.values(wdata.c3.transfusion);
    //         //         var data = chart_3.config.data;
    //         //         data.datasets[0].data = chart_data;
    //         //         data.labels = Object.keys(wdata.c3.transfusion);
    //         //         chart_3.update();
    //         //     });
    //     });

    //     Livewire.emit("lc");
    // },

    

    
};

    @endpush

    
</div>
