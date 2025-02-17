"use strict";
Chart.defaults.font.size = 16;
function create_bar_chart(ctx, stats, header, label, labels) {
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    label: label,
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
                    text: header,
                    padding: {
                        top: 30,
                        bottom: 30
                    }
                }
            }
        }
    });
}
function create_pie_chart(ctx, stats, header, label, labels) {
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                    label: label,
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
                    text: header,
                    padding: {
                        top: 30,
                        bottom: 30
                    }
                }
            }
        }
    });
}
request_http_stats().then((stats) => {
    const ctx = document.getElementById('http-chart');
    create_bar_chart(ctx, stats, "Number of connections", "HTTP Data");
});
request_server_stats().then((stats) => {
    let data = [];
    let labels = [];
    stats.database.forEach(db => {
        labels.push(db.name);
        data.push(db.size);
    });
    let ctx = document.getElementById('database-chart');
    create_bar_chart(ctx, data, "Db memory usage", "MB", labels);
    ctx = document.getElementById('disk-chart');
    create_pie_chart(ctx, Object.values(stats.disk), "Disk usage", "GB", ["Used", "Available"]);
    ctx = document.getElementById('memory-chart');
    create_pie_chart(ctx, Object.values(stats.memory), "memory usage", "MB", ["Available", "Used"]);
});
