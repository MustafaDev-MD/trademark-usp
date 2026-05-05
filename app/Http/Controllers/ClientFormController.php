<?php

namespace App\Http\Controllers;

use App\Models\ClientApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientFormController extends Controller
{
    public function submitForm(Request $request)
    {
        $allData = $request->except('_token');
        $userEmail = $request->emailAddress;
        $userName = $request->firstName;

        // Logo file upload
        $logoPath = null;
        if ($request->hasFile('logoFile')) {
            $logoPath = $request->file('logoFile')->store('logos', 'public');
        }

        // DB mein save karo
        ClientApplication::create([
            'first_name'           => $request->firstName,
            'last_name'            => $request->lastName,
            'owner_of_mark'        => $request->ownerMark,
            'dba'                  => $request->dba,
            'business_name'        => $request->businessName,
            'business_nature'      => $request->bizNature,
            'mailing_address'      => $request->mailAddress,
            'city'                 => $request->city,
            'state'                => $request->state,
            'country'              => $request->country,
            'zip_code'             => $request->zipCode,
            'phone_number'         => $request->phoneNumber,
            'website'              => $request->website,
            'email_address'        => $request->emailAddress,
            'trademark_type'       => $request->trademarkType,
            'mark_details'         => $request->markDetails,
            'business_description' => $request->businessDescription,
            'using_logo'           => $request->usingLogo ?? 'No',
            'logo_file'            => $logoPath,
            'usage_list'           => $request->usageList,
            'date_of_use'          => $request->dateOfUse ?: null,
        ]);

        // Email bhejna (pehle wala code)
        try {
            Mail::send([], [], function ($message) use ($allData, $userEmail, $userName, $request) {
                $message->to('info@trademarkusp.com')
                    ->subject("New Trademark Submission: $userName")
                    ->replyTo($userEmail, $userName);

                $html = "<h3>New Application Details</h3><table border='1' cellpadding='8' style='border-collapse:collapse; width:100%;'>";
                foreach ($allData as $key => $value) {
                    if (!is_object($value)) {
                        $label = ucwords(preg_replace('/(?<!^)[A-Z]/', ' $0', $key));
                        $html .= "<tr><td style='background:#f4f4f4;'><b>$label</b></td><td>" . nl2br(htmlspecialchars($value)) . "</td></tr>";
                    }
                }
                $html .= "</table>";
                $message->html($html);

                if ($request->hasFile('logoFile')) {
                    $file = $request->file('logoFile');
                    $message->attach($file->getRealPath(), [
                        'as' => $file->getClientOriginalName(),
                        'mime' => $file->getMimeType(),
                    ]);
                }
            });
        } catch (\Exception $e) {
            // Email fail ho toh bhi redirect karo, data save ho gaya
        }

        return redirect()->route('thank-you')->with('success', 'Form submitted successfully!');
    }

    public function adminIndex()
    {
        $applications = \App\Models\ClientApplication::latest()->get();
        return view('admin.client-applications.index', compact('applications'));
    }

    public function adminShow($id)
    {
        $app = \App\Models\ClientApplication::findOrFail($id);
        return view('admin.client-applications.show', compact('app'));
    }
}
