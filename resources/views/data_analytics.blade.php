@extends('layout.layout')
@section('content')

<div class="container-xl">
    <div class="card mt-3 mb-3">
        <div class="card-header">
            <label for="">Expense and Income</label>
        </div>
            <div class="card-body">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
        </div>
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <label for="">Expense Breakdown</label>
            </div>
                <div class="card-body">
                    <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
</div>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Expense and Income"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "#,###.##",
            indexLabel: "{label} {y} (#percent%)",
            dataPoints: <?php echo json_encode($params['income_expense'], JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();

    var chart1 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        title: {
            text: "Expense Breakdown"
        },
        data: [{
            type: "pie",
            startAngle: 240,
            yValueFormatString: "#,###.##",
            indexLabel: "{label} {y} (#percent%)",
            dataPoints: <?php echo json_encode($params['expense'], JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart1.render();

    }
</script>
@endsection