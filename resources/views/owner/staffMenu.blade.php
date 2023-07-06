@extends('layouts.index')

@section('content')
<h1>Staff List</h1>
    <div class="d-grid">
        <a href="{{ route('staff.create') }}" class="btn btn-primary">Create New Staff</a>
    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <br>
    <table class="table ">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staff as $data)
                <tr>
                    <th scope="row">{{ $data->id }}</th>
                    <td class="editable" id="td_name_{{ $data->id }}">{{ $data->name }}</td>
                    <td class="editable" id="td_email_{{ $data->id }}">{{ $data->email }}</td>
                    <td><a href="{{ route('staff.edit', $data->id) }}"
                        class="btn btn-xs btn-default">Edit Staff</a>
                        <form action="{{ route('staff.destroy', $data->id) }}" method="POST" class="flex-fill">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-xs btn-default"
                                onclick="return confirm('Delete {{ $data->id }} - {{ $data->name }}?')">
                        </form>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
@section('scripts')
    <script>

    </script>
@endsection
