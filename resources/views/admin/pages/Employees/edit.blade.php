@extends('admin.main')


@section('content')
    <div class="app-content-header">



        <!--begin::Container-->
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        * {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Employee</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <div class="app-content">

        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Quick Example</div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!--begin::Body-->
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputFirstName1" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="exampleInputFirstName1" name="first_name"
                            value="{{ old('first_name', $employee->first_name) }}" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputLastName1" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="exampleInputLastName1" name="last_name"
                            value="{{ old('last_name', $employee->last_name) }}" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email" value="{{ old('email', $employee->email) }}" required />

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhone1" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="exampleInputPhone1" name="phone"
                            value="{{ old('phone', $employee->phone) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputSalary1" class="form-label">Salary</label>
                        <input type="number" class="form-control" id="exampleInputSalary1" name="salary"
                            value="{{ old('salary', $employee->salary) }}" />

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputCity1" class="form-label">City</label>
                        <input type="text" class="form-control" id="exampleInputCity1" name="city"
                            value="{{ old('city', $employee->city) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputDepartment1" class="form-label">Department</label>
                        <input type="text" class="form-control" id="exampleInputDepartment1" name="department"
                            value="{{ old('department', $employee->department) }}" />
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputDescription1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleInputDescription1" name="description">{{ old('description', $employee->description) }}</textarea>
                    </div>


                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection
