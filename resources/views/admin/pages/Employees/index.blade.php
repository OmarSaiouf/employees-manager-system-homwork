@extends('admin.main')

@section('content')
    <div class="app-content-header">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Employees</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employees</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <div class="app-content">
        <a href="{{ route('employee.create') }}" class="btn btn-success mb-2"><i class="bi bi-plus"></i> Create Employee</a>
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">({{ $employeesCount }}) Employees</h3>
                <div class="card-tools">
                    <ul class="pagination pagination-sm float-end">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 1px">#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Salary</th>
                            <th>Department</th>
                            <th style="width: 4px">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $k => $item)
                            <tr class="align-middle">
                                <a href="{{ route('employee.show', $item['id']) }}">
                                    <td>{{ $k + 1 }}.</td>
                                    <td>{{ $item['first_name'] }} {{ $item['last_name'] }}</td>
                                </a>
                                <td>
                                    {{ $item['email'] }}
                                </td>
                                <td>{{ $item['phone'] }}</td>
                                <td>{{ $item['city'] }}</td>
                                <td>{{ $item['salary'] }}</td>
                                <td>{{ $item['department'] }}</td>
                                <td>
                                    <form id="delete-form-{{ $item['id'] }}"
                                        action="{{ route('employee.destroy', $item['id']) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                    </form>
                                    <a href="{{ route('employee.edit', $item['id']) }}"><i class="bi bi-pen-fill"></i></a>
                                    <a
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item['id'] }}').submit();"><i
                                            class="bi bi-trash-fill text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
