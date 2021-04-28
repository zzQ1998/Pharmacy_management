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

    <TABLE id=Wyzjspd_reportTbl style="POSITION: relative"><TBODY>
    <TR>
    <TD>
    <DIV id=Wyzjspd_reportDiv style="POSITION: relative; TEXT-ALIGN: left; DISPLAY: inline-block">
    <TABLE>
    <TBODY>
    <TR>
    <TD style=>
    <DIV style="FONT-SIZE: 13px; FONT-FAMILY: 宋体; COLOR: " noWrap><SPAN onclick="" id=runqian_submit style="CURSOR: pointer"></SPAN></DIV></TD></TR></TBODY></TABLE>
    <STYLE id=Wyzjspd_style>.Wyzjspd_1 {
      FONT-SIZE: 18px; OVERFLOW: hidden; TEXT-DECORATION: none; BORDER-TOP: #000000 1px; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px; VERTICAL-ALIGN: middle; WHITE-SPACE: nowrap; BORDER-BOTTOM: #000000 1px; WORD-BREAK: keep-all; FONT-WEIGHT: bold; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: center; BORDER-LEFT: #000000 1px; BACKGROUND-COLOR: #ffffff
    }
    .Wyzjspd_2 {
      FONT-SIZE: 12px; OVERFLOW: hidden; TEXT-DECORATION: none; BORDER-TOP: #000000 1px; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px; VERTICAL-ALIGN: middle; WHITE-SPACE: nowrap; BORDER-BOTTOM: #000000 1px solid; WORD-BREAK: keep-all; FONT-WEIGHT: normal; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: right; BORDER-LEFT: #000000 1px solid; BACKGROUND-COLOR: #ffffff
    }
    .Wyzjspd_3 {
      FONT-SIZE: 12px; OVERFLOW: hidden; TEXT-DECORATION: none; BORDER-TOP: #000000 1px solid; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px solid; VERTICAL-ALIGN: middle; WHITE-SPACE: nowrap; BORDER-BOTTOM: #000000 1px solid; WORD-BREAK: keep-all; FONT-WEIGHT: normal; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: center; BORDER-LEFT: #000000 1px solid; BACKGROUND-COLOR: #ffffff
    }
    .Wyzjspd_4 {
      FONT-SIZE: 12px; OVERFLOW: hidden; TEXT-DECORATION: none; BORDER-TOP: #000000 1px solid; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px solid; VERTICAL-ALIGN: middle; WHITE-SPACE: nowrap; BORDER-BOTTOM: #000000 1px solid; WORD-BREAK: keep-all; FONT-WEIGHT: normal; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: left; BORDER-LEFT: #000000 1px solid; BACKGROUND-COLOR: #ffffff
    }
    .Wyzjspd_5 {
      FONT-SIZE: 12px; OVERFLOW: hidden; TEXT-DECORATION: none; BORDER-TOP: #000000 1px; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px; VERTICAL-ALIGN: middle; WHITE-SPACE: nowrap; BORDER-BOTTOM: #000000 1px solid; WORD-BREAK: keep-all; FONT-WEIGHT: bold; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: center; BORDER-LEFT: #000000 1px; BACKGROUND-COLOR: #ffffff
    }
    .Wyzjspd_6 {
      FONT-SIZE: 12px; OVERFLOW: hidden; TEXT-DECORATION: none; BORDER-TOP: #000000 1px; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px; VERTICAL-ALIGN: middle; WHITE-SPACE: nowrap; BORDER-BOTTOM: #000000 1px solid; WORD-BREAK: keep-all; FONT-WEIGHT: normal; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: left; BORDER-LEFT: #000000 1px; BACKGROUND-COLOR: #ffffff
    }
    .Wyzjspd_7 {
      FONT-SIZE: 12px; TEXT-DECORATION: none; BORDER-TOP: #000000 1px solid; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px solid; VERTICAL-ALIGN: top; BORDER-BOTTOM: #000000 1px; FONT-WEIGHT: normal; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: left; BORDER-LEFT: #000000 1px solid; LINE-HEIGHT: 16px; BACKGROUND-COLOR: #ffffff
    }
    .Wyzjspd_8 {
      FONT-SIZE: 12px; OVERFLOW: hidden; TEXT-DECORATION: none; BORDER-TOP: #000000 1px; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px solid; VERTICAL-ALIGN: middle; WHITE-SPACE: nowrap; BORDER-BOTTOM: #000000 1px solid; WORD-BREAK: keep-all; FONT-WEIGHT: normal; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: right; BORDER-LEFT: #000000 1px; BACKGROUND-COLOR: #ffffff
    }
    .Wyzjspd_9 {
      FONT-SIZE: 12px; TEXT-DECORATION: none; BORDER-TOP: #000000 1px solid; FONT-FAMILY: 宋体; BORDER-RIGHT: #000000 1px solid; VERTICAL-ALIGN: middle; BORDER-BOTTOM: #000000 1px solid; FONT-WEIGHT: normal; COLOR: #000000; FONT-STYLE: normal; TEXT-ALIGN: center; BORDER-LEFT: #000000 1px solid; LINE-HEIGHT: 16px; BACKGROUND-COLOR: #ffffff
    }
    </STYLE>

    <TABLE onmouseover=Wyzjspd416534over() onmouseout=Wyzjspd416534out() id=Wyzjspd style="WIDTH: 35%; BORDER-COLLAPSE: collapse; TABLE-LAYOUT: fixed;margin-left:25%;" cellSpacing=0 cols=6 cellPadding=0 submitCells="0" rowCount="14" currEditor="null">
    <COLGROUP>
    <COL style="WIDTH: 86px"></COL>
    <COL style="WIDTH: 64px"></COL>
    <COL style="WIDTH: 53px"></COL>
    <COL style="WIDTH: 85px"></COL>
    <COL style="WIDTH: 85px"></COL>
    <COL style="WIDTH: 112px"></COL></COLGROUP>
    <TBODY>
    <TR style="HEIGHT: 40px" height=40 rn="1">
    <TD onclick=_hideEditor() id=Wyzjspd_A1 class=Wyzjspd_1 style="LETTER-SPACING: -1px" colSpan=6 value="药品采购申请表" colNo="1">药品采购申请表</TD></TR>
    <TR style="HEIGHT: 23px" height=23 rn="2">
    <TD onclick=_hideEditor() id=Wyzjspd_A2 class=Wyzjspd_5 style="LETTER-SPACING: -1px" colSpan=3 value="申请日期:" colNo="1">申请日期:&nbsp;<span>2021年03月21日</span></TD>
    <TD class=Wyzjspd_5 style="LETTER-SPACING: -1px" colSpan=3 ></TD>
    </TR>
    <TR style="HEIGHT: 35px" height=35 rn="3">
    <TD onclick=_hideEditor() id=Wyzjspd_A3 class=Wyzjspd_3 style="LETTER-SPACING: -1px" value="姓名:" colNo="1">姓名:</TD>
    <TD onclick=_hideEditor() id=Wyzjspd_B3 class=Wyzjspd_4 style="PADDING-LEFT: 11px; LETTER-SPACING: -1px" colSpan=5 value="测试20200120" colNo="2">{{$pur->ename}}</TD></TR>
    <TR style="HEIGHT: 35px" height=35 rn="4">
    <TD onclick=_hideEditor() id=Wyzjspd_A4 class=Wyzjspd_3 style="LETTER-SPACING: -1px" value="职务:" colNo="1">职务:</TD>
    <TD onclick=_hideEditor() id=Wyzjspd_B4 class=Wyzjspd_4 style="PADDING-LEFT: 11px; LETTER-SPACING: -1px;" colSpan=5  colNo="2">药品采购员</TD></TR>

    <TR style="HEIGHT: 35px" height=35 rn="8">
    <TD onclick=_hideEditor() id=Wyzjspd_A8 class=Wyzjspd_3 style="LETTER-SPACING: -1px" value="预计金额(元)" colNo="1">预计金额(元)</TD>
    <TD onclick=_hideEditor() id=Wyzjspd_B8 class=Wyzjspd_3 style="LETTER-SPACING: -1px" colSpan=2 value="35560.95" colNo="2" digits="2" >{{ $pur->price }}元</TD>
    <TD onclick=_hideEditor() id=Wyzjspd_E8 class=Wyzjspd_3 style="LETTER-SPACING: -1px" value="预计入库时间" colNo="5">预计入库时间</TD>
    <TD onclick=_hideEditor() id=Wyzjspd_F8 class=Wyzjspd_3 style="LETTER-SPACING: -1px" colSpan=2 value="" colNo="6">{{ date('Y年m月d日',$pur->etime) }}</TD></TR>
    <TR style="HEIGHT: 169px" height=169 rn="9">
    <TD onclick=_hideEditor() id=Wyzjspd_A9 class=Wyzjspd_7 style="PADDING-LEFT: 11px; LETTER-SPACING: -1px" colSpan=6 value="药品列表:" colNo="1">药品列表：<br/>&nbsp;&nbsp;{{ $pur->content }}</TD></TR>
    <TR style="HEIGHT: 29px" height=29 rn="10">
    <TD onclick=_hideEditor() id=Wyzjspd_A10 class=Wyzjspd_2 style="LETTER-SPACING: -1px" colSpan=4 value="申请人：" colNo="1">申请人:</TD>
    <TD onclick=_hideEditor() id=Wyzjspd_E10 class=Wyzjspd_6 style="LETTER-SPACING: -1px" value="" colNo="5">{{$pur->ename}}</TD>
    <TD onclick=_hideEditor() id=Wyzjspd_F10 class=Wyzjspd_8 style="LETTER-SPACING: -1px" value="    年  月  日" colNo="6">{{ date('Y年m月d日',$pur->ctime) }}&nbsp;&nbsp;</TD></TR>


    <TR style="HEIGHT: 120px" height=120 rn="13">
    <TD onclick=_hideEditor() id=Wyzjspd_A13 class=Wyzjspd_7 style="PADDING-LEFT: 11px; LETTER-SPACING: -1px;" colSpan=6 value="签批意见: 同意采购该批次药品!" colNo="1">签批意见: <br>
      @if ($pur->state==1)
        <span style="margin-left: 30%;font-size:15px;">同意采购该批次药品!</span>
      @endif
      </TD></TR>
    <TR style="HEIGHT: 29px" height=29 rn="14">
    <TD onclick=_hideEditor() id=Wyzjspd_E14 class=Wyzjspd_2 style="LETTER-SPACING: -1px" colSpan=1>
    @if ($pur->state==0&&Session::get('user')->limit==1)
      <a title="同意" onclick="click_Ok({{ $pur->id }})" href="javascript:;">
      <i class="layui-icon" style="font-weight: bold;font-size:20px;">&#xe62a;</i>
      </a>
    {{-- @else
      <i class="layui-icon" style="font-weight: bold;font-size:20px;">&#xe62a;</i> --}}
    @endif
  </TD>
    <TD onclick=_hideEditor() id=Wyzjspd_A14 class=Wyzjspd_6 style="text-align: right;" colSpan=3 value="签批人：" colNo="2">签批人：</TD>
    <TD onclick=_hideEditor() id=Wyzjspd_E14 class=Wyzjspd_6 style="LETTER-SPACING: -1px" value="" colNo="5">{{$pur->aname}}</TD>
    @if ($pur->stime==0)
    <TD onclick=_hideEditor() id=Wyzjspd_F14 class=Wyzjspd_8 style="LETTER-SPACING: -1px" colNo="6">年&nbsp;&nbsp;月&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;&nbsp;</TD>
    @else
    <TD onclick=_hideEditor() id=Wyzjspd_F14 class=Wyzjspd_8 style="LETTER-SPACING: -1px" value="    年  月  日" colNo="6">{{ date('Y年m月d日',$pur->stime) }}&nbsp;&nbsp;</TD>
    @endif

  </TR>
</TBODY>
</TABLE>
</DIV>
</TD>

</TR>
</TBODY>
</TABLE>
  </body>
<script>

        function click_Ok(id){

          layer.confirm('确认要通过该申请吗？',function(index){

              //发异步删除数据
              $.get('/admin/purchase/agree/'+id,function (data) {
                if(data.status==0){
                  //发异步删除数据
                  layer.msg(data.message,{icon:6,time:1000});
                  location.reload(true);//刷新本页面
                }else{
                    layer.msg(data.message,{icon:5,time:1000});
                }
              });

          });
      }
</script>
</html>