@extends('layout.frontend')

@section('content')
    <section class="content">

        <h1 class="text-center text-danger border-bottom border-2 border-danger">Edit Project</h1>
        <form action="{{ route('project.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mx-5 border bg-light p-3 mt-1">

                <div class="col-4">
                    <label for="" class="m-1">Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="First name" name="name"
                        value="{{ $project->name }}">
                </div>

                <div class="col-4">
                    <label for="" class="m-1">Client<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Last name" name="client"
                        value="{{ $project->client }}">
                </div>

                <div class="col-4">
                    <label for="" class="m-1">Status<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="enter status" name="status"
                        value="{{ $project->status }}">
                </div>

                <div class="col-12">
                    <label for="inputDescription" class="m-1">Project Description<span
                            class="text-danger">*</span></label>
                    <textarea id="inputDescription" class="form-control" rows="4" name="description">{{ $project->description }}</textarea>
                </div>

                <div class="col-4">
                    <label for="" class="m-1">Contact Person<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="First name" name="contact"
                        value="{{ $project->contact }}">
                </div>

                <div class="col-4">
                    <label for="" class="m-1">Start-Date<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" placeholder="enter start date" name="startdate"
                        value="{{ $project->startdate }}">
                </div>

                <div class="col-4">
                    <label for="" class="m-1">End-Date<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" placeholder="enter end date" name="enddate"
                        value="{{ $project->enddate }}">
                </div>

                <div class="col-4 mt-2">
                    <details>
                        <summary>Select Employee</summary>
                        @forelse ($user as $dd)
                            @if ($dd->role === 'employee')
                                <label for="{{ $dd->id }}">{{ $dd->name }}</label>
                                <input type="checkbox" name="employee[]" id="{{ $dd->id }}" value="{{ $dd->name }}"
                                    @if (in_array($dd->name, $project->employee)) checked @endif>
                                <br>
                            @endif
                        @empty
                            <p>No Employee Found!</p>
                        @endforelse
                    </details>
                    
                    @error('employee')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-12 my-3">
                    <button class="btn btn-primary col-12 text-light p-1">Submit</button>
                </div>

            </div>
        </form>
    </section>
@endsection
