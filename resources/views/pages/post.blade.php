@extends('layouts.app-pages')
@section('title', "Блог / $post->name")
@section('content')
<div id="content">
	<div class="ic">More Website Templates @ TemplateMonster.com - April 15, 2013!</div>
	<div class="inner">
		<div class="container_12">
			<div class="wrapper">
				<div class="grid_12">
					<div class="block">
						<div class="info-block">
							<a href="https://t.me/mazaretto" rel="nofollow" class="link">Закажите</a> разработку у меня и получите скидку 15% на все услуги до Нового года.
                                *Только для новых клиентов.
						</div>
						<a href="https://t.me/mazaretto" class="button" rel="nofollow">Заказать</a>
					</div>
				</div>
			</div>
			<div class="wrapper">
				<div class="grid_12">
						<div class="wrapper">
							<div class="grid_12 alpha">
								<div class="grid-inner">
                                <a href="{{ route('pages', 'blog') }}">Назад</a>
								<h2 class="h-pad h-indent">{{ $post->name }} </h2>
								<div class="block">
                                <div class="post">
                                    <div class="wrapper">
                                        <div class="info">
                                            <div class="wrapper">
                                                <div class="date">
                                                    <span>may</span><strong>15</strong>
                                                </div>
                                            Author: <strong>{{ $post->user_id }}</strong>
                                            </div>
                                            
                                        </div>
                                        <div class="comments">
                                            No comments<span></span>
                                        </div>
                                    </div>
                                    <figure><a href="#"><img src="{{ $post->preview }}" alt=""></a><figure>
                                        <p>{{ $post->description }}</p>
                                </div>
                            </div>
								
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
@endsection