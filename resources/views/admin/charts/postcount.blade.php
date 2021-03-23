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
<body align="center">

<h1 style="text-align: center;margin-top:4%;">岗位需求统计图</h1>
	<!-- 统计图 -->
	<!-- 为ECharts准备一个具备大小（宽高）的Dom -->
	<div id="main" style="width: 80%; height: 600px; margin-left:9%;margin-top:3%;"></div>
	<script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));

        // 指定图表的配置项和数据
        var option = {
            title: {
                text: ''
            },
            tooltip: {},
            legend: {
                data:['岗位需求']
            },
            xAxis: {
            	 data:(function(){
            		 var postData = new Array();
            		 for(var i=0;i<data.length;i++){
            			 postData[i]=data[i].post;
         	   		}

            		 return postData;
            	 })()
            },
            yAxis: {},
            series: [{
                name: '岗位需求',
                type: 'bar',
                data: (function(){
           		 var numData = new Array();
        		 for(var i=0;i<data.length;i++){
        			 numData[i]=data[i].num;
        			/*  alert(data[i].num); */
     	   		}

        		 return numData;
        	 })()
            }]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>



</body>
</html>