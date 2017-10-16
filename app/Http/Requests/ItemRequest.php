<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
        //dd(request()->all());
        
        if(request()->item_image !== null)
        {

            return [
            
                'catagory_id' => 'required',
                'type_id' => 'required',
                'item_name' => 'required',
                'opening_qnt' => 'required',
                'min_qnt' => 'required',
                'item_code' => 'required|min:5',
                'item_image' => 'image|mimes:jpeg,png|max:2048',
                'item_unit' => 'required'
            

            ];
        }
        else
        {
            return [
                
                'catagory_id' => 'required',
                'type_id' => 'required',
                'item_name' => 'required',
                'opening_qnt' => 'required',
                'min_qnt' => 'required',
                'item_code' => 'required|min:5',
                'item_unit' => 'required'

            ];
        }
       
    }
}
