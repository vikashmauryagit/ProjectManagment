@extends('layout.frontend')
@section('content')
    <h1 class="text-center text-danger border-bottom borer-2 border-danger">Add Employee</h1>
    @session('success')
        <span class="text-danger text-center">{{ session('success') }}</span>
    @endsession
    <form action="{{ route('employeeregi') }}" method="post">
        <div class="row mx-5 border bg-light p-3 mt-1">
            @csrf
            <div class="col-4">
                <label for="" class="m-1">Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="First name" name="name">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <label for="" class="m-1">Email<span class="text-danger">*</span></label>
                <input type="email" class="form-control" placeholder="email" name="email">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <label for="" class="m-1">Username<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="username" name="username">
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-4">
                <label for="inputDescription" class="m-1">Password<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="designation" name="password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
                <label for="" class="m-1">Designation<span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="First name" name="designation">
                @error('designation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <input type="text" name="role" value="Employee" hidden>
            {{-- <div class="col-4">
                <div class="form-group">
                    <label for="inputStatus m-0 p-0">Role<span class="text-danger">*</span></label>
                    <select id="inputStatus" class="form-control custom-select" name="role">
                        <option selected disabled>role</option>
                        <option value="admin" hidden>Admin</option>
                        <option value="employee">Employee</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}

            <div class="col-12 my-3">
                <button class="btn btn-primary  col-12 text-light p-1">Submit</button>
            </div>
    </form>
@endsection
