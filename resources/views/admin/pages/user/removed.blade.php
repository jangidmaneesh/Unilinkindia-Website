@extends('admin.template.master') 

@section('title', $title)

@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Users</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{ route('auth.users.removed') }}">Removed Users List</a>
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
          <!-- HTML5 export buttons table -->
	      <section id="html5">
	      	<div class="row">
	      		<div class="col-12">
	      			<div class="card">
	      				<div class="card-header">
	      					<h4 class="card-title">Users List</h4>
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
	      				<div class="card-content collapse show">
	      					<div class="card-body card-dashboard">
	      						@include('admin.partials.flash_message') 
	      						<table class="table table-striped table-bordered dataex-html5-export">
	      							<thead>
	      								<tr>
	      									<th>S.No</th>
	      									<th>Name</th>
	      									<th>Email</th>
	      									<th>Type</th>
	      									<th>Removed On</th>
	      									<th>Action</th>
	      								</tr>
	      							</thead>
	      							<tbody>
	      								@foreach($users as $k=>$u)

										<tr>
											<td>{{ ++$k }}</td>
											<td>{{ $u->name }}</td>
											<td>{{ $u->email }}</td>
											<td>
												@if($u->user_type == 1)
												    Admin
												@else
												    User
												@endif
											</td>
											<td>{{ Carbon\Carbon::parse($u->updated_at)->format('d-M-Y H:i:s') }}</td>
											<td style="display: flex; border-bottom: none;">
												<form action="{{ route('undouser', $u->id) }}" method="POST">
										            {{ csrf_field() }} 
										            <a onclick="return confirm('Are you sure to Undo this user ?');" data-toggle="tooltip" data-placement="top" title="Undo">
										            	<button type="submit" class="btn btn-primary" name="removedStatus" value="10"><i class="fa fa-undo"></i></button>
										            </a>
										        </form> 
										        <a href="{{ route('auth.user.delete', $u->id) }}" onclick="return confirm('Are you sure to Delete this user ?');" data-toggle="tooltip" data-placement="top" title="Delete">
													<button class="btn btn-danger" style="margin: auto 5px;"><i class="fa fa-trash"></i></button>
												</a> 			
											</td>

										</tr>

										@endforeach	      								
	      							</tbody>
	      							<tfoot>
	      								<tr>
	      									<th>S.No</th>
	      									<th>Name</th>
	      									<th>Email</th>
	      									<th>Type</th>
	      									<th>Removed On</th>
	      									<th>Action</th>
	      								</tr>
	      							</tfoot>
	      						</table>				
	      					</div>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </section>
          <!--/ HTML5 export buttons table -->
        </div>
      </div>
    </div>


@endsection

