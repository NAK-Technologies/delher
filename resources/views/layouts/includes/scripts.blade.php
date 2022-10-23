<script>

    let gradientBarChartConfiguration = {
        maintainAspectRatio: false,
        legend: {
            display: false,
        },
    
        tooltips: {
            backgroundColor: "#f5f5f5",
            titleFontColor: "#333",
            bodyFontColor: "#666",
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest",
        },
        responsive: true,
        scales: {
            yAxes: [
                {
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.1)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        suggestedMin: 60,
                        suggestedMax: 120,
                        padding: 20,
                        fontColor: "#9e9e9e",
                    },
                },
            ],
    
            xAxes: [
                {
                    gridLines: {
                        drawBorder: false,
                        color: "rgba(29,140,248,0.1)",
                        zeroLineColor: "transparent",
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "#9e9e9e",
                    },
                },
            ],
        },
    };
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
            // intersection: {
            //     mode: 'index',
            //     intersect: false,
            // },
            stacked: false,
            scales: {
                yAxes: [
                    {
                        // display: 0,
                        gridLines: 0,
                        ticks: {
                            suggestedMin: 1,
                            suggestedMax: 10,
                            padding: 20,
                            fontColor: "#9e9e9e",
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
                        // display: 0,
                        gridLines: 0,
                        ticks: {
                            padding: 20,
                            fontColor: "#9e9e9e",
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
                    left: 10,
                    right: 10,
                    top: 15,
                    bottom: 15,
                },
            },
        };
</script>
