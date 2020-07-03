<?php

namespace App\Http\Requests;

use App\Mail\SendMail;
use App\Resume;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:1,12',
            'birth_day' => 'required',
            'address' => 'required|string|max:255',
            'educations.*.name' => 'required',
            'experiences.*.name' => 'required',
            'languageSkills.*.name' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'educations.*.name.required' => 'The educations field is required.',
            'experiences.*.name.required' => 'The experiences field is required.',
            'languageSkills.*.name.required' => 'The languages field is required.',
        ];
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function createResume()
    {
        request()->request->add(['user_id' => Auth::id()]);
        $requestResume = $this->only(['user_id', 'firstname', 'lastname', 'email', 'phone', 'address', 'birth_day']);
        $resume = Resume::create($requestResume);

        if ($resume) {
            $resume->educations()->createMany($this->educations);
            $resume->experiences()->createMany($this->experiences);
            $resume->languages()->createMany($this->languageSkills);

            Mail::to($this->email)->queue(new SendMail($this->email, $this->phone));

            $pdf = $this->convertPDF($resume, $this);

            return response()->json($pdf, 200);
        }

        return response()->json(['data' => 'error'], 404);
    }

    /**
     * @param $model
     * @param $resume
     * @return string
     */
    public function convertPDF($model, $resume)
    {
        $pdf = PDF::loadView('pdf', compact('resume'));
        $pdfName = $model['firstname'] . '-' . time();
        $pdf->save(public_path() . '/pdf/' . $pdfName . '.pdf');
        $model->pdf_name = $pdfName;
        $model->save();
        return $pdfName;
    }
}
