@extends('admin.template.master')

@section('content')
<div class="right_col" role="main">
  <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>New Slider</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><br />
            <center>
                @if(session()->has('msg'))
                    <b>{{ session()->get('msg') }}</b>
                @endif
                <br>
            </center>
            <!-- Section For New User registration -->
            <form method="POST" autocomplete="off" action="{{ route('admin.upload_slider') }}" class="form-horizontal form-label-left" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="well" style="overflow: auto">
                    <div class="form-row mb-3">

                        <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                            <label for="slider">Upload Slider (height: 400px *Width: 1140px)</label>
                            <input type="file"  name="slider" id="slider"  class="form-control col-md-7 col-xs-12">
                            @error('slider')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                  
              <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" name="submit" class="btn btn-success form-text-element">Upload Slider</button>
                  </div>
                </div>
            </form>
            <!-- End New User registration -->
            </div>
          </div>
        </div>
      </div>
</div>
@endsection