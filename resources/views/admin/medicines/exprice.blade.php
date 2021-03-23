<!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>欢迎页面-Zer</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    @include('admin.public.style')
    @include('admin.public.script')
</head>

<body>
    <div class="layui-fluid">
        <div class="layui-row">
            <form class="layui-form layui-form-pane" style="margin-left: 20%;">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="id" class="layui-form-label">
                        <span class="x-red">*</span>申请编号:
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="id" name="id" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>申请码:
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="num" name="num" required="" lay-verify="required" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item" style="margin-left: 28%">
                    <button class="layui-btn layui-btn-lg" lay-submit="" lay-filter="add">提交</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        layui.use(['form', 'layer'], function() {
            $ = layui.jquery;
            var form = layui.form,
                layer = layui.layer;
           //监听提交
            form.on('submit(add)',function(data) {

                //阻止默认提交，发异步，把数据提交给php
                $.ajax({
                    type:'POST',
                    url:'/admin/medicines/expricenum',//请求路由
                    dataType:'json',//返回数据格式
                    headers: {//这样POST就会传一个headers
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:data.field,//提交的表单数据
                    success:function(data){//判断是否成功
                        //弹层提示添加成功，并刷新父页面
                        if(data.status==0){
                            layer.alert(data.message,{icon:6},function(){
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.layer.close(index);//关闭当前页
                                parent.xadmin.open('添加药品','{{ url('admin/medicines/create') }}',500,570);
                            });
                        }else{
                            layer.alert(data.message,{icon:5});
                        }
                    },
                    error:function(){
                        //提示错误信息
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>