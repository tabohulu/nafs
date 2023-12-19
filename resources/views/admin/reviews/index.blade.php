@extends('layouts.nafs_admin')
@include('layouts.navigation')


<div class="py-4">
		<section id="plant-list">
			<div class="container">
			
            @if(count($reviews)==0 | empty($reviews))
			<h2>No Results</h2>
                
			@else
			<h4 class="card-title color-warning">Reviews</h4>
				<div class="table-responsive">
				<table class="table table-striped" style="table-layout: fixed;">
					<thead>
						<th scope="col">Review</th>
						<th scope="col">Rating</th>
						<th scope="col">Visible</th>
						<th scope="col">Related Order</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
					</thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                        <td scope="row" style="overflow:hidden">{{ $review->review }}</td>
							<td scope="row" style="overflow:hidden">{{ $review->rating }}/5</td>
							<td scope="row" style="overflow:hidden">
							@if(\App\Models\Orders::where('order_sn',$review->order_sn)->first()->shipped)
								Yes
							@else
								No
							@endif
							</td>
							<td scope="row" style="overflow:hidden">{{$review->order_sn }}</td>
							<td >
                            <form action="{{ url('/dashboard/reviews/'.$review->id) }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-success">
											<i class="glyphicon glyphicon-file"></i>Details
									 </button>
								 </form>
                            </td>
                            <td >
                            <form action="{{ url('/dashboard/reviews/showorder/'.$review->order_sn) }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-info">
											<i class="glyphicon glyphicon-file"></i>To Order
									 </button>
								 </form>
                            </td>
                            <td >
                            <form action="{{ url('/dashboard/reviews/'.$review->id) }}" method="POST">
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
				{{ $reviews->appends(Request::all())->links("pagination::bootstrap-4") }}
               
                @endif
			</div>
		</section>
		</div>