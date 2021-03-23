<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>后台登录-Zer</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    {{--  除了检查 POST 参数中的 CSRF 令牌外， VerifyCsrfToken 中间件还会检查 X-CSRF-TOKEN 请求头。你应该将令牌保存在 HTML meta 标签中  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('admin.public.style')
    @include('admin.public.script')
</head>

<body>
    <div class="x-nav">
        <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">药品管理</a>
            <a>
            <cite>提交采购申请</cite></a>
        </span>
        <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
    </div>
    <div class="x-body">
        <form class="layui-form" style="margin-left: 25%;margin-top: 5%;">
            {{ csrf_field() }}
            <div class="layui-form-item">
                <label for="L_catetitle" class="layui-form-label">
                    <span class="x-red">*</span>预计金额
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="L_catetitle" name="price" required=""
                        autocomplete="off" class="layui-input" lay-verify="required">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_cate_order" class="layui-form-label">
                    <span class="x-red">*</span>预计入库
                </label>
                <div class="layui-inline layui-show-xs-block">
                    <input type="text" name="time" class="layui-input" id="test1" placeholder="入库预计时间">
                </div>
            </div>
            <div class="layui-form-item layui-form-text">
                <label class="layui-form-label"><span class="x-red">*</span>采购内容</label>
                <div class="layui-input-block">
                    <textarea name="content" placeholder="请输入采购内容" class="layui-textarea" style="width: 50%"></textarea>
                </div>
            </div>
            <div class="layui-form-item">
                <label for="L_repass" class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="add" lay-submit="">
                    提交申请
                </button>
            </div>
    </form>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
            var form = layui.form
            ,layer = layui.layer;


            //监听提交
            form.on('submit(add)', function(data){

                //发异步，把数据提交给php
                $.ajax({
                    type:'POST',
                    url:'/admin/purchase',
                    dataType:'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:data.field,
                    success:function(data){
                        // 弹层提示添加成功，并刷新父页面
                        // console.log(data);
                        if(data.status == 0){
                            layer.alert(data.message,{icon:6},function(){
                                location.reload(true);
                            });
                        }else{
                            layer.alert(data.message,{icon:5});
                        }
                    },
                    error:function(){
                        //错误信息
                    }

                });
                return false;
            });
        });
        layui.use('laydate', function(){
            var laydate = layui.laydate;

            //执行一个laydate实例
            laydate.render({
              elem: '#test1' //指定元素
              ,format: 'yyyy-MM-dd HH:mm:ss' //可任意组合
            });
        });
    </script>
</body>

</html>