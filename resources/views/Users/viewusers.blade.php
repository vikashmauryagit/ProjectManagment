@extends('layout.frontend')
@section('content')
    <div class="row mx-5">
        <div class="col-12">
            <h1 class="text-danger text-center">View Employee Record</h1>
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
                    <span class="text-danger  text-danger fs-4">{{ session('success') }}</span>
                @endsession
                <div class="card-header p-0">
                    <table class="table">
                        <thead class="bg-dark ">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">designation</th>
                                <th scope="col">role</th>
                            </tr>
                        </thead>
                        <tbody id="userbody">
                            @foreach ($users as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    {{-- <td>{{$item->password}}</td> --}}
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->role }}</td>

                                    {{-- <td class="d-flex">
                                    <a href="{{ route('project.edit', $data->id) }}"><i
                                            class="fa-solid fa-pen-to-square  fa-lg border p-2 rounded bg-info px-1"></i></a>
                                    <a href=""><i
                                            class="fa-regular fa-eye fa-lg border p-2  bg-danger rounded px-1"></i></a>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($users->hasPages())
                <div class="mt-5">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#search").keyup(function() {
                var query = $(this).val();
                console.log("value:" + query);
                $.ajax({
                    url: '{{ route('user.search') }}',
                    type: 'GET',
                    data: {
                        'query': query
                    },
                    success: function(data) {
                        $('#userbody').html(data);
                    }
                });
            });
        });
    </script>
@endsection
