@extends('layouts.app-pages')

@section('content')

<div id="content">
	<div class="inner pad1">
		<div class="container_12">
			<div class="wrapper h-pad">
				<div class="grid_7">
					<h2>Contact Info</h2>
					<div class="wrapper">
						<div class="grid_4 alpha">
							<iframe width="300" height="340" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
						</div>
						<div class="grid_3 omega">
							<div class="contacts">
								<strong class="title">The Company Name Inc.</strong>
								8901 Marmora Road, <br>
								Glasgow, D04 89GR.<br>
								Freephone:+1 800 559 6580<br>
								Telephone:+1 800 603 6035<br>
								FAX:+1 800 889 9898<br>
								E-mail: <a href="#" class="link">mail@demolink.org</a> 

								<p>9863 - 9867 Mill Road,</p>
								Cambridge, MG09 99HT.<br>
								Freephone:+1 800 559 6580<br>
								Telephone:+1 800 603 6035<br>
								FAX:+1 800 889 9898<br>
								E-mail: <a href="#" class="link">mail@demolink.org</a> 
							</div>		
						</div>
					</div>
				</div>
				<div class="grid_4 prefix_1">
					<h2>Get In Touch</h2>
					<form id="contact-form">
						<fieldset>
							<label><input type="text" value="Name" onFocus="if(this.value=='Name'){this.value=''}" onBlur="if(this.value==''){this.value='Name'}">	</label>
							<label><input type="text" value="Email" onFocus="if(this.value=='Email'){this.value=''}" onBlur="if(this.value==''){this.value='Email'}">	</label>
							<label><input type="text" value="Phone" onFocus="if(this.value=='Phone'){this.value=''}" onBlur="if(this.value==''){this.value='Phone'}">	</label>
							<textarea onFocus="if(this.value=='Message'){this.value=''}" onBlur="if(this.value==''){this.value='Message'}">Message</textarea>
							<a href="#" class="button1" onClick="document.getElementById('contact-form').reset()">clear</a>
							<a href="#" class="button1" onClick="document.getElementById('contact-form').submit()">send</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection