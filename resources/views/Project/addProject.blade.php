@extends('layout.frontend')


@section('content')
    <section class="">
        <h1 class="text-center text-danger border-bottom border-2 border-danger">Add Project</h1>
        <form action="{{ route('project.store') }}" method="post">
            <div class="row mx-5 border bg-light p-3 mt-1">
                @csrf
                @foreach ($data as $item)
                    <input type="hidden" name="emp_id" id="" value="{{$item->id}}">
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
                    <select class="form-control" name="employee[]" id="emp">
                        @foreach ($data as $dd)
                        @if($dd->role === "employee")
                            <option value="{{$dd->id}}">{{$dd->name}}</option>
                            @endif
                        @endforeach
                    </select>
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






{{-- 
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Abhi"> Abhi</a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Vikas"> Vikas</a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Faizan"> Faizan </a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Abhi2"> Abhi </a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Ravi"> Ravi </a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Sohan"> Sohan </a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Rohan"> Rohan </a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Mohan"> Mohan </a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Suraj"> Suraj </a></li>
            <li><a class="dropdown-item" href="#"><input type="checkbox" class="item" id="Anil"> Anil</a></li>
        </ul>
    </div>

    <div class="child"></div>

    <script>
        let child = document.querySelector(".child");
        let items = document.querySelectorAll(".item");

        items.forEach(item => {
            item.addEventListener("change", function () {
                updateChild();
            });
        });

        function updateChild() {
            let selectedItems = [];
            items.forEach(item => {
                if (item.checked) {
                    selectedItems.push(item.nextSibling.nodeValue.trim());
                }
            });
            child.innerHTML = selectedItems.join(", ");
        }
    </script>
   
</body>

</html> --}}
