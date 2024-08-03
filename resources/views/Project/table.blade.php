@forelse ($data as $dd)
    <tr>
        <th scope="row">{{ $dd->id }}</th>
        <td>{{ $dd->name }}</td>
        <td>{{ $dd->status }}</td>
        <td>{{ $dd->description }}</td>
        {{-- <td>{{ $data->contact }}</td>
        <td>{{ $data->startdate }}</td>
        <td>{{ $data->enddate }}</td>
        <td>{{ $data->members }}</td> --}}
        <td class="d-flex">
            <a href="{{ route('project.edit', $dd->id) }}"><i
                    class="fa-solid fa-pen-to-square  fa-lg border p-2 rounded bg-info px-1"></i></a>
            <a href=""><i class="fa-regular fa-eye fa-lg border p-2  bg-danger rounded px-1"></i></a>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center">No Patient Data Available</td>
    </tr>
@endforelse
