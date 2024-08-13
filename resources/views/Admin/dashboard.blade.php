@extends('layout.frontend')
@section('content')
    
    <section class="content">
        <div class="container-fluid">
          
            <div class="card">
                <div class="card-header">
                    <div class="h2 text-primary">Daily Project Record</div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>

                            <tr>
                                <th>Id</th>
                                <th>Project_Name</th>
                                <th>User_Name</th>
                                <th>Date</th>
                                <th>Task-Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($project as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{$item->emp_id}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <a href="{{route('project.edit',$item->id)}}" class="btn btn-primary fw-bold p-2">Edit</a>
                                        <a href="" class="btn btn-danger fw-bold p-2">Delet</a>
                                    </td>
                                </tr>
                            @empty
                                <div>
                                    <tr>
                                        <td>Data Not Found</td>
                                    </tr>
                                </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </div>
    </section>
@endsection
