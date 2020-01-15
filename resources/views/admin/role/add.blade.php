@extends('layout.admin')
@section('body')
    <button type="button" class="layui-btn back_btn">返回</button>
    <form class="layui-form" action="{{url('admin/do_add_role')}}" method="post">
        @csrf
        <div class="layui-form-item">
            <label class="layui-form-label">角色名称</label>
            <div class="layui-input-block">
                <input type="text" name="role_name"  autocomplete="off" placeholder="角色名称" class="layui-input">
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.back_btn').click(function(){
                window.location.href = "{{url('admin/role')}}";
            });
            layui.use(['form', 'layedit', 'laydate'], function(){
                var form = layui.form
                    ,layer = layui.layer
                    ,layedit = layui.layedit
                    ,laydate = layui.laydate;


            });

        });
    </script>
@endsection