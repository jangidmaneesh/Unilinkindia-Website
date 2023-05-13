@extends('admin.template.master') 
@section('title', $title)
@section('content')

<style type="text/css">

	.hide{
		display:none;
	}

	.upload-poster {
	    display: inline-block;
	    padding: 4px 12px;
	    margin-bottom: 0;
	    font-size: 14px;
	    line-height: 20px;
	    color: #000;
	    text-align: center;
	    vertical-align: middle;
	    cursor: pointer;
	    border: 1px solid #bbbbbb;
	    border-bottom-color: #a2a2a2;
	    -webkit-border-radius: 4px;
	    -moz-border-radius: 4px;
	    border-radius: 4px;
	}

	.organisation-logo{
	    width: 200px;
	    height: 200px;
	    border: 1px solid #bbbbbb;
	    margin-top: 20px;
	}

</style>

@php

$btitle = '';
$bimage = '';
if(isset($bannerData))
{
	$btitle = $bannerData->title; 
	$bimage = $bannerData->image;  
}

@endphp

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	            <h3 class="content-header-title mb-0 d-inline-block">Banners</h3>
	            <div class="row breadcrumbs-top d-inline-block">
	                <div class="breadcrumb-wrapper col-12">
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a></li>
		                    <li class="breadcrumb-item"><a href="{{ route('auth.banner.indexside') }}">Edit Banner</a></li>
		                    <li class="breadcrumb-item active">Data</li>
		                </ol>
	                </div>
	            </div>
            </div>
        </div>
        <div class="content-body">
        	<!-- Basic form layout section start -->
			<section id="horizontal-form-layouts">
				<div class="row">
					<div class="col-md-12">
				        <div class="card">
				            <div class="card-header">
				                <h4 class="card-title" id="horz-layout-colored-controls">Banners</h4>
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
				                    		<h4 class="form-section"><i class="fa fa-eye"></i> Edit Side Banner</h4>
							                <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Banner Title <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<input class="form-control border-primary" type="text" placeholder="Job Title" id="userinput5" name="title" value="{{ trim($btitle) }}" required="">
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
					                        <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">						
						        						<label class="col-md-3 label-control" for="userinput3">Banner Image : </label>
							    						<div class="col-md-9">
									                        <input type="file" name="image" id="imageUpload" class="hide"> 
									                        <label for="imageUpload" class="upload-poster mr-5">Select file</label> Max Size 2 MB<br>
									                        @if(trim($bimage))
									                        <img src="../../../storage/app/public/banner/{{ trim($bimage) }}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
									                        @else
									                        <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
									                        @endif
									                    </div>
									                </div>
						    					</div>
						    				</div>
										</div>

				                        <div class="form-actions right">
				                            <button type="submit" class="btn btn-primary" name="publish">
				                                <i class="fa fa-check-square-o"></i> Submit
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

@stop

@section('javascript')

@endsection
