<table class="table table-bordered" id="DataTable">
    <thead>
    <tr>
        <th>Action</th>
        <th>Image</th>
        <th>Name</th>
        <th>prescriptionname</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
    {{--@foreach($prescriptions as $prescription)--}}

        <tr>
            <td>

                {{--{!! Form::open(['method' => 'DELETE', 'route' => ['backend.prescriptions.destroy', $prescription->id]]) !!}--}}
                {{--<a href="{{ route('backend.prescriptions.edit',$prescription->id)}}" class="btn btn-outline-primary btn-sm">--}}
                    {{--<i class="fa fa-edit"></i>--}}
                    {{--<!-- /.fa fa-edit -->--}}
                {{--</a>--}}

                    <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fa fa-times"></i>
                    </button>


                <!-- /.btn bt-danger -->
                {{--{!! Form::close() !!}--}}
            </td>

            {{--@endforeach--}}
        </tr>
    </tbody>
</table>