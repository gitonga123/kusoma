@extends('layouts.app')

@section('title', 'New Series')

@section('content')
      <!-- Header -->
      <header class="header header-inverse bg-fixed" style="background-image: url({{ asset('img/bg-laptop.jpg') }})" data-overlay="8">
        <div class="container text-center">

          <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">

              <h1>Portfolio blocks</h1>
              <p class="fs-18 opacity-70">Develop your pages by copy and pasting ready blocks</p>

            </div>
          </div>

        </div>
      </header>
    <!-- END Header -->
  <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Contact 2
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
        !-->
       {{--  <h6 class="section-info" id="contact-2"><a href="#contact-2">New Series</a></h6> --}}


      <div class="section">
          <div class="row gap-y">
            <div class="col-12 col-md-12">

              <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="alert alert-success">Create a series</div>

                <div class="form-group">
                  <input class="form-control form-control-lg" type="text" name="title" placeholder="Title">
                </div>

                <div class="form-group">
                  <input class="form-control form-control-lg" type="file" name="image" placeholder="Image">
                </div>

                <div class="form-group">
                  <textarea class="form-control form-control-lg" name="description" rows="4" placeholder="Description"></textarea>
                </div>


                <button class="btn btn-lg btn-primary btn-block" type="submit">Send Enquiry</button>
              </form>

            </div>
          </div>


        </div>
      </div>

@endsection