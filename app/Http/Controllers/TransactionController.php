<?php

namespace App\Http\Controllers;

use App\Budget;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TransactionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function createTransaction(Request $request) {
        $valid = $request->validate([
            'type' => 'required|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'nullable|date',
        ]);
        if ($valid) {
            return DB::transaction(function () {
                $transaction = new Transaction();
                $transaction->nature = Input::get('type');
                $transaction->amount = Input::get('amount');
                $transaction->date = Input::get('date');
                $transaction->description = Input::get('description');
                $transaction->user_id = Auth::user()->id;

                $budget = Budget::where('user_id', Auth::user()->id)->first();
                if (strtolower($transaction->nature) === 'dépense') {
                    if ($budget->amount < $transaction->amount) {
                        return false;
                    }
                    $budget->amount -= $transaction->amount;
                } else {
                    $budget->amount += $transaction->amount;
                }
                $budget->save();
                $transaction->save();
                return redirect('transactions');
            });
        } return null;
    }

    public function createBudget(Request $request) {
        $valid = $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);
        if ($valid) {
            $budget = new Budget();
            $budget->amount = Input::get('amount');
            $budget->user_id = Auth::user()->id;
            $budget->save();

            return redirect('budget');
        } return null;
    }

    public function budget() {
        return view('budget', [
            'budget' => Budget::where('user_id', Auth::user()->id)->first()
        ]);
    }

    public function transactions() {
        return view('transaction', [
            'transactions' => Transaction::where('user_id', Auth::user()->id)->get()
        ]);
    }

    public function newTransaction() {
        return view('transactionForm');
    }
}
