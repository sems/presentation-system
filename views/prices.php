<div class="parallax-window" data-parallax="scroll" data-image-src="img/tof.jpg"></div>
<h1 class="m_title">Pakketten</h1>
<?php
if(isSet($_SESSION['msg'])){
		//Access your POST variables
		$temp = $_SESSION['msg'];
		echo $temp."<br/>";
		//Unset the useless session variable
		unset($_SESSION['msg']);
}?>
<section id="pricePlans">
	<ul id="plans">
        <?php
        // NOTE:  First plan
        ?>
		<li class="plan">
			<ul class="planContainer">
				<li class="title"><h2>Paket 1</h2></li>
				<li class="price"><p>€1500</p></li>
				<li>
					<ul class="options">
						<li>1 <span>Installatie</span></li>
						<li>1 <span>Scherm</span></li>
						<li>1 <span>Beheerder</span></li>
						<li>Geen <span>Gebruikers</span></li>
						<li>Geen <span>Ondersteuning</span></li>
					</ul>
				</li>
				<li class="button btn-modal"><a href="#">Bestellen</a></li>
			</ul>
		</li>
        <?php
        // NOTE:  Second plan
        ?>
		<li class="plan">
			<ul class="planContainer">
				<li class="title"><h2>Paket 2</h2></li>
				<li class="price"><p>€3000</p></li>
				<li>
					<ul class="options">
						<li>2 <span>Installaties</span></li>
						<li>2 <span>Schermen</span></li>
						<li>1 <span>Beheerder</span></li>
						<li>Geen <span>Gebruiker</span></li>
						<li>Levenslang <span>Ondersteuning</span></li>
					</ul>
				</li>
				<li class="button btn-modal"><a href="#">Bestellen</a></li>
			</ul>
		</li>
        <?php
        // NOTE:  Thirt plan
        ?>
		<li class="plan">
			<ul class="planContainer">
				<li class="title"><h2>Paket 3</h2></li>
				<li class="price"><p>€4500</p></li>
				<li>
					<ul class="options">
						<li>4 <span>Installaties</span></li>
						<li>4 <span>Schermen</span></li>
						<li>1 <span>Beheerder</span></li>
						<li>1 <span>Gebruiker</span></li>
						<li>Levenslang <span>Ondersteuning</span></li>
					</ul>
				</li>
				<li class="button btn-modal"><a href="#">Bestellen</a></li>
			</ul>
		</li>
        <?php
        // NOTE:  Fourth Plan
        ?>
		<li class="plan">
			<ul class="planContainer">
				<li class="title"><h2>Paket 4</h2></li>
				<li class="price"><p>Op aanvraag</p></li>
				<li>
					<ul class="options">
						<li>Onbeperkt <span>Installaties</span></li>
						<li>Onbeperkt <span>Schermen</span></li>
						<li>1 <span>Beheerder</span></li>
						<li>Onbeperkt <span>Gebruikers</span></li>
						<li>Levenslang <span>Live ondersteuning</span></li>
					</ul>
				</li>
				<li class="button btn-modal"><a href="#">Aanvragen</a></li>
			</ul>
		</li>
	</ul> <!-- End ul#plans -->
</section>

<div class='modal'>
<header>Aanvragen</header>
	<div class='content'>
		<form method="post" action="buyregister.php">
			<p>Registreer:</p>

			<div class='field'>
				<label for="username">Gebruikers naam<span class="required">*</span></label>
				<input required name="b_name" type='text' id="username" />
			</div>
			<div class='field'>
				<label for="email">Email Address<span class="required">*</span></label>
				<input required name="b_email" type='email' />
			</div>
			<div class='field'>
				<label for="password">Wachtwoord<span class="required">*</span></label>
				<input required name="b_password" type='password' />
			</div>
			<div class='field'>
				<label for="password">Herhaal wachtwoord<span class="required">*</span></label>
				<input required name="b_repeat_password" type='password' />
			</div>
			<div class='field'>
				<label for="planselect">Kies een pakket<span class="required">*</span></label>
				<select required id="planselect">
					<option val="" disabled>Choose a plan</option>
					<option val="pkt_1">Pakket 1</option>
					<option val="pkt_2">Pakket 2</option>
					<option val="pkt_3">Pakket 3</option>
					<option val="pkt_4">Pakket 4</option>
				</select>
			</div>
			<p>Bedrijfs gegevens</p>
			<div class='field'>
				<label for="username">Naam<span class="required">*</span></label>
				<input required name="c_name" type='text' id="username" />
			</div>
			<div class='field'>
				<label for="email">Email Address<span class="required">*</span></label>
				<input required name="c_email" type='email' />
			</div>
			<div class='field'>
				<label for="password">Plaats</label>
				<input name="c_city" type='text' />
			</div>
			<div class='field'>
				<label for="password">Adres</label>
				<input name="c_adres" type='text' />
			</div>
			<div class='field'>
				<label for="password">Telefoon</label>
				<input name="c_phone" type='text' />
			</div>
			<div class='field'>
				<label for="password">Website</label>
				<input name="c_site" type='text' />
			</div>
			<div class="field">
				<label class="place">Bent u een robot?<span class="required">*</span></label>
				<div class="g-recaptcha" data-sitekey="6LdpFzMUAAAAAHxXzWptqDfQIk-z-X0271uen3pO"></div>
			</div>
			<div class='field'>
				<input type='submit' class='btn-price' value="Betaal en registreer" />
			</div>
		</form>

	</div>
</div>
<div class="parallax-window" data-parallax="scroll" data-image-src="img/tot.jpg"></div>
<h1 class="m_title">Waarom?</h1>

<div class="p_exp">
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</div>
<div class="price_quote quote">
	<p class="quote-content">'Het maakt niet uit wat we onderzoeken of bestuderen, het is allemaal op een of andere manier met elkaar verbonden. Knoop B.V. helpt ons om die verbanden te vinden.'</p>
</div>
