@extends('layouts.app-pages')

@section('title', 'Работы')

@section('content')
<div id="content">
	<div class="inner">
		<div class="container_12">
			<div class="wrapper">
				<div class="grid_12">
					<div class="block">
						<div class="info-block">
							<a href="https:://t.me/skelebr1ne" rel="nofollow" class="link">Закажите</a> мои услуги до Нового года и получите скидку 15%!
						</div>
						<a href="https:://t.me/skelebr1ne/" class="button" rel="nofollow">Заказать</a>
					</div>
				</div>
			</div>
			<div class="wrapper">
				<div class="grid_12">
					<h2 class="h-pad1">Мои работы</h2>
					<ul class="wrapper works">

						@if ($portfolioJobs)
							@foreach ($portfolioJobs as $portfolioJob)
							<li class="grid_4 alpha">
								<p><a href="#" class="link">{{ $portfolioJob->name }}</a></p>
								Стоимость: {{ $portfolioJob->price }}{{ $portfolioJob->val }}
								<p><a href="#" class="button">Подробнее</a></p>
							</li>
							@endforeach
						@endif

						{{-- <li class="grid_4 alpha">
							<figure><img src="/images/works1.jpg" alt=""></figure>
							<p><a href="#" class="link">Project 1</a></p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, seiusmod tempor incididunt ut labore et dolore magna.
							<p><a href="#" class="button">Read more</a></p>
						</li> --}}
					</ul>
				</div>
			</div>
		</div>			
	</div>
</div>
@endsection