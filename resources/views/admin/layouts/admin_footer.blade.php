<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2017-{{Carbon\Carbon::now()->year}} <a href="https://mahbubshop.000webhostapp.com/">Mahabub Hssain</a>.</strong> All rights
    reserved.
</footer>


<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin/dist/js/adminlte.min.js')}}"></script>
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="{{asset('public/admin/dist/js/demo.js')}}"></script>--}}
<!-- CK Editor -->
{{--<script src="{{asset('public/admin/bower_components/ckeditor/ckeditor.js')}}"></script>--}}


<script src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>


<!-- Bootstrap WYSIHTML5 -->
{{--<script src="{{asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>--}}
<script src="{{asset('public/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script src="{{asset('public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>

<script>
    $(document).ready(function(){
        $('.select2').select2()
    });
</script>

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>