@extends('layouts.nafs_admin')
@include('layouts.navigation')


<div class="py-4">
		<section id="plant-list">
			<div class="container">
			
            @if(count($galleries)==0 | empty($galleries))
			<h2>No Results</h2>
                
			@else
			<h4 class="card-title color-warning">Image Gallery</h4>
				<div class="table-responsive">
				<table class="table table-striped" style="table-layout: fixed;">
					<thead>
						<th scope="col">Id</th>
						<th scope="col">Image Name</th>
						<th scope="col">Image File</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
					</thead>
                    <tbody>
                        @foreach($galleries as $gallery)
                        <tr>
                        <td scope="row" style="overflow:hidden">{{ $gallery->id }}</td>
							<td scope="row" style="overflow:hidden">{{ $gallery->name }}</td>
							<td scope="row" style="overflow:hidden">{{$gallery->img }}</td>
							<td >
                            <form action="{{ url('/dashboard/gallery/'.$gallery->id) }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-success">
											<i class="glyphicon glyphicon-file"></i>Details
									 </button>
								 </form>
                            </td>
                            <td >
                            <form action="{{ url('/dashboard/gallery/'.$gallery->id.'/edit') }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-info">
											<i class="glyphicon glyphicon-file"></i>Edit
									 </button>
								 </form>
                            </td>
                            <td >
                            <form action="{{ url('/dashboard/gallery/'.$gallery->id) }}" method="POST">
									{{ csrf_field() }}
                                    {{method_field('DELETE')}}
									 	<button type="submit" class="btn btn-danger">
											<i class="glyphicon glyphicon-file"></i>Delete
									 </button>
								 </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>

					
				</table>
			</div>
				{{ $galleries->appends(Request::all())->links("pagination::bootstrap-4") }}
               
                @endif
			</div>
		</section>
		</div>