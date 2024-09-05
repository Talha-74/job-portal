<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'job_title'             => 'required',
            'job_region'            => 'required',
            'job_type'              => 'required',
            'company'               => 'required',
            'vacancy'               => 'required',
            'experience'            => 'nullable',
            'category'              => 'required',
            // 'salary'                => 'nullable|numeric|min:0',
            'gender'                => 'nullable',
            'application_deadline'  => 'required',
            'job_description'       => 'required',
            'responsibilities'      => 'nullable',
            'education_experience'  => 'nullable',
            'other_benefits'        => 'nullable',
            'image_path'            => 'nullable',
        ];
    }

    /**
     * Get the custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'job_title.required'                    => 'The job title is required.',
            'job_region.required'                   => 'The job region is required.',
            'job_type.required'                     => 'The job type is required.',
            'company.required'                      => 'The company name is required.',
            'vacancy.required'                      => 'The number of vacancies is required.',
            'vacancy.integer'                       => 'The number of vacancies must be an integer.',
            'category.required'                     => 'The job category is required.',
            // 'salary.numeric'                        => 'The salary must be a valid number.',
            'gender.in'                             => 'The selected gender is invalid. Choose from male, female, or any.',
            'application_deadline.required'         => 'The application deadline is required.',
            'application_deadline.date'             => 'The application deadline must be a valid date.',
            'application_deadline.after_or_equal'   => 'The application deadline must be today or a future date.',
            'image_path.image'                      => 'The file must be an image.',
            'image_path.mimes'                      => 'The image must be a file of type: jpeg, png, jpg, gif.',
            'image_path.max'                        => 'The image size may not be greater than 2MB.',
        ];
    }
}
