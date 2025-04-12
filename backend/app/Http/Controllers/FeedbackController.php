<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Display the feedback form
    public function showForm()
    {
        return view('feedback');
    }

    // Handle form submission
    public function submitFeedback(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        Feedback::create($data);

        return redirect()->back()->with('success', 'Feedback submitted!');
    }
}
