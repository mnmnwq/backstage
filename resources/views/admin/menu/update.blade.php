@extends('layout.admin')
@section('body')
    <button type="button" class="layui-btn bac_btn">返回</button>
    <form class="layui-form" action="{{url('admin/do_up_menu')}}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$menu_info['id']}}">
        <div class="layui-form-item">
            <label class="layui-form-label">上级菜单</label>
            <div class="layui-input-block">
                <select name="pid" disabled>
                    <option value="0" @if($menu_info['pid'] == 0) selected @endif >--请选择--</option>
                    @foreach($menu_list as $v)
                        <option value="{{$v['id']}}" @if($menu_info['pid'] == $v['id']) selected @endif  >{{$v['menu_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">菜单名称</label>
            <div class="layui-input-block">
                <input type="text" name="menu_name"  autocomplete="off" value="{{$menu_info['menu_name']}}" placeholder="菜单名称" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">菜单路由</label>
            <div class="layui-input-block">
                <input type="text" name="menu_route"  autocomplete="off" placeholder="菜单路由" value="{{$menu_info['menu_route']}}" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="submit" class="layui-btn" >立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(function(){
            $('.bac_btn').click(function(){
                window.location.href = "{{url('admin/menu')}}";
            });
        });
    </script>
    <script>
        layui.use(['form', 'layedit', 'laydate'], function(){
            var form = layui.form
                ,layer = layui.layer
                ,layedit = layui.layedit
                ,laydate = layui.laydate;


        });
    </script>
@endsection