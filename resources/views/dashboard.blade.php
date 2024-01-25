@extends('layout.layout')
@section('content')
       

        <div class="container-xl">
            <div class="card mt-3">
                <div class="card-header">
                    <label for="">Business Setup</label>
                </div>
                    <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Package SRP</label>
                                        <input type="text" readonly value="{{ number_format($params['system_setup']->package_srp, 2) }}" name="package_srp" class="form-control" placeholder="Package SRP">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Package Expense</label>
                                        <input type="text" value="{{ number_format($params['system_setup']->package_expense, 2) }}" readonly name="package_expense" class="form-control" placeholder="Package Expense">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                    <label class="form-label">Direct Referral</label>
                                        <input type="text" value="{{ number_format($params['system_setup']->direct_referall, 2) }}" readonly name="direct_referall" class="form-control" placeholder="Direct Referral">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                    <label class="form-label">Personal Spill Over</label>
                                        <input type="text" value="{{ number_format($params['system_setup']->personal_so, 2) }}" readonly name="personal_so" class="form-control" placeholder="Personal Spill Over">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                    <label class="form-label">Indirect Spill Over</label>
                                        <input type="text" value="{{ number_format($params['system_setup']->indirect_so, 2) }}" readonly name="indirect_so" class="form-control" placeholder="Personal Spill Over">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                    <label class="form-label">Perfect Structure Bonus</label>
                                        <input type="text" value="{{ number_format($params['system_setup']->perfect_structure, 2) }}" readonly name="perfect_structure" class="form-control" placeholder="Perfect Structure Bonus">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card mt-3 mb-3">
                    <div class="card-header">
                        <label for="">Add Members</label>
                    </div>
                        <div class="card-body">
                                <form action="{{ route('addmembers') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" name="username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Sponsor</label>
                                                <select name="sponsor" id="" class="form-control">
                                                    <option value="" selected disabled>Choose a Sponsor</option>
                                                    @foreach ($params['sponsors'] as $sponsor)
                                                        <option value="{{ $sponsor->username }}">{{ $sponsor->username }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Upline</label>
                                                <select name="upline" id="" class="form-control">
                                                    <option value="" selected disabled>Choose a Upline</option>
                                                    @foreach ($params['upline'] as $upline)
                                                        <option value="{{ $upline->username }}">{{ $upline->username }}</option>
                                                    @endforeach
                                                </select>
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
@endsection