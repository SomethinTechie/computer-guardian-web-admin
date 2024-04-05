<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignStoreRequest extends FormRequest
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
            'brand_name' => ['required'],
            'title' => ['required','max:191'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'description' => ['required'],
            'country_id' => ['required'],
            'billing_reference' => ['required', 'unique:campaigns', 'alpha_num','max:16'],
            'import_id' => ['required', 'unique:campaigns'],
            'campaign_type_id' => ['required'],
            'campaign_draw_name' => ['required'],
            'rewards' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'The brand name field is required.',
            'title.required' => 'The title field is required.',
            'start_date.required' => 'The start date field is required.',
            'end_date.required' => 'The end date field is required.',
            'description.required' => 'The description field is required.',
            'country_id.required' => 'The country id field is required.',
            'billing_reference.required' => 'The billing reference field is required.',
            'import_id.required' => 'The import id field is required.',
            'campaign_type_id.required' => 'The campaign type id field is required.',
            'campaign_draw_name.required' => 'The campaign draw name field is required.',
            'rewards.required' => 'At least one reward is required.',
            'billing_reference.alpha_num' => 'The billing reference must only contain letters and numbers. No special charecters allowed.',
        ];
    }
}
