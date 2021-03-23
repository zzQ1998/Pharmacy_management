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
          <cite>药品采购申请列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
    </div>
    <div class="x-body">

      <div class="layui-card-body layui-table-body layui-table-main">
        <table class="layui-table" id="test" lay-filter="test">
          <thead>
            <tr>
              <th style="text-align: center; font-weight:bold;">编号</th>
              <th style="text-align: center; font-weight:bold;">员工姓名</th>
              <th style="text-align: center; font-weight:bold;">管理员</th>
              <th style="text-align: center; font-weight:bold;">采购金额</th>
              <th style="text-align: center; font-weight:bold;">预计如时间</th>
              <th style="text-align: center; font-weight:bold;">申请时间</th>
              <th style="text-align: center; font-weight:bold;">审核时间</th>
              <th style="text-align: center; font-weight:bold;">状态</th>
            </tr>
          </thead>
          <tbody>
            @if (Session::get('user')->limit==1)
                @foreach($pur as $v)
                <tr onclick="xadmin.open('药品采购申请表','{{ url('admin/purchase/purtable/'.$v->id) }}',600,700,true)">
                  <td style="text-align: center;">{{ $v->id }}</td>
                  <td style="text-align: center; font-weight:bold;">{{ $v->ename }}</td>
                  <td style="text-align: center;">{{ $v->aname }}</td>
                  <td style="text-align: center;">{{ $v->price }}</td>
                  <td style="text-align: center;">{{  date('Y-m-d H:i:s',$v->etime) }}</td>
                  <td style="text-align: center;">{{  date('Y-m-d H:i:s',$v->ctime) }}</td>
                  @if ($v->stime==0)
                  <td style="text-align: center;">未审核</td>
                  @else
                  <td style="text-align: center;">{{  date('Y-m-d H:i:s',$v->stime) }}</td>
                  @endif

                  <td class="td-status" style="text-align: center;">
                    @if($v->state==0)
                      <span class="layui-btn layui-btn-warm layui-btn-mini">未审核</span>
                    @else
                      <span class="layui-btn layui-btn-normal layui-btn-mini">已通过</span>
                    @endif
                  </td>
                </tr>
              @endforeach
            @else
              @foreach($pur as $v)
                  @if ($v->uid==Session::get('user')->user_name)
                    <tr onclick="xadmin.open('药品采购申请表','{{ url('admin/purchase/purtable/'.$v->id) }}',600,700,true)">
                      <td style="text-align: center;">{{ $v->id }}</td>
                      <td style="text-align: center; font-weight:bold;">{{ $v->ename }}</td>
                      <td style="text-align: center;">{{ $v->aname }}</td>
                      <td style="text-align: center;">{{ $v->price }}</td>
                      <td style="text-align: center;">{{  date('Y-m-d H:i:s',$v->etime) }}</td>
                      <td style="text-align: center;">{{  date('Y-m-d H:i:s',$v->ctime) }}</td>
                      @if ($v->stime==0)
                      <td style="text-align: center;">未审核</td>
                      @else
                      <td style="text-align: center;">{{  date('Y-m-d H:i:s',$v->stime) }}</td>
                      @endif

                      <td class="td-status" style="text-align: center;">
                        @if($v->state==0)
                          <span class="layui-btn layui-btn-warm layui-btn-mini">未审核</span>
                        @else
                          <span class="layui-btn layui-btn-normal layui-btn-mini">已通过</span>
                        @endif
                      </td>
                    </tr>
                  @endif
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
        {{--  分页  --}}
        <div class="layui-card-body ">
          <div class="page">
              <div>
                {!! $pur->appends($request->all())->render() !!}
              </div>
          </div>
        </div>
    </div>

</body>

</html>