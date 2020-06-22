<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            //
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'number_people' => ['required', 'numeric'],
            'type_tour' => ['required', 'string'],
            'image' => 'required',
            'depart' => 'required',
            'schedule' => ['required', 'string'],
        ];
    }
    public function messages()
    {
        return [
            //
            'depart.required' => 'Ban chua nhap ngay',
            'schedule.required' => 'Ban chua nhap so ngay',
            'number_people.required' => 'Ban chua nhap so nguoi',
            'type_tour.required' => 'Ban chua nhap kieu',
            'image.required' => 'Ban chua nhap hinh anh',
            'name.required' => 'Ban chua nhap ten',
            'price.required' => 'Ban chua nhap gia',
            'name.string' => 'Ban nhap ten khong dung',
            'price.numeric' => 'Ban nhap gia phai la so',
            'number_people.numeric' => 'Ban nhap so nguoi phai la so'
        ];
    }
}
