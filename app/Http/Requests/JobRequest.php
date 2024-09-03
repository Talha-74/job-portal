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
            'job_title'             => 'required|string|max:255',
            'job_region'            => 'required|string|max:255',
            'job_type'              => 'required|string|max:50',
            'company'               => 'required|string|max:255',
            'vacancy'               => 'required|integer|min:1',
            'experience'            => 'nullable|string|max:255',
            'category'              => 'required|string|max:100',
            'salary'                => 'nullable|numeric|min:0',
            'gender'                => 'nullable|string|in:male,female,any',
            'application_deadline'  => 'required|date|after_or_equal:today',
            'job_description'       => 'required|string',
            'responsibilities'      => 'nullable|string',
            'education_experience'  => 'nullable|string',
            'other_benefits'        => 'nullable|string',
            'image_path'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'salary.numeric'                        => 'The salary must be a valid number.',
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
