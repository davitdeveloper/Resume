<?php

namespace App\Http\Controllers;

class PdfController extends Controller
{

    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($name)
    {
        $file = public_path() . "/pdf/" . $name . ".pdf";

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, 'resume.pdf', $headers);
    }
}
