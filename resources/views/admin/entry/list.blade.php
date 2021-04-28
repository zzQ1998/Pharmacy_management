<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>ZER药店销售管理平台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
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
          <cite>药品进出库列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
    </div>
    <div class="x-body">

      <div class="layui-card-body layui-table-body layui-table-main">
        <table class="layui-table layui-form" id="test" lay-filter="demo">
          <thead>
            @if ($a == 1)
            {{-- 入库 --}}
              <tr>
                <th style="text-align: center; font-weight:bold;">编号</th>
                <th style="text-align: center; font-weight:bold;">入库员工</th>
                <th style="text-align: center; font-weight:bold;">药品图片</th>
                <th style="text-align: center; font-weight:bold;">药品名称</th>
                <th style="text-align: center; font-weight:bold;">药品类别</th>
                <th style="text-align: center; font-weight:bold;">采购量</th>
                <th style="text-align: center; font-weight:bold;">采购金额</th>
                <th style="text-align: center; font-weight:bold;">状态</th>
                <th style="text-align: center; font-weight:bold;">日期</th>
              </tr>
            @else
            {{-- 出库 --}}
              <tr>
                <th style="text-align: center; font-weight:bold;">编号</th>
                <th style="text-align: center; font-weight:bold;">销售员工</th>
                <th style="text-align: center; font-weight:bold;">药品图片</th>
                <th style="text-align: center; font-weight:bold;">药品名称</th>
                <th style="text-align: center; font-weight:bold;">药品类别</th>
                <th style="text-align: center; font-weight:bold;">销售量</th>
                <th style="text-align: center; font-weight:bold;">销售金额</th>
                <th style="text-align: center; font-weight:bold;">状态</th>
                <th style="text-align: center; font-weight:bold;">日期</th>
              </tr>
            @endif

          </thead>
          <tbody>
          @foreach($meds as $v)
            <tr>
              {{--  <td style="text-align: center;">{{ $v->id }}</td>  --}}
              <td style="text-align: center;">{{ $loop->iteration }}</td>
              <td style="text-align: center; font-weight:bold;">{{ $v->user_rname }}</td>
              <td style="text-align: center;"><img src="{{ $v->small_pic }}" width="80px" height="60px"/></td>
              <td style="text-align: center;">{{ $v->medicines_name }}</td>
              <td style="text-align: center;">{{ $v->cate_name }}</td>
              <td style="text-align: center;">{{ $v->num }}件</td>
              <td style="text-align: center;"><span style="font-weight: bold;color:red;font-size:16px;">￥</span>{{ $v->total_price }}</td>
              <td class="td-status" style="text-align: center;">
                @if($v->trade_state==0)
                  <span class="layui-btn layui-btn-warm layui-btn-mini">销售</span>
                @else
                  <span class="layui-btn layui-btn-normal layui-btn-mini">入库</span>
                @endif
              </td>
              <td style="text-align: center;">{{ date('Y-m-d H:i:s',$v->create_time)}}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
        {{--  分页  --}}
        <div class="layui-card-body ">
          <div class="page">
              <div>
                {{--  {!! $user->appends($request->all())->render() !!}  --}}
              </div>
          </div>
        </div>
    </div>
    <script>
      layui.use(['form','layer','laydate'], function(){
        var laydate = layui.laydate;
          var form = layui.form;

        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });

          //搜索监听提交
        form.on('select(brickType)', function(data){//选择框监听事件
            document.sreach.action ="{{ url('admin/medicines') }}";
            $('#sreach').submit();
        });

            //点击批量添加按钮，触发事件；
            $('#excelbtn').on('click',function () {
                $('#excel_upload').trigger('click');
                $('#excel_upload').on('change',function () {//内容改变触发该方法
                    var obj = this;
                    var formData = new FormData($('#excel_form')[0]);//将id为art_form的表单中的数据打包起来，放到formData变量中。
                    $.ajax({
                        url: '/admin/medicines/addexcel',
                        type: 'post',
                        data: formData,
                        // 因为data值是FormData对象，不需要对数据做处理
                        processData: false,
                        contentType: false,
                        success: function(data){//接收返回值，并判断
                          //弹层提示添加成功，并刷新父页面
                          if(data.status==0){
                            layer.alert(data.message,{icon:6},function(){
                                parent.location.reload(true);//刷新父页面
                            });
                          }else{
                            layer.alert(data.message,{icon:5});
                          }
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                var number = XMLHttpRequest.status;
                                var info = "错误号"+number+"文件上传失败!";
                                alert(info);
                        },
                          async: true
                    });
            });
        });


      });



      /*药品-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post('/admin/medicines/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                  //发异步删除数据
                  $(obj).parents("tr").remove();
                  layer.msg(data.message,{icon:6,time:1000});
                }else{
                    layer.msg(data.message,{icon:5,time:1000});
                }
              });

          });
      }

      /*药品上架*/
      function up(id){
          layer.confirm('确认要上架吗？',function(index){
            $.post('/admin/medicines/up/'+id,{'_method':'post','_token':"{{csrf_token()}}"},function (data) {
              if(data.status==0){
                layer.msg(data.message,{icon:6,time:1000});
                location.replace(location.href);
              }else{
                  layer.msg(data.message,{icon:5,time:1000});
              }
            });
          });
      }

      /*药品下架*/
      function down(id){
        layer.confirm('确认要下架吗？',function(index){
          $.post('/admin/medicines/down/'+id,{'_method':'post','_token':"{{csrf_token()}}"},function (data) {
            if(data.status==0){
              layer.msg(data.message,{icon:6,time:1000});
              location.replace(location.href);
            }else{
                layer.msg(data.message,{icon:5,time:1000});
            }
          });
        });
    }

    </script>

  </body>

</html>