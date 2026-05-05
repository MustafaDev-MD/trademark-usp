<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientFormController extends Controller
{
    public function submitForm(Request $request)
    {
        // Sabhi inputs lena (except CSRF token)
        $allData = $request->except('_token');
        $userEmail = $request->emailAddress;
        $userName = $request->firstName;

        try {
            Mail::send([], [], function ($message) use ($allData, $userEmail, $userName, $request) {
                $message->to('info@trademarkusp.com')
                        ->subject("New Trademark Submission: $userName")
                        ->replyTo($userEmail, $userName);

                // Saara data table format mein email body ke liye
                $html = "<h3>New Application Details</h3><table border='1' cellpadding='8' style='border-collapse:collapse; width:100%;'>";
                foreach ($allData as $key => $value) {
                    if (!is_object($value)) { // Files ko skip karke text data lena
                        $label = ucwords(preg_replace('/(?<!^)[A-Z]/', ' $0', $key));
                        $html .= "<tr><td style='background:#f4f4f4;'><b>$label</b></td><td>" . nl2br(htmlspecialchars($value)) . "</td></tr>";
                    }
                }
                $html .= "</table>";

                $message->html($html);

                // Logo file attach karna
                if ($request->hasFile('logoFile')) {
                    $file = $request->file('logoFile');
                    $message->attach($file->getRealPath(), [
                        'as' => $file->getClientOriginalName(),
                        'mime' => $file->getMimeType(),
                    ]);
                }
            });

            return redirect()->route('thank-you')->with('success', 'Form submitted successfully!');

        } catch (\Exception $e) {
            return back()->with('error', 'Mail Error: ' . $e->getMessage());
        }
    }
}
