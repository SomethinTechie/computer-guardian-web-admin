<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LproCampaignStoreRequest extends FormRequest
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
            'title' => ['required','max:191', 'unique:campaigns'],
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
            'brand_name.required' => 'The lpro brand name field is required.',
            'title.required' => 'The lpro lpro title field is required.',
            'start_date.required' => 'The lpro start date field is required.',
            'end_date.required' => 'The lpro end date field is required.',
            'description.required' => 'The lpro description field is required.',
            'country_id.required' => 'The lpro country id field is required.',
            'billing_reference.required' => 'The lpro lpro billing reference field is required.',
            'import_id.required' => 'The lpro import id field is required.',
            'campaign_type_id.required' => 'The lpro campaign type id field is required.',
            'campaign_draw_name.required' => 'The lpro campaign draw name field is required.',
            'rewards.required' => 'At least one reward is required.',
            'billing_reference.alpha_num' => 'The lpro billing reference must only contain letters and numbers. No special charecters allowed.',
        ];
    }
}
