@section('script')

    <script type="text/javascript">

     function deleteData(id)
     {
         var id = id;
         var url = '{{ route("backend.permissions.destroy", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
         $("#deleteForm").submit();
     }

    </script>

    @endsection
