<!-- 左侧菜单开始 -->
<div class="left-nav">
    <div id="side-nav">
        <ul id="nav">
            @if (Session::get('user')->limit==1)
                <li>
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="管理员管理">&#xe726;</i>
                        <cite>管理员管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('管理员列表','{{url('admin/user/indexAd')}}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>管理员列表</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('角色管理','{{ url('admin/role') }}')">  {{--//{{ url('admin/role') }}  --}}
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>角色管理</cite></a>
                        </li>
                        <li>
                            <a onclick="xadmin.add_tab('权限管理','{{ url('admin/permission') }}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>权限管理</cite></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="iconfont left-nav-li" lay-tips="员工管理">&#xe6b8;</i>
                        <cite>员工管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('员工列表','{{ url('admin/user') }}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>员工列表</cite></a>
                        </li>
                    </ul>
                </li>
            @endif
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="药品管理">&#xe723;</i>
                    <cite>药品管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('药品列表','{{ url('admin/medicines') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>药品列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('删除列表','{{ url('admin/medicines/indexDel') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>删除列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('药品类别','{{ url('admin/cate') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>药品类别</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('药品采购申请表','{{ url('admin/purchase') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>药品采购申请</cite></a>
                    </li>
                    @if (Session::get('user')->limit==0)
                        <li>
                            <a onclick="xadmin.add_tab('提交采购申请','{{ url('admin/purchase/create')}}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>提交采购申请</cite></a>
                        </li>
                    @endif
                </ul>
            </li>
            {{--  <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="分类列表">&#xe723;</i>
                    <cite>分类列表</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('分类列表','{{ url('admin/cate') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>分类列表</cite></a>
                    </li>
                </ul>
            </li>  --}}
            @if (Session::get('user')->limit==1)
                <li>
                    <a href="javascript:;">
                        <i class="iconfont">&#xe75f;</i>
                            <cite>网站配置管理</cite>
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a onclick="xadmin.add_tab('添加网站配置','{{ url('admin/config/create') }}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>添加网站配置</cite>
                            </a>
                        </li >
                        <li>
                            <a onclick="xadmin.add_tab('网站配置列表','{{ url('admin/config') }}')">
                                <i class="iconfont">&#xe6a7;</i>
                                <cite>网站配置列表</cite>
                            </a>
                        </li >
                    </ul>
                </li>
            @endif
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="仓库记录">&#xe723;</i>
                    <cite>仓库记录</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('药品入库','{{ url('admin/entry') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>药品入库</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('药品销售','{{ url('admin/entry/indexout') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>药品销售</cite></a>
                    </li>
                </ul>
            </li>
            {{--  <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="订单管理">&#xe723;</i>
                    <cite>订单管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('订单列表','city.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>订单列表</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('删除列表','city.html')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>删除列表</cite></a>
                    </li>
                </ul>
            </li>  --}}
            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="数据统计">&#xe6ce;</i>
                    <cite>数据统计</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('采购量折线图','{{ url('admin/datas/echarts1') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>采购量拆线图</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('销售量折线图','{{ url('admin/datas/echarts2') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>销售量拆线图</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('员工销售额统计图','{{ url('admin/datas/echarts3') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>员工销售额统计图</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('收支情况统计图','{{ url('admin/datas/echarts4') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>收支情况统计图</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('销售金额饼状图','{{ url('admin/datas/echarts5') }}')">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>销售金额饼状图</cite></a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;">
                    <i class="iconfont left-nav-li" lay-tips="个人中心">&#xe6af;</i>
                    <cite>个人中心</cite>
                    <i class="iconfont nav_right">&#xe697;</i></a>
                <ul class="sub-menu">
                    <li>
                        <a onclick="xadmin.add_tab('个人信息','{{ url('admin/user/message') }}')" target="">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>个人信息</cite></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->