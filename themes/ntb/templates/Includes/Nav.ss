<nav class="navbar" id="navbar" data-controller="mobile-menu">
	<div class="logo">
	  <a href="$AbsoluteBaseURL">
		<img src="assets/logo-nav.png" alt="Na tvojo besedo logo">
	  </a>
	</div>
  
	<div class="main-menu">
	<ul>
		<% loop $Menu(1) %>
			<li class="$LinkingMode"><a class="<% if $LinkingMode == 'current' || $LinkingMode == 'section' %>active<% end_if %>" href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
		<% end_loop %>
	</ul>
    </div>
	<div class="logo-mobile">
	  <a href="$AbsoluteBaseURL">
		<img src="/assets/logo-nav.png" alt="logo Na tvojo besedo">
	  </a>
	</div>
  
	<button id="hamburger-button" class="hamburger-button"">
	  <div class="hamburger-line"></div>
	  <div class="hamburger-line"></div>
	  <div class="hamburger-line"></div>
	</button>
  
	<div class="mobile-menu" id="mobile-menu">
		<ul>
			<% loop $Menu(1) %>
				<li class="$LinkingMode"><a class="<% if $LinkingMode == 'current' || $LinkingMode == 'section' %>active<% end_if %>" href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
			<% end_loop %>
		</ul>
	</div>
  </nav>
  