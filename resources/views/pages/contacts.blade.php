@extends('layouts.app-pages')

@section('title', 'Контакты')

@section('content')

<div id="content">
	<div class="inner pad1">
		<div class="container_12">
			<div class="wrapper h-pad">
				<div class="grid_7">
					<h2>Контакты</h2>
					<div class="wrapper">
						<div class="grid_4 alpha">
							<iframe width="300" height="340" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
						</div>
						<div class="grid_3 omega">
							<div class="contacts">
								<strong class="title">Terricon</strong>
								Telegram: skelebr1ne<br>
								Телефон: +7 999 999 99 99<br>
								E-mail: <a href="#" class="link">stepan060905@mail.ru</a>
							</div>		
						</div>
					</div>
				</div>
				<div class="grid_4 prefix_1">
					<h2>Обратная связь</h2>
					<form id="contact-form" action="{{ route('addLead') }}" method="POST">
						@csrf
						<fieldset>
							<label>
								<input type="text" name="name" placeholder="Ваше Имя" required>	
							</label>
							<label>
								<input type="email" name="email" placeholder="Ваш E-mail" required>	
							</label>
							<label>
								<input type="text" name="contacts" placeholder="Иной контакт">	
							</label>

							<textarea name="description" placeholder="Комментарий..."></textarea>

							<a href="#" class="button1" onClick="document.getElementById('contact-form').reset()">Очистить</a>
							<a href="#" class="button1" onClick="document.getElementById('contact-form').submit()">Отправить</a>

							@isset($_GET['createdLead'])
								<p>
									<b>Заявка успешно создана.</b>
								</p>
							@endisset
						</fieldset>
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection