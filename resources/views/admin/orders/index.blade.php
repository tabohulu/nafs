@extends('layouts.nafs_admin')
@include('layouts.navigation')


<div class="py-4">
		<section id="plant-list">
			<div class="container">
			<div class="form-group row">
				<div class="col-sm-2">
				<form action="{{ url('/dashboard/orders') }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-success">
											<i class="glyphicon glyphicon-file"></i><<
									 </button>

									 <input type="hidden" name="prev" value="{{$prev}}">
								 </form> 
				</div>
				<div class="col-sm-2"></div>

				<div class="col-sm-4">
						<h3>Orders for {{$current}}</h1>
					<!-- <form action="/admin/reservations" method="GET">
								<input type="hidden" name="next">

								<button type="submit">前に</button>
							</form> -->
					</div>

					<div class="col-sm-2"></div>

				<div class="col-sm-2">
				 <form action="{{ url('/dashboard/orders') }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-success">
											<i class="glyphicon glyphicon-file"></i>>>
									 </button>

									 <input type="hidden" name="next" value="{{$next}}">
								 </form> 
				</div>

			</div>
			
            @if(count($orders)==0 | empty($orders))
			<h2>No Results</h2>
                
			@else
			<h4 class="card-title color-warning">Orders</h4>
			
				<div class="table-responsive">
				<table class="table table-striped" style="table-layout: fixed;">
					<thead>
						<th scope="col">Order Date</th>
						<th scope="col">Product</th>
						<th scope="col">Quantity</th>
						<th scope="col">Total</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
					</thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
						@if(!empty(App\Models\Product::find($order->product_id)))
                        <td scope="row" style="overflow:hidden">{{ $order->date }} @if($order->shipped) <br>( Shipped ) @endif</td>
							<td scope="row" style="overflow:hidden">
							{{App\Models\Product::find($order->product_id)->name}}({{App\Models\Product::find($order->product_id)->variety}})
						</td>
							<td scope="row" style="overflow:hidden">{{$order->quantity }}</td>
							<td scope="row" style="overflow:hidden">GH&#8373;{{$order->total }}</td>
							<td >
                            <form action="{{ url('/dashboard/orders/'.$order->id) }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-success">
											<i class="glyphicon glyphicon-file"></i>Details
									 </button>
								 </form>
                            </td>
                            <td >
                            <form action="{{ url('/dashboard/orders/'.$order->id.'/edit') }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-info">
											<i class="glyphicon glyphicon-file"></i>Edit
									 </button>
								 </form>
                            </td>
                            <td >
                            <form action="{{ url('/dashboard/orders/'.$order->id) }}" method="POST">
									{{ csrf_field() }}
                                    {{method_field('DELETE')}}
									 	<button type="submit" class="btn btn-danger">
											<i class="glyphicon glyphicon-file"></i>Delete
									 </button>
								 </form>
                            </td>
                        </tr>
						@endif

                        @endforeach
                    </tbody>

					
				</table>
			</div>
				{{ $orders->appends(Request::all())->links("pagination::bootstrap-4") }}
               
                @endif
			</div>
		</section>
		</div>