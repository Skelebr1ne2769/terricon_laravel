@extends('layouts.app-pages')

@section('title', 'Блог')

@section('content')

	<div id="content">
		<div class="ic">More Website Templates @ TemplateMonster.com - April 15, 2013!</div>
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
							<div class="wrapper">
								<div class="grid_8 alpha">
									<div class="grid-inner">
									<h2 class="h-pad h-indent">Последние посты ({{count($posts)}})</h2>

									@if(count($posts))
										@foreach($posts as $post)

										<div class="block">
											<div class="post">
												<div class="wrapper">
													<div class="info">
														<div class="wrapper">
															<div class="date">
																<span>{{ date('M', strtotime($post->created_at)) }}</span>
																<strong>{{ date('d', strtotime($post->created_at)) }}</strong>
															</div>
															<a href="{{ route('pages', ['name' => 'post', 'post_id' => $post->id]) }}"><strong>{{$post->name}}</strong></a><br>
															Автор: <a href="#">
																<strong>{{ \App\Models\User::getName($post->user_id) }}</strong>
															</a>
													</div>
													
												</div>
												<div class="comments">
													({{ $post->getComments()->count() }}) комментариев<span></span>
												</div>
											</div>
											<figure><a href="{{ route('pages', ['name' => 'post', 'post_id' => $post->id]) }}"><img src="/storage/{{ $post->preview }}" alt=""></a><figure>
												<p>{{ $post->description }}</p>
												<a href="{{ route('pages', ['name' => 'post', 'post_id' => $post->id]) }}" class="button1">Подробнее</a>
											</div>
										</div>
										@endforeach
										{{ $posts->appends($_GET)->links() }}
									@else
										<p>Постов в данной категории не найдено.</p>
									@endif
								</div>
							</div>
								<div class="grid_4 omega">
									<div class="block block-pad">
										<h2>Категории</h2>
										<ul class="list">		

											@if($categories)
												@foreach($categories as $category)
													<li><a href="{{ route('pages', [
														'name' => 'blog',
														'category_id' => $category->id
													]) }}">{{ $category->name }} ({{ \App\Models\Post::where('category_id', $category->id)->count() }})</a></li>
												@endforeach
											@endif
										</ul>

										<form action="{{ route('pages', 'blog') }}" method="GET">
											@if(request()->get('category_id'))
												<input type="hidden" name="category_id" value="{{ request()->get('category_id', '') }}">
											@endif
											<select onchange="this.parentNode.submit();" name="count_posts">
												<option value="5">5 постов</option>
												<option value="10">10 постов</option>
												<option value="25">25 постов</option>
												<option value="50">50 постов</option>
											</select>
										</form>
									</div>
									
									<a href="{{ route('pages', 'blog') }}" class="button1">Сбросить</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
@endsection
