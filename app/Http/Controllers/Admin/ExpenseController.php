<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Expense;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    public function index()
    {
        $data['expenses'] = Expense::latest('id')->paginate(10);
        return view('expense.index', $data);
    }


    public function create()
    {
        return view('expense.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try{
            DB::beginTransaction();
            $expense              = new Expense();
            $expense->name        = $request->name;
            $expense->amount      = $request->amount;
            $expense->date        = $request->date;
            $expense->category_id = $request->category_id;
            $expense->description = $request->description;
            $expense->paid_by     = 'testing';
            if($request->hasFile('image')){
                $file = $request->file('image');
                $path = 'uploads/expense';
                $expense->image = ImageHelper::upload($file, $path);
                $expense->image_url = asset($path . '/' . $expense->image);
            }
            $expense->save();
            DB::commit();
            $output = ['success' => 1, 'msg' => 'Expense Added Successfully'];
        }catch (\Exception $e){
            DB::rollback();
            $output = ['success' => 0, 'msg' => $e->getMessage()];
        }

        return redirect()->back()->with($output);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function updateStatus (Request $request)
    {
        try {
            DB::beginTransaction();

            $expense = Expense::findOrFail($request->id);
            $expense->status = $expense->status == 1 ? 0 : 1;
            $expense->save();

            $output = ['status' => 1, 'msg' => __('Status updated')];

            DB::commit();
        } catch (Exception $e) {
            $output = ['status' => 0, 'msg' => __('Something went wrong')];
            DB::rollBack();
        }

        return response()->json($output);
    }
}
