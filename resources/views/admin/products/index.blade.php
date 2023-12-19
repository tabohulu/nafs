@extends('layouts.nafs_admin')
@include('layouts.navigation')


<div class="py-4">
		<section id="plant-list">
			<div class="container">
			
            @if(count($products)==0 | empty($products))
			<h2>No Results</h2>
                
			@else
			<h4 class="card-title color-warning">Products</h4>
				<div class="table-responsive">
				<table class="table table-striped" style="table-layout: fixed;">
					<thead>
						<th scope="col">Product Name</th>
						<th scope="col">Price</th>
						<th scope="col">Stock</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
					</thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                        <td scope="row" style="overflow:hidden">{{ $product->name }}</td>
							<td scope="row" style="overflow:hidden">{{ $product->price }}</td>
							<td scope="row" style="overflow:hidden">{{$product->stock_status }}</td>
							<td >
                            <form action="{{ url('/dashboard/products/'.$product->id) }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-success">
											<i class="glyphicon glyphicon-file"></i>Details
									 </button>
								 </form>
                            </td>
                            <td >
                            <form action="{{ url('/dashboard/products/'.$product->id.'/edit') }}" method="GET">
									{{ csrf_field() }}
									 	<button type="submit" class="btn btn-info">
											<i class="glyphicon glyphicon-file"></i>Edit
									 </button>
								 </form>
                            </td>
                            <td >
                            <form action="{{ url('/dashboard/products/'.$product->id) }}" method="POST">
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
				{{ $products->appends(Request::all())->links("pagination::bootstrap-4") }}
               
                @endif
			</div>
		</section>
		</div>