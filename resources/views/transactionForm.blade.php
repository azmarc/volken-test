@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">AJOUTER UNE TRANSATION</div>

                    <div class="card-body">
                        <div class="">
                            <form action="{{ route('transaction_create') }}" class="col-12" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" id="date" required>
                                </div>
                                <div class="form-group row">
                                    <label for="type">Type</label>
                                    <select class="form-control" name="type" id="type" required>
                                        <option>revenu</option>
                                        <option>dépense</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="amount">Montant</label>
                                    <input type="number" class="form-control" name="amount" id="amount" required>
                                </div>
                                <div class="form-group row">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" required>
                                    </textarea>
                                </div>

                                <div class="form-group row">
                                    <div class="col-12 text-right p-0">
                                        <button class="btn btn-primary m-auto">valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
