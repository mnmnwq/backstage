@extends('layout.admin')
@section('body')
{{--    <button type="button" class="layui-btn add_btn">增加菜单</button>--}}
<form action="{{url('admin/do_role_power')}}" method="post">
    <input type="hidden" name="role_id" value="{{$role_id}}">
    @csrf
    <br/>
    <br/>
    <br/>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" >立即提交</button>
        </div>
    </div>
    <table class="layui-table">
        <colgroup>
            <col width="10%">
            <col width="10%">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>选择</th>
            <th>层级</th>
            <th>菜单名称</th>
            <th>菜单路由</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menu as $v)
            <tr>
                <td>@if($v['level'] != 0) <input type="checkbox" name="sel[]" value="{{$v['id']}}"> @endif</td>
                <td>{!! str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v['level']).'|-' !!}</td>
                <td>{{$v['menu_name']}}</td>
                <td>{{$v['menu_route']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

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
            $('.add_btn').click(function(){
                window.location.href = "{{url('admin/add_menu')}}";
            });
            layui.use(['form', 'layedit', 'laydate'], function(){
                var form = layui.form
                    ,layer = layui.layer
                    ,layedit = layui.layedit
                    ,laydate = layui.laydate;
                $('.sort').blur(function(){
                    var sort = $(this).val();
                    var id = $(this).attr('data-id');
                    $.ajax({
                        'type':'post',
                        'url':"{{url('admin/menu_sort')}}",
                        'data':{id:id,sort:sort},
                        'dataType':'json',
                        success:function(result){
                            if(result.errno == 0){
                                window.location.reload();
                            }else{
                                layer.msg(result.msg);
                            }
                        }
                    });
                });

            });

        });
    </script>
@endsection