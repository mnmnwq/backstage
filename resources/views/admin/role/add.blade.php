@extends('layout.admin')
@section('body')
    <button type="button" class="layui-btn back_btn">返回</button>
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