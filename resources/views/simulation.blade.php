<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
        {{-- <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                <!-- <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24" class="d-inline-block align-text-top"> -->
                Simulation
                </a>
            </div>
        </nav> --}}

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Navbar Brand (Logo) -->
                <a class="navbar-brand" href="#">Simulation</a>
                <!-- Toggle button for mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

       

        <div class="container-xl">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card mt-5">
                <div class="card-header">
                    <label for="">Business Setup</label>
                </div>
                    <div class="card-body">
                        <form action="{{ route('systemSetup') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Package SRP</label>
                                        <input type="number" name="package_srp" class="form-control" placeholder="Package SRP">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Package Expense</label>
                                        <input type="number" name="package_expense" class="form-control" placeholder="Package Expense">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                    <label class="form-label">Direct Referral</label>
                                        <input type="number" name="direct_referall" class="form-control" placeholder="Direct Referral">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                    <label class="form-label">Personal Spill Over</label>
                                        <input type="number" name="personal_so" class="form-control" placeholder="Personal Spill Over">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                    <label class="form-label">Indirect Spill Over</label>
                                        <input type="number" name="indirect_so" class="form-control" placeholder="Personal Spill Over">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                    <label class="form-label">Perfect Structure Bonus</label>
                                        <input type="number" name="perfect_structure" class="form-control" placeholder="Perfect Structure Bonus">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Submit" class="btn btn-success btn-md">
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

</body>
</html>