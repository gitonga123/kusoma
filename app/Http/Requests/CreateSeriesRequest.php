<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Series;

class CreateSeriesRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ];
    }

    /**
     * Function to handle file upload
    */
    public function uploadSeriesImage()
    {
        $uploadedImage = $this->file('image');
        $this->filename = str_slug($this->title). "." . $uploadedImage->getClientOriginalExtension();
        $uploadedImage->storePubliclyAs('series', $this->filename);


        return $this;
    }

    public function storeSeries()
    {
        Series::create([
            'title' => $this->title,
            'description' => $this->description,
            'slug' => str_slug($this->title),
            'image_url' => 'series/'. $this->filename
        ]);
    }
}
