<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeInvite extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $project = \App\Project::find($this->request->get('project'));
        return $project && $project->isManager($this->user()->name);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mail' => 'required|email',
            'title' => 'required|min:6',
        ];
    }
}
