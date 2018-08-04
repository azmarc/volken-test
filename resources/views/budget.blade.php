@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if (empty($budget))
                            <div class="row">
                                <form action="{{ route('define_budget') }}" class="col-12" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="form-group">
                                                <input type="number" class="form-control" name="amount" placeholder="Montant du budget">
                                            </div>
                                        </div>
                                        <div class="col-3 text-right">
                                            <button class="btn btn-primary m-auto">valider</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @else
                            <h5>Votre budget est de <strong>{{ $budget->amount }}</strong></h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
