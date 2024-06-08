<?php

namespace App\Http\Controllers;

use App\Models\Addbank;
use App\Models\Loanhistory;
use App\Models\Useraccount;
use Illuminate\Http\Request;

class UseraccountController extends Controller
{
    public function Adduser(){
        return view('admin.adduser');
    }
    public function Storeuser(Request $request){
        $request->validate([
            'name' => 'required|unique:useraccounts',
            'mobile' => 'required|unique:useraccounts',
            'email' => 'required|unique:useraccounts',
            'address' => 'required',
            'mothers_name' => 'required',
            'fathers_name' => 'required',
            'dob' => 'required'
        ]);

        Useraccount::insert([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'mothers_name' => $request->mothers_name,
            'fathers_name' => $request->fathers_name,
            'dob' => $request->dob
        ]);

        return redirect()->route('alluser')->with('message', 'User account created successfully!');
    }

    public function Alluser(){
        $users = Useraccount::latest()->get();

        return view('admin.alluser', compact('users'));
    }

    public function Addbank(){
        return view('admin.addbank');
    }

    public function Storebank(Request $request){
        $request->validate([
            'bank_name' => 'required|unique:addbanks',
            'address' => 'required',
        ]);

        Addbank::insert([
            'bank_name' => $request->bank_name,
            'address' => $request->address,
        ]);

        return redirect()->route('allbank')->with('message', 'New Bank created successfully!');
    }

    public function Allbank(){
        $banks = Addbank::latest()->get();

        return view('admin.allbank', compact('banks'));
    }

    public function Loanapply(){
        $bank_info = Addbank::latest()->get();
        $user_info = Useraccount::latest()->get();

        return view('admin.loanapply', compact('bank_info', 'user_info'));
    }

    public function getUserInfo($id)
    {
        $user = Useraccount::find($id);

        return response()->json($user);
    }

    public function Loancalculte(Request $request)
    {
        $amount = $request->input('amount');
        $duration = $request->input('duration');
        $percentage = $request->input('percentage');


        $perMonth = $amount / $duration;
        $interest = $amount * ($percentage / 100);
        $monthly = $perMonth + $interest ;
        $total =  $amount + ($interest * $duration);



        $data = [
            'total'=>$total,
            'monthly'=>$monthly,
        ];

        return response()->json($data);
    }

    public function Loanhistorypage(){
        $bank_info = Addbank::latest()->get();
        $userloan_history = Loanhistory::latest()->get();

        return view('admin.loanhistorypage', compact('bank_info', 'userloan_history'));
    }

    public function Loanhistory($id)
    {
        $user = Loanhistory::find($id);

        return response()->json($user);
    }
}
