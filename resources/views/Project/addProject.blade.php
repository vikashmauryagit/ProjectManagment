@extends('layout.frontend')


@section('content')
    <section class="">
        <h1 class="text-center text-danger border-bottom border-2 border-danger">Add Project</h1>
        <form action="{{ route('project.store') }}" method="post">
            <div class="row mx-5 border bg-light p-3 mt-1">
                @csrf
                @foreach ($data as $item)
                    <input type="hidden" name="emp_id" id="" value="{{ $item->id }}">
                @endforeach
                <div class="col-4">
                    <label for="projectName" class="m-1">Project Name<span class="text-danger">*</span></label>
                    <input type="text" id="projectName" class="form-control" placeholder="project name" name="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="client" class="m-1">Client<span class="text-danger">*</span></label>
                    <input type="text" id="client" class="form-control" placeholder="Client name" name="client">
                    @error('client')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="status" class="m-1">Status<span class="text-danger">*</span></label>
                    <input type="text" id="status" class="form-control" placeholder="Enter status" name="status">
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="inputDescription" class="m-1">Project Description<span
                            class="text-danger">*</span></label>
                    <textarea id="inputDescription" class="form-control" rows="4" name="description"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="contact" class="m-1">Contact Person<span class="text-danger">*</span></label>
                    <input type="text" id="contact" class="form-control" placeholder="Contact name" name="contact">
                    @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="startdate" class="m-1">Start-Date<span class="text-danger">*</span></label>
                    <input type="date" id="startdate" class="form-control" placeholder="Enter start date"
                        name="startdate">
                    @error('startdate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="enddate" class="m-1">End-Date<span class="text-danger">*</span></label>
                    <input type="date" id="enddate" class="form-control" placeholder="Enter end date" name="enddate">
                    @error('enddate')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4 mt-2">
                    <details>
                        <summary>Select Employee</summary>
                        @forelse ($data as $dd)
                            @if ($dd->role === 'employee')
                                <label for="{{ $dd->id }}">{{ $dd->name }}</label>
                                <input type="checkbox" name="employee[]" id="{{ $dd->id }}" value="{{ $dd->name }}">
                            @endif
                            <br>
                        @empty
                            <p>No Employee Found!</p>
                        @endforelse
                    </details>

                    @error('employee')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-4 mt-2 datahere">hello</div>

                <div class="col-12 my-3">
                    <button class="btn btn-primary col-12 text-light p-1">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('scriptFile')
    <script>
        $(document).ready(function(){
            $(".datahere").html("hmmm")
        })
    </script>
@endsection
