@extends('admin.layouts.template')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Loan /</span>Loan History</h4>

            <div class="row">
                <div class="col-md-12">

                    <div class="card mb-4">
                        <h5 class="card-header">Loan Paying History</h5>

                        <hr class="my-0" />
                        <div class="card-body">
                            <form action="" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="firstName" class="form-label">Bank Name</label>
                                        <select class="form-select"  aria-label="Default select example">
                                            <option selected>Select Bank Bank</option>
                                            @foreach ($bank_info as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->bank_name }}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="lastName" class="form-label">User Name</label>
                                        <select id="usernameSelect" class="form-select" aria-label="Default select example">
                                            <option selected>Select User Name</option>
                                            @foreach ($userloan_history as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                            </select>

                                            <div class="mb-3 col-md-6" id="userInfo">

                                            </div>
                                    </div>






                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->


        <div class="content-backdrop fade"></div>
    </div>
@endsection


@push('script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#usernameSelect').change(function() {
    var username = $(this).val();

    $.ajax({
        url: '/admin/loan-history/' + username,
        type: 'GET',
        success: function(response) {


           // Update UI with user information
        var userInfoHtml = `
            <label for="name" class="form-label text-success text-center">User Info</label>
            <p class="m-0 p-0">Name: ${response.name}</p>
            <p class="m-0 p-0">Year: ${response.year}</p>
            <p class="m-0 p-0">Month: ${response.month}</p>
            <p class="m-0 p-0">Ammount: ${response.ammount}</p>
            <p class="m-0 p-0">Date: ${response.date}</p>
        `;
        $('#userInfo').html(userInfoHtml);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
</script>


@endpush
