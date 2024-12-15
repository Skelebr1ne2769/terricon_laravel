@extends('layouts.app-pages')

@section('title', 'Клиенты')

@section('content')
	<div id="content">
		<div class="ic">More Website Templates @ TemplateMonster.com - April 15, 2013!</div>
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
						<div class="block">
							<h2>Our Clients</h2>
								<a href="#" class="prev"></a>
								<a href="#" class="next"></a>
							<div class="carousel">
								<ul class="clients-list">
									<li><a href="#"><img src="/images/client1.png" alt="" height="52" width="188"></a></li>
									<li><a href="#"><img src="/images/client2.png" alt="" height="52" width="188"></a></li>
									<li><a href="#"><img src="/images/client3.png" alt="" height="52" width="188"></a></li>
									<li><a href="#"><img src="/images/client4.png" alt="" height="52" width="188"></a></li>
								<li><a href="#"><img src="/images/client1.png" alt="" height="52" width="188"></a></li>
									<li><a href="#"><img src="/images/client2.png" alt="" height="52" width="188"></a></li>
									<li><a href="#"><img src="/images/client3.png" alt="" height="52" width="188"></a></li>
									<li><a href="#"><img src="/images/client4.png" alt="" height="52" width="188"></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
			</div>			
		</div>
	</div>
@endsection