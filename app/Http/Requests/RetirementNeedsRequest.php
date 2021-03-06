<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RetirementNeedsRequest extends Request
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
            'annual_income' => 'required',
            'annual_ss_benefit' => 'required',
            'annual_employer_benefit' => 'required',
            'additional_annual_income_required' => 'required',
            'desired_retirement_age' => 'required',
            'retirement_age_factor' => 'required',
            'retirement_goal' => 'required',
            'employee_retirement_savings' => 'required',
            'personal_retirement_savings' => 'required',
            'investements_value' => 'required',
            'retirement_savings_and_investments' => 'required',
            'retirement_years_age' => 'required',
            'retirement_years_factor' => 'required',
            'future_value_of_savings_and_investments' => 'required',
            'entered_retirement_goal' => 'required',
            'entered_future_value_of_savings_and_investments' => 'required',
            'additional_savings_needed_for_retirement' => 'required',
            'entered_desired_retirement_age' => 'required',
            'addition_annual_savings_required' => 'required',
        ];
    }
}
