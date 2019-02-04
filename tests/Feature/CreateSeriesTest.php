<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Storage;

class CreateSeriesTest extends TestCase
{
	use WithFaker;
	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */ 
    public function test_a_user_can_create_a_series()
    {
        $this->withoutExceptionHandling();

    	Storage::fake(config('filesystems.default'));

    	UploadedFile::fake(config('filesystems.default'));
        $this->post('/admin/series', [
        	'title' => 'vue.js for the best',
        	'description' => 'The best vue casts ever',
        	'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertRedirect('/admin/series')
            ->assertSessionHas('success', 'Series Created Successfully');

        Storage::disk(config('filesystems.default'))->assertExists('series/' . str_slug('vue.js for the best').'.png');

        $this->assertDatabaseHas('series', [
        	'slug' => str_slug('vue.js for the best')
        ]);
    }

    public function test_a_series_must_be_created_with_a_description()
    {
        $this->post('/admin/series', [
            'title' => 'The best vue casts ever',
            'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertSessionHasErrors('description');
    }

    public function test_a_series_must_be_created_with_an_image()
    {
        $this->post('/admin/series', [
            'title' => 'The best vue casts ever',
            'description' => 'The best vue casts ever',
            // 'image' => UploadedFile::fake()->image('image-series.png')
        ])->assertSessionHasErrors('image');
    }

    public function test_a_series_must_be_created_with_a_valid_image()
    {
        $this->post('/admin/series', [
            'title' => 'The best vue casts ever',
            'description' => 'The best vue casts ever',
            'image' => 'STRING_INVALID_IMAGE'
        ])->assertSessionHasErrors('image');
    }
}
