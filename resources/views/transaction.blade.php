@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-right">
                    <a style="border-radius: 0" href="{{ route('transaction_new') }}" class="btn btn-primary mr-auto">
                        ajouter
                    </a>
                </div>
                <br>
                <div class="card">
                    <!--<div class="card-header">
                        Liste des transactions
                    </div>-->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12">
                                @if (isset($transactions))
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Type</th>
                                            <th>Montant</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transactions as $transaction)
                                            <tr>
                                                <td>{{ $transaction->description }}</td>
                                                <td>{{ $transaction->nature }}</td>
                                                <td>{{ $transaction->amount }}</td>
                                                <td>{{ $transaction->date }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
