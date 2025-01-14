@extends('admin.template.master') 

@section('title', $title)

@section('content')

@php

$id = '';
$title = '';
$sub_title = '';
$template = '';
$short = '';
$short2 = '';
$short3 = '';
$description = '';
$image = '';
$image1 = '';
$image2 = '';
$video = '';
$services_type = '';

if(isset($userData))
{
  $id = $userData->id;
  $title = $userData->title;
  $sub_title = $userData->sub_title;
  $short = $userData->short_description;
  $short2 = $userData->short_description2;
  $short3 = $userData->short_description3;
  $description = $userData->description; 
  $template = $userData->template; 
  $services_type = $userData->services; 
  $image = $userData->image; 
  $image1 = $userData->image1; 
  $image2 = $userData->image2; 
  $video = $userData->video; 
}

$userId= Auth::user()->id;

@endphp

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Policies</h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="{{ route('auth.policies.index') }}">Policies</a>
              </li>
              <li class="breadcrumb-item active">Data
              </li>
            </ol>
          </div>
        </div>
      </div>
      {{-- <div class="content-header-right col-md-4 col-12">
        <div class="btn-group float-md-right">
          <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Action</button>
          <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
          </div>
        </div>
      </div> --}}
    </div>
    <div class="content-body">
      <!-- Basic form layout section start -->
      <section id="horizontal-form-layouts">
        <div class="row">
          <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-colored-controls">Policies</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                <li><a data-action="close"><i class="ft-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collpase show">
                        <div class="card-body">
                            @include('admin.partials.flash_message')          

                            <form action="{{ $action }}" method="post" enctype="multipart/form-data" class="form form-horizontal">
                              @csrf()
                              @if(!empty($method)) @method($method) @endif
                              
                                <div class="form-body">
                                  <h4 class="form-section"><i class="fa fa-eye"></i> About policies</h4>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="userinput1">Title : <span class="danger">*</span></label>
                                          <div class="col-md-9">
                                              <input type="text" id="userinput1" class="form-control border-primary" placeholder="Title" name="title" value="{{ $title }}" required="">
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="userinput1">Sub Title : <span class="danger">*</span></label>
                                          <div class="col-md-9">
                                              <input type="text" id="userinput1" class="form-control border-primary" placeholder="Title" name="sub_title" value="{{ $sub_title }}" required="">
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                		<div class="col-md-12">
                                            <div class="form-group row">
                                            	<label class="col-md-3 label-control" for="userinput1">Services : <span class="danger">*</span></label>
                                            	<div class="col-md-9">
                                                	<select name="services" class="form-control select2"> 
                                                        <option>--Select--</option>
                                                        @foreach($services as $s)
                                                            <option value="{{ $s->id }}" <?php if($s->id == $services_type){ echo "selected"; } ?>>{{ $s->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                		<div class="col-md-12">
                                            <div class="form-group row">
                                            	<label class="col-md-3 label-control" for="userinput1">Template : <span class="danger">*</span></label>
                                            	<div class="col-md-9">
                                                	<select name="template" class="form-control select2"> 
                                                        <option value="1" <?php if($template == 1){ echo "selected"; } ?>>Template 1</option>
                                                        <option value="2" <?php if($template == 2){ echo "selected"; } ?>>Template 2</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="userinput1">Short Description 1 : <span class="danger">*</span></label>
                                          <div class="col-md-9">
                                              <input type="text" id="userinput1" class="form-control border-primary" placeholder="Short Description 1" name="short_description" value="{{ $short }}" required="">
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="userinput1">Short Description 2 :</label>
                                          <div class="col-md-9">
                                              <input type="text" id="userinput1" class="form-control border-primary" placeholder="Short Description 2" name="short_description2" value="{{ $short2 }}">
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group row">
                                          <label class="col-md-3 label-control" for="userinput1">Short Description 3 :</label>
                                          <div class="col-md-9">
                                              <input type="text" id="userinput1" class="form-control border-primary" placeholder="Short Description 3" name="short_description3" value="{{ $short3 }}">
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="display: none;">
                                                <button id="edit"></button>
                                                <button id="save"></button>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput3"> Description <span class="text-danger">*</span> :</label>
                                                <div class="col-md-9">      
                                                    <textarea class="summernote" name="description">{{ $description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Image 1 :</label>
                                                <div class="col-md-9">
                                                  <input type="file" name="image1" id="imageUpload" class="hide"> 
                                                  <label for="imageUpload" class="upload-poster mr-5">Select file</label> Max Size 2 mb<br>
                                                  @if(trim($image1))
                                                    <img src="{{ env('APP_URL')}}/storage/app/public/policy/{{ trim($image1) }}" style="width: 100%; height: 300px;">
                                                  @else
                                                    <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
                                                  @endif
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Image 2 :</label>
                                                <div class="col-md-9">
                                                  <input type="file" name="image2" id="imageUpload1" class="hide"> 
                                                  <label for="imageUpload1" class="upload-poster mr-5">Select file</label> Max Size 2 mb<br>
                                                  @if(trim($image2))
                                                    <img src="{{ env('APP_URL')}}/storage/app/public/policy/{{ trim($image2) }}" style="width: 100%; height: 300px;">
                                                  @else
                                                    <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview1" class="organisation-logo" alt="Your image will appear here.">
                                                  @endif
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="userinput1">Background Image : <span class="danger">*</span></label>
                                                <div class="col-md-9">
                                                  <input type="file" name="image" id="imageUpload2" class="hide"> 
                                                  <label for="imageUpload2" class="upload-poster mr-5">Select file</label> Max Size 2 mb<br>
                                                  @if(trim($image))
                                                    <img src="{{ env('APP_URL')}}/storage/app/public/policy/{{ trim($image) }}" style="width: 100%; height: 300px;">
                                                  @else
                                                    <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview2" class="organisation-logo" alt="Your image will appear here.">
                                                  @endif
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
					                    <div class="col-md-12">
				                        	<div class="form-group row">						
				        						<label class="col-md-3 label-control" for="userinput3">Video : </label>
					    						<div class="col-md-9">
							                        <input type="file" name="video" id="file-2" class="inputfile" data-multiple-caption="{count} files selected" accept="video/*">
							                        <label for="file-2" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label>
							                        <video width="100%" height="385px" style="margin-top: 20px;" controls>
													  <source src="../../../storage/app/public/video/{{ trim($video) }}" type="video/mp4">
													</video>
							                    </div>
							                </div>
				    					</div>
				    				</div>
                                </div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- // Basic form layout section end -->
    </div>
  </div>
</div>

@endsection