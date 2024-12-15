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
							{{ \App\Models\Fielder::ff('slogan') }}
						</div>
						<a href="https://t.me/skelebr1ne" class="button" rel="nofollow">Заказать</a>
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
															<span>{{ date('M', strtotime($post->created_at)) }}</span>
															<strong>{{ date('d', strtotime($post->created_at)) }}</strong>
														</div>
													Автор: <strong>{{ \App\Models\User::getName($post->user_id) }}</strong>
													</div>
													
												</div>
												<div class="comments">
													({{ $post->getComments()->count() }}) комментариев<span></span>
												</div>
											</div>
											<figure><a href="#"><img src="/storage/{{ $post->preview }}" alt=""></a><figure>
												<p>{{ $post->description }}</p>
										</div>

										<hr>
										<h2>Комментарии</h2>
										<form action="{{ route('addComment') }}" method="POST">
											@csrf

											<input type="hidden" name="post_id" value="{{ $post->id }}">

											@auth
											<input type="text" placeholder="Введите имя" name="author" value="{{ auth()->user()->name }} (#{{ auth()->id() }})" readonly required>
											@else
											<input type="text" placeholder="Введите имя" name="author" required>
											@endauth
											<textarea name="description" placeholder="Описание" required></textarea>

											<button type="submit">Отправить</button>
										</form>
										<br>
										<hr>
										<br>
										@auth
											@if (auth()->user()->role === 'admin')
												@foreach ($post->getComments() as $comment)
												<form action="{{ route('editComment', $comment->id) }}" method="POST">
													@csrf
				
													<input type="hidden" name="post_id" value="{{ $post->id }}">
				
													<input type="text" placeholder="Введите имя" name="author" value="{{ $comment->author }}" readonly required>

													<textarea name="description" placeholder="Описание" required>{{ $comment->description }}</textarea>
				
													<button type="submit">Сохранить</button>

													<a href="{{ route('deleteComment', $comment->id) }}" style="color: red;">Удалить</a>
												</form>
												<br>
												@endforeach
											@endif
										@else
											@foreach ($post->getComments() as $comment)
												<p>
													<b>{{ $comment->author }}</b>:
													{{ $comment->description }} (<small>{{ $comment->created_at }}</small>)
												</p>
											@endforeach
										@endif

										
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