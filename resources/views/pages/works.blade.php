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
							{{ \App\Models\Fielder::ff('slogan') }}
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
								<figure><img src="/storage/{{ $portfolioJob->image }}" alt=""></figure>
								<p><a href="#" class="link">{{ $portfolioJob->name }}</a></p>
								Стоимость: {{ $portfolioJob->price }}{{ $portfolioJob->val }}
								<p><a href="#" class="button">Подробнее</a></p>
							</li>
							@endforeach
						@endif
					</ul>
				</div>
			</div>
		</div>			
	</div>
</div>
@endsection