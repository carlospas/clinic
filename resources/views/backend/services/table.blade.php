<table class="table table-bordered" id="DataTable">
    <thead>
    <tr>
        <th>Action</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @foreach($services as $services)

        <tr>
            <td>

                {!! Form::open(['method' => 'DELETE', 'route' => ['backend.services.destroy', $services->id]]) !!}
                <a href="{{ route('backend.services.edit',$services->id)}}" class="btn btn-outline-primary btn-sm">
                    <i class="fa fa-edit"></i>
                    <!-- /.fa fa-edit -->
                </a>
                <!-- /.btn  btn-default -->
                    <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-sm btn-outline-danger">
                        <i class="fa fa-times"></i>
                    </button>

            <!-- /.btn bt-danger -->
                {!! Form::close() !!}
            </td>
            <td>{{$services->title}}</td>
            @endforeach
        </tr>
    </tbody>
</table>