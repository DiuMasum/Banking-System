@extends('admin.layouts.template')


@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span> All User Account</h4>
        <div class="card">
            <h5 class="card-header">Available User Information</h5>
            @if (session()->has('message'))
                <div class="alert alret-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>DOB</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->dob }}</td>
                      </tr>
                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <!-- Bootstrap Table with Header - Light -->
    </div>
@endsection
