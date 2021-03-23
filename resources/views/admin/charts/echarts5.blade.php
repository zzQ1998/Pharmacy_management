<!doctype html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>后台登录-Zer</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    @include('admin.public.charts')

</head>

<body>
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card" style="padding-top: 2%;">
                    <h1 style="margin-left: 35%;margin-bottom:4%;">{{ $text }}</h1>
                    <div class="layui-card-body " >
                        <!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
                        <div id="main" style="width: 100%;height:400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));
        var option;
        option = {
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
            },
            series: [
                {
                    name: '{{ $text }}',
                    type: 'pie',
                    radius: '75%',
                    data: {{ $data }},
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 12,
                            shadowOffsetX: 15,
                            shadowColor: 'rgba(0, 0, 0,0.6)'
                        }
                    }
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
</body>

</html>