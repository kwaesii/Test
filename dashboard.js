$(document).ready(function () {
    loadAllCharts();
});

function loadAllCharts() {
    get_PlayersPerPosition();
    get_PlayersPerColOff();
    get_PlayersOnScufar();
    get_PlayersOnAscusn();
    get_ScufarStats();
    get_AscusnStats();
}

function get_PlayersPerPosition() {
    $.get("get_PlayersPerPosition.php", function (res) {
        const { labels, values } = parseChartData(res);
        renderSingleDatasetChart("positionChart", 'line', labels, values, 'No. of Players', '#4e73df', '#cfe2ff');
    });
}

function get_PlayersPerColOff() {
    $.get("get_PlayersPerColOff.php", function (res) {
        const { labels, values } = parseChartData(res);
        renderSingleDatasetChart("collegeChart", 'bar', labels, values, 'No. of Players', '#0000a9', '#96b5ff');
    });
}

function get_PlayersOnAscusn() {
    $.get("get_PlayersOnAscusn.php", function (res) {
        const { labels, values } = parseChartData(res);
        renderSingleDatasetChart("ascusnCountChart", 'bar', labels, values, 'No. of Players', '#1cc88a', '#1cc88a');
    });
}

function get_PlayersOnScufar() {
    $.get("get_PlayersOnScufar.php", function (res) {
        const { labels, values } = parseChartData(res);
        renderSingleDatasetChart("PlayersOnScufar", 'bar', labels, values, 'No. of Players', '#f6c23e', '#f6c23e');
    });
}

function get_AscusnStats() {
    $.get("get_AscuStats.php", function (res) {
        const { labels, attackData, blockData, aceData } = parseStatData(res);
        renderMultiDatasetChart("ascusnStatsChart", labels, attackData, blockData, aceData);
    });
}

function get_ScufarStats() {
    $.get("get_ScufarStats.php", function (res) {
        const { labels, attackData, blockData, aceData } = parseStatData(res);
        renderMultiDatasetChart("scufarStatsChart", labels, attackData, blockData, aceData);
    });
}

function parseChartData(response) {
    const labels = [], values = [];
    response.trim().split('#').forEach(item => {
        const [label, value] = item.split(',');
        labels.push(label);
        values.push(value);
    });
    return { labels, values };
}

function parseStatData(response) {
    const labels = [], attackData = [], blockData = [], aceData = [];
    response.trim().split('#').forEach(item => {
        const [label, attack, block, ace] = item.split(',');
        labels.push(label);
        attackData.push(attack);
        blockData.push(block);
        aceData.push(ace);
    });
    return { labels, attackData, blockData, aceData };
}

// CHART RENDERING

function renderSingleDatasetChart(canvasId, type, labels, data, label, borderColor, backgroundColor) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    new Chart(ctx, {
        type: type,
        data: {
            labels: labels,
            datasets: [{
                label: label,
                data: data,
                backgroundColor: backgroundColor,
                borderColor: borderColor,
                borderWidth: 1
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
}

function renderMultiDatasetChart(canvasId, labels, attackData, blockData, aceData) {
    const ctx = document.getElementById(canvasId).getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Attacks',
                    data: attackData,
                    backgroundColor: '#4e73df'
                },
                {
                    label: 'Blocks',
                    data: blockData,
                    backgroundColor: '#1cc88a'
                },
                {
                    label: 'Aces',
                    data: aceData,
                    backgroundColor: '#f6c23e'
                }
            ]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });
}
