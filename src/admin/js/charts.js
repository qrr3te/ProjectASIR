"use strict";
Chart.defaults.font.size = 16;
function create_chart(ctx, stats, text) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                    label: 'Number of connections',
                    data: stats,
                    borderWidth: 1
                }]
        },
        options: {
            layout: {
                padding: {
                    left: 20,
                    right: 30
                }
            },
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: text,
                    padding: {
                        top: 30,
                        bottom: 30
                    }
                }
            }
        }
    });
}
request_stats().then((stats) => {
    const ctx = document.getElementById('myChart');
    create_chart(ctx, stats, "HTTP Data");
});
