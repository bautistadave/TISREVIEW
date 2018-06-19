@extends('layouts.principal')
	@section('content')
				<div class="review-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="" alt="" /></a>
					<p>SATUMSS</p>
				</div>
				<div class="search v-search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="reviews-section">
				<h3 class="head">Lista de proyectos</h3>
					<div class="col-md-9 reviews-grids">
						@foreach ($proyectos as $var)


						<div class="review">
							<div class="movie-pic">
								{{-- <a href="single.html"><img src="images/r4.jpg" alt="" /></a> --}}
								<a href="proyectos/{{$var->path}}" target="_blank"><i class="fa fa-file-pdf-o" style="font-size:20px;color:red"></i></a>
								<img src="proyectos/{{$var->path}}" alt="" style="width:100px;" />
							</div>
							<div class="review-info">
								<a class="span" href="single.html">
									 <i>{{$var->titulo}}</i></a>
								<p class="info">AUTOR:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$var->autor}}</p>
								<p class="info">TUTOR: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$var->tutor}}</p>
								<p class="info">CARRERA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$var->namecarre}}</p>
								<p class="info">AREA:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$var->nameare}}</p>
								<p class="info">MODALIDAD:&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; {{$var->namemodal}}</p>
								<a class="info" href="proyectos/{{$var->path}}" target="_blank"><p class="info">Archivo:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$var->path}}</P></a>
								<p class="info">DESCRIPCION:&nbsp;&nbsp;&nbsp; &nbsp; {{$var->descripcion}}</p>
							</div>

							<div class="clearfix"></div>
						</div>

						@endforeach


						{{-- <div class="review">
							<div class="movie-pic">
								<a href="single.html"><img src="images/r1.jpg" alt="" /></a>
							</div>
							<div class="review-info">
								<a class="span" href="single.html">Lorem  <i>Movie Review</i></a>

								<p class="info">CAST:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Will Smith, Margot Robbie, Adrian Martinez, Rodrigo Santoro, BD Wong, Robert Taylor</p>
								<p class="info">DIRECTION: &nbsp;&nbsp;&nbsp;&nbsp;Glenn Ficarra, John Requa</p>
								<p class="info">GENRE:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Crime</p>
								<p class="info">DURATION:&nbsp;&nbsp;&nbsp; &nbsp; 1 hour 45 minutes</p>
							</div>
							<div class="clearfix"></div>
						</div> --}}

					</div>


					<div class="clearfix"></div>
			</div>
			</div>
		<div class="review-slider">
			 {{-- <ul id="flexiselDemo1">
				<li><img src="images/r1.jpg" alt=""/></li>
				<li><img src="images/r2.jpg" alt=""/></li>
				<li><img src="images/r3.jpg" alt=""/></li>
				<li><img src="images/r4.jpg" alt=""/></li>
				<li><img src="images/r5.jpg" alt=""/></li>
				<li><img src="images/r6.jpg" alt=""/></li>
			</ul> --}}
		</div>
	@endsection
