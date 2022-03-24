<?php

namespace App\Http\Controllers\Delivery\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\GeneralTrait;

class ContactUsController extends Controller
{
    use GeneralTrait;

    public function index(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $inputs = $request->all();
        Contact::create($inputs);
        return $this->returnSuccessMessage('Done successfully');
    }

}
