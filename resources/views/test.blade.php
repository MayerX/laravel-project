<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
{{--    <script src="{{ asset('public/vendor/echarts/echarts.min.js') }}"></script>--}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@4.8.0/dist/echarts.js"></script>
</head>
<body>
<div class="contain" style="width: 50%;" id="">1235</div>
<div class="contain" style="width: 50px;" id="contain">123</div>
</body>
<script>
    let chartDom = document.getElementById('contain');
    let myChart = echarts.init(chartDom);
    let option;

    option = {
        xAxis: {
            type: 'category',
            data: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun']
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                data: [150, 230, 224, 218, 135, 147, 260],
                type: 'line'
            }
        ]
    };

    option && myChart.setOption(option);

</script>
</html>
