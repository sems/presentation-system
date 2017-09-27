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
<header>Sign Up</header>
	<div class='content'>
		<a href="#" class='facebook-btn'>Sign up with facebook <i class="fa fa-facebook-official" aria-hidden="true"></i></a>
		<form>
			<p>Or Create an Account:</p>
			<div class='field'>
				<label for="username">Username</label>
				<input type='text' id="username" />
			</div>
			<div class='field'>
				<label for="email">Email Address</label>
				<input type='email' id="email" />
			</div>
			<div class='field'>
				<label for="planselect">Choose a Plan</label>
				<select id="planselect">
					<option val="" disabled>Choose a plan</option>
					<option val="free">Free</option>
					<option val="premium">Premium</option>
					<option val="family">Family</option>
				</select>
			</div>
			<div class='field'>
				<input type='submit' class='btn' value="Sign Up" />
			</div>
		</form>
	</div>
</div>
