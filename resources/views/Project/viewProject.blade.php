@extends('layout.frontend')


@section('content')
    <div class="row mx-5">
        <div class="col-12">
            <h1 class="text-danger text-center">View Record</h1>
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="form-group">
                        <div class="input-group ">
                            <input type="text" name="query" class="form-control " id="search"
                                placeholder="search by name and email">
                            <div class="input-group-append">
                                <button type="submit" class="btn  btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                @session('success')
                    <span class="text-danger fs-5">{{ session('success') }}</span>
                @endsession
                <div class="card-header p-0">
                    <table class="table">
                        <thead class="bg-dark ">
                            <tr>
                                @if (Auth::User()->role !== 'admin')
                                    <th scope="col">ID</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Assign Developer</th>
                                @else
                                    <th scope="col">ID</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Contact Person</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Assign Developer</th>
                                    <th scope="col">Action</th>
                                @endif

                            </tr>

                        </thead>
                        <tbody id="projectbody">
                            @foreach ($project as $data)
                                <tr>
                                    @if (Auth::User()->role !== 'admin')
                                        <th scope="row">{{ $data->id }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>{{ $data->employee }}</td>
                                    @else
                                        <th scope="row">{{ $data->id }}</th>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->client }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>{{ $data->contact }}</td>
                                        <td>{{ $data->startdate }}</td>
                                        <td>{{ $data->enddate }}</td>
                                        <td>{{ $data->employee }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('project.edit', $data->id) }}"><i
                                                    class="fa-solid fa-pen-to-square  fa-lg border p-2 rounded bg-info px-1"></i></a>
                                            <a href=""><i
                                                    class="fa-regular fa-eye fa-lg border p-2  bg-danger rounded px-1"></i></a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($project->hasPages())
                <div class="mt-5">
                    {{ $project->links() }}
                </div>
            @endif

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').keyup(function() {
                var query = $(this).val();
                console.log("query:" + query);
                $.ajax({
                    url: '{{ route('project.search') }}',
                    type: 'GET',
                    data: {
                        'query': query,
                    },
                    success: function(data) {
                        $('#projectbody').html(data);
                    }
                });

            });
        });
    </script>
@endsection
