@extends('layout.layout')
@section('content')
       

        <div class="container-xl">
                    <div class="card mt-3 mb-3">
                        <div class="card-header">
                            <label for="">Total Simulation</label>
                        </div>
                            <div class="card-body">
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Total Package SRP</label>
                                                <input type="text" readonly value="{{ number_format($params['total_package_srp'], 2); }}" name="package_srp" class="form-control" placeholder="Package SRP">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="form-label">Total Package Expense</label>
                                                <input type="text" readonly value="{{ number_format($params['total_package_expense'], 2); }}" name="package_expense" class="form-control" placeholder="Package Expense">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                            <label class="form-label">Total Direct Referral</label>
                                                <input type="text" value="{{ number_format($params['total_dr'], 2); }}" readonly name="direct_referall" class="form-control" placeholder="Direct Referral">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                            <label class="form-label">Total Personal Spill Over</label>
                                                <input type="text" readonly value="{{ number_format($params['total_pso'], 2); }}" name="personal_so" class="form-control" placeholder="Personal Spill Over">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                            <label class="form-label">Total Indirect Spill Over</label>
                                                <input type="text" readonly value="{{ number_format($params['total_iso'], 2); }}" name="indirect_so" class="form-control" placeholder="Personal Spill Over">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                            <label class="form-label">Total Perfect Structure Bonus</label>
                                                <input type="text" value="{{ number_format($params['total_ps'], 2); }}" readonly name="perfect_structure" class="form-control" placeholder="Perfect Structure Bonus">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                            <label class="form-label">Total Expense</label>
                                                <input type="text" style="color: red;" readonly value="{{ number_format($params['total_expense'], 2); }}" name="indirect_so" class="form-control" placeholder="Personal Spill Over">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                            <label class="form-label">Total Gross Income</label>
                                                <input type="text" style="color: green;" value="{{ number_format($params['total_gross_sales'], 2); }}" readonly name="perfect_structure" class="form-control" placeholder="Perfect Structure Bonus">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                            <label class="form-label">Total Net Income</label>
                                                @if($params['total_net_sales'] > 0)
                                                    <input type="text" style="color: green;" value="{{ number_format($params['total_net_sales'], 2); }}" readonly name="perfect_structure" class="form-control" placeholder="Perfect Structure Bonus">
                                                @else
                                                    <input type="text" style="color: red;" value="{{ number_format($params['total_net_sales'], 2); }}" readonly name="perfect_structure" class="form-control" placeholder="Perfect Structure Bonus">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mt-3 mb-3">
                                    <div class="card-header">
                                        <label for="">Perfect Structure</label>
                                    </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Upline</th>
                                                    <th>Username</th>
                                                    <th>Commission</th>
                                                </tr>
                                                <tbody>
                                                    @foreach ($params['ps_list'] as $ps_list)
                                                    <tr>
                                                        
                                                            <td>{{ $ps_list->username_bonus }}</td>
                                                            <td>{{ $ps_list->username }}</td>
                                                            <td>{{ $ps_list->amount }}</td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mt-3 mb-3">
                                    <div class="card-header">
                                        <label for="">Direct Invite</label>
                                    </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Sponsor</th>
                                                    <th>Username</th>
                                                    <th>Commission</th>
                                                </tr>
                                                <tbody>
                                                    @foreach ($params['dr_list'] as $ps_list)
                                                    <tr>
                                                        
                                                            <td>{{ $ps_list->sponsor }}</td>
                                                            <td>{{ $ps_list->username }}</td>
                                                            <td>{{ number_format($params['system_setup']->direct_referall, 2) }}</td>
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card mt-3 mb-3">
                                    <div class="card-header">
                                        <label for="">Spill Over</label>
                                    </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Upline</th>
                                                    <th>Username</th>
                                                    <th>Commission</th>
                                                    <th>Status</th>
                                                </tr>
                                                <tbody>
                                                    @foreach ($params['so_list'] as $so_list)
                                                    <tr>
                                                        
                                                            <td>{{ $so_list->username_bonus }}</td>
                                                            <td>{{ $so_list->username }}</td>
                                                            <td>{{ $so_list->commission }}</td>
                                                            @if ($so_list->status == 1)
                                                                <td style="color:green">Personal Spill Over</td>
                                                            @else
                                                                <td style="color:red">Indirect Spill Over</td>
                                                            @endif
                                                            
                                                        
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
            </div>
        </div>
@endsection