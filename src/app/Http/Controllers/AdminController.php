<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $createdAtStart = $request->input('start-date');
        $createdAtEnd = $request->input('end-date');
        $email = $request->input('email');

        $results = Contact::when($fullname, function ($query) use ($fullname) {
        return $query->where('fullname', 'like', '%' . $fullname . '%');
        })
        ->when($gender, function ($query) use ($gender) {
            if ($gender !== 'all') {
                $query->where('gender', $gender);
            }
        })
        ->when($createdAtStart, function ($query) use ($createdAtStart) {
        return $query->where('created_at', '>=', $createdAtStart);
        })
        ->when($createdAtEnd, function ($query) use ($createdAtEnd) {
        return $query->where('created_at', '<=', $createdAtEnd);
        })
        ->when($email, function ($query) use ($email) {
        return $query->where('email', 'like', '%' . $email . '%');
        })
        ->paginate(10);

        return view('admin.management', ['results' => $results]);
    }

    public function delete($id)
    {
        $record = Contact::findOrFail($id);
        $record->delete();

        return redirect()->route('admin.management')->with('success', 'レコードが削除されました');
    }

    public function showAllResults()
    {
        $allResults = Contact::all();

        return view('admin.management', ['allResults' => $allResults]);
    }
}
