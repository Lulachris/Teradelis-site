<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Blog Page
 * @since Blog Page 1.0.0
 */

get_header();
?>

<div id="inner-content-wrapper" class="wrapper page-section">
	<div id="primary" class="content-area">

		<?php
		if (blog_page_is_sidebar_enable()) {
			get_sidebar();
		}
		?>

		<body>


			<div class="c" style="text-align:center;">

				<h2 class="thin" style="text-align:center;">Qui sommes-nous ?</h2>
				<p>Teradelis est une agence de conseile en communication graphique depuis 2001</p>
				<p>Nous intervenons dans la définition de stratégie de communication et la mise en oeuvre du plan de communication (identité visuelle, publicité & édition, marketing direct et opérationnel, web et multimédia.
				Nos clients se situent dans l’Est de la France et exercent dans divers secteurs d’activités (transport, environnement, assurance, industrie, collectivités locales…) avec une intervention spécifique dans le domaine des transports en commun.</p>

					<div class="col-md-3 col-sm-6 highlight">
<div class="row">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption">
							<h4><i class="fa fa-5">
							<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="301px" height="313px" viewBox="46.31 56.405 301 313" enable-background="new 46.31 56.405 301 313" xml:space="preserve">
<polygon fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" points="207.856,130.715 228.356,139.26 
	164.696,226.491 150.306,209.572 "/>
<polygon fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="145.362,258.724 171.021,277.45 
	142.188,290.278 "/>
<rect x="200.982" y="140.32" transform="matrix(0.8078 0.5895 -0.5895 0.8078 155.3294 -87.7425)" fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" width="22.462" height="107.994"/>
<polygon fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" points="273.481,178.608 259.092,161.689 
	195.43,248.92 215.933,257.463 "/>
<polyline fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" points="150.306,209.572 142.188,290.278 
	215.933,257.463 "/>
<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="196.331" cy="214.905" rx="134.66" ry="146.143"/>
</svg>
								</i>EDITION</h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption">
							<h4><i class="fa fa-5">
							<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="301px" height="313px" viewBox="46.31 56.405 301 313" enable-background="new 46.31 56.405 301 313" xml:space="preserve">
<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="196.331" cy="214.905" rx="134.66" ry="146.143"/>
<path fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" d="M161.31,175.405h72H161.31z"/>
<line fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" x1="161.31" y1="201.405" x2="233.31" y2="201.405"/>
<rect x="161.31" y="229.405" fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" width="72" height="33"/>
<polygon fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" points="222.038,136.19 236.669,118.456 
	258.394,118.456 272.581,136.19 272.581,150.821 259.724,167.447 235.782,167.447 222.038,152.594 "/>
<polyline fill="none" stroke="#000000" stroke-width="7" stroke-miterlimit="10" points="211.31,151.405 144.31,151.405 
	144.31,281.405 247.31,281.405 247.31,175.405 "/>
<circle fill="none" stroke="#000000" stroke-width="4" stroke-miterlimit="10" cx="240.961" cy="137.089" r="2.315"/>
<circle fill="none" stroke="#000000" stroke-width="4" stroke-miterlimit="10" cx="256.994" cy="150.089" r="2.315"/>
<line fill="none" stroke="#000000" stroke-width="4" stroke-miterlimit="10" x1="254.401" y1="131.301" x2="241.902" y2="157.508"/>
</svg>
								</i>PUBLICITE</h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption">
							<h4><i class="fa fa-5">
							<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="301px" height="313px" viewBox="46.31 56.405 301 313" enable-background="new 46.31 56.405 301 313" xml:space="preserve">
<polygon fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="118.31,144.405 279.31,144.405 
	279.31,237.405 181.31,237.405 118.31,237.405 "/>
<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="196.331" cy="214.905" rx="134.66" ry="146.143"/>
<polygon fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="167.31,271.405 181.31,237.405 
	217.31,237.405 230.31,271.405 "/>
<rect x="135.31" y="287.405" fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" width="128" height="35"/>
</svg>

								</i>WEB</h4>
						</div>

					</div>
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption">
							<h4><i class="fa fa-5">
							<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="301px" height="313px" viewBox="46.31 56.405 301 313" enable-background="new 46.31 56.405 301 313" xml:space="preserve">
<polyline fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="77.421,212.788 104.872,212.788 
	117.74,185.336 125.461,212.788 134.898,212.788 141.76,238.524 150.339,211.929 "/>
<polyline fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="240.274,217.292 267.726,217.292 
	280.593,189.84 288.315,217.292 297.751,217.292 304.614,243.028 313.192,216.434 "/>
<path fill="none" stroke="#000000" stroke-width="5" stroke-miterlimit="10" d="M209.927,296.198h-24.051
	c-1.659,0-3.006-1.294-3.006-2.883s1.347-2.883,3.006-2.883h24.051c1.658,0,3.006,1.294,3.006,2.883
	S211.585,296.198,209.927,296.198z M212.933,284.664h-3.006h-24.051h-3.006c-1.659,0-3.007-1.294-3.007-2.884
	c0-1.589,1.348-2.883,3.007-2.883h30.063c1.66,0,3.007,1.294,3.007,2.883C215.939,283.37,214.593,284.664,212.933,284.664z
	 M215.939,273.131h-3.005h-30.065h-3.007c-1.659,0-3.006-1.296-3.006-2.884c0-1.591,1.348-2.883,3.006-2.883h36.077
	c1.659,0,3.007,1.292,3.007,2.883C218.946,271.835,217.599,273.131,215.939,273.131z M237.321,222.131
	c-0.491,0.5-0.769,1.14-0.813,1.799c-9.615,13.999-10.357,17.797-12.081,26.582c-0.309,1.571-0.651,3.317-1.089,5.344
	c-0.722,3.378-3.656,5.74-7.129,5.74h-0.271h-5.435l7.957-43.253h3.491c4.975,0,9.021-3.879,9.021-8.649v-11.535h9.018
	c1.662,0,3.006-1.291,3.006-2.883v-14.417c0-4.771-4.045-8.65-9.017-8.65v-8.651c0-4.77-4.048-8.651-9.021-8.651h-3.007
	c0-4.77-4.045-8.65-9.019-8.65h-9.02c-1.662,0-3.006,1.291-3.006,2.882v66.322c0,1.593,1.344,2.883,3.006,2.883h8.443l-7.957,43.251
	h-12.997l-7.957-43.251h8.442c1.661,0,3.007-1.29,3.007-2.883v-66.322c0-1.591-1.346-2.882-3.007-2.882h-9.019
	c-4.974,0-9.019,3.88-9.019,8.65h-3.007c-4.973,0-9.019,3.881-9.019,8.651v8.651c-4.974,0-9.02,3.88-9.02,8.65v20.185
	c0,1.592,1.345,2.883,3.006,2.883h9.02v5.768c0,4.771,4.046,8.649,9.02,8.649h3.492l7.958,43.253h-5.438h-0.27
	c-3.473,0-6.407-2.361-7.129-5.746c-0.438-2.019-0.781-3.765-1.089-5.338c-1.723-8.783-2.466-12.581-12.08-26.581
	c-0.045-0.658-0.323-1.299-0.814-1.799c-9.477-9.628-14.693-22.237-14.693-35.506c0-28.62,24.277-51.903,54.114-51.903
	c29.838,0,54.116,23.283,54.116,51.903C252.016,199.895,246.798,212.503,237.321,222.131z M218.946,177.975v-8.65
	c0-1.592-1.345-2.883-3.007-2.883h-9.019v-14.417h6.014c1.658,0,3.005,1.294,3.005,2.884v2.883c0,1.593,1.344,2.884,3.007,2.884
	h6.013c1.658,0,3.005,1.294,3.005,2.884v11.534c0,1.593,1.347,2.883,3.008,2.883h3.007c1.658,0,3.005,1.295,3.005,2.884v11.534
	h-9.02h-12.024c-1.662,0-3.005,1.29-3.005,2.884v5.767h6.012v-2.883h6.013v11.534c0,1.589-1.348,2.884-3.006,2.884h-15.032v-40.369
	h6.014v5.766H218.946z M167.837,186.625c-1.663,0-3.006,1.291-3.006,2.884v8.651h-6.013v-17.301c0-1.589,1.348-2.884,3.007-2.884
	h3.006c1.661,0,3.006-1.291,3.006-2.883v-11.533c0-1.59,1.348-2.884,3.006-2.884h3.007v5.767h6.012v-8.65v-2.883
	c0-1.59,1.348-2.884,3.007-2.884h6.012v60.553H173.85c-1.659,0-3.006-1.294-3.006-2.883v-8.651v-8.651h6.013v-5.767L167.837,186.625
	L167.837,186.625z"/>
<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="196.331" cy="214.905" rx="134.66" ry="146.143"/>
</svg>


								</i>CONSEILS</h4>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption">
							<h4><i class="fa fa-5">
									<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="301px" height="313px" viewBox="46.31 56.405 301 313" enable-background="new 46.31 56.405 301 313" xml:space="preserve">
										<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="196.331" cy="214.905" rx="134.66" ry="146.143" />
										<polyline fill="none" stroke="#000000" stroke-width="5" stroke-miterlimit="10" points="260.206,170.738 241.965,170.738 
	251.085,210.981 215.907,170.738 168.426,170.738 149.896,221.404 141.211,171.027 133.683,171.027 133.683,109.069 
	141.211,109.069 260.206,109.069 260.206,170.738 " />
										<ellipse fill="none" stroke="#000000" stroke-width="5" stroke-miterlimit="10" cx="196.944" cy="139.179" rx="41.836" ry="19.978" />
										<ellipse fill="none" stroke="#000000" stroke-width="5" stroke-miterlimit="10" cx="196.53" cy="139.099" rx="18.84" ry="18.115" />
										<circle cx="196.531" cy="139.179" r="9.913" />
										<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="146.311" cy="253.757" r="18.819" />
										<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="257.59" cy="244.567" r="18.819" />
										<path fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" d="M133.683,270.044c0,0-18.53,3.476-28.374,30.979
	h72.381c0,0-5.604-26.111-19.595-32.599" />
										<path fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" d="M246.351,261.531c0,0-18.53,3.476-28.374,30.979
	h72.382c0,0-5.605-26.111-19.596-32.599" />
									</svg>
								</i>COMMUNICATION</h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption">
							<h4><i class="fa fa-5">
									<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="301px" height="313px" viewBox="46.31 56.405 301 313" enable-background="new 46.31 56.405 301 313" xml:space="preserve">
										<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="196.331" cy="214.905" rx="134.66" ry="146.143" />
										<line stroke="#000000" stroke-width="14" stroke-miterlimit="10" x1="115.976" y1="151.738" x2="115.976" y2="285.071" />
										<line stroke="#000000" stroke-width="14" stroke-miterlimit="10" x1="150.643" y1="151.738" x2="150.643" y2="285.071" />
										<polygon fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="204.81,151.738 297.976,214.905 
	204.331,285.071 " />
									</svg>
								</i>MULTIMEMEDIA</h4>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption">
							<h4><i class="fa fa-5">

									<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="301px" height="313px" viewBox="46.31 56.405 301 313" enable-background="new 46.31 56.405 301 313" xml:space="preserve">
										<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="196.331" cy="214.905" rx="134.66" ry="146.143" />
										<g>
											<g>
												<path fill="none" stroke="#000000" stroke-width="5" stroke-miterlimit="10" d="M243.701,175.115h-24.002v-4.671
			c0-1.292-1.042-2.335-2.334-2.335s-2.335,1.043-2.335,2.335v4.671h-24c-3.429,0-6.212,2.782-6.212,6.21v8.15l-3.229-1.094
			c-0.845-0.298-8.348-2.932-15.304-3.279l-0.944,1.838h-0.05l2.634,20.323l-3.081,5.417l-3.081-5.417l2.583-20.323h-0.049
			l-0.944-1.838c-7.205,0.348-15.006,3.18-15.354,3.279c-0.149,0.049-0.199,0.149-0.348,0.199c-0.248,0.1-0.497,0.249-0.696,0.447
			c-0.199,0.149-0.348,0.298-0.497,0.497c-0.149,0.199-0.298,0.397-0.447,0.596c-0.149,0.249-0.248,0.448-0.298,0.696
			c-0.05,0.149-0.149,0.249-0.149,0.397l-6.162,27.925c-0.447,2.088,0.845,4.174,2.932,4.621c0.298,0.051,0.547,0.1,0.844,0.1
			c1.789,0,3.379-1.242,3.777-3.03l5.714-25.739c0.397-0.1,0.844-0.249,1.342-0.397v26.435l-3.081,38.311
			c-0.199,2.533,1.689,4.818,4.273,5.019c0.149,0,0.249,0,0.397,0c2.385,0,4.422-1.838,4.621-4.273l2.782-34.634
			c0.597,0.248,1.192,0.397,1.889,0.397c0.646,0,1.292-0.149,1.888-0.397l2.783,34.634c0.199,2.436,2.236,4.273,4.621,4.273
			c0.149,0,0.249,0,0.398,0c2.583-0.2,4.472-2.436,4.273-5.019l-3.081-38.311v-26.435c1.987,0.546,3.279,1.043,3.329,1.043h0.05
			h0.049l5.614,1.938v20.87c0,3.428,2.783,6.211,6.212,6.211h11.279l-9.889,36.92c-0.347,1.241,0.397,2.533,1.64,2.83
			c0.199,0.05,0.398,0.101,0.596,0.101c1.043,0,1.989-0.695,2.236-1.74l10.236-38.11h7.901v27.03c0,1.291,1.043,2.336,2.335,2.336
			s2.334-1.045,2.334-2.336v-27.03h7.901l10.235,38.11c0.3,1.045,1.243,1.74,2.236,1.74c0.199,0,0.398,0,0.597-0.101
			c1.242-0.347,1.988-1.589,1.64-2.83l-9.887-36.92h11.279c3.429,0,6.211-2.783,6.211-6.211v-37.218
			C249.861,177.897,247.079,175.115,243.701,175.115z M246.78,218.494c0,1.689-1.391,3.08-3.079,3.08H191.03
			c-1.689,0-3.081-1.391-3.081-3.08v-19.826l9.789,3.279c0.399,0.149,0.844,0.199,1.242,0.199c1.641,0,3.131-1.043,3.676-2.634
			c0.102-0.249,0.052-0.546,0.102-0.845l23.304-10.783c0.397-0.199,0.546-0.646,0.397-1.043c-0.199-0.397-0.646-0.547-1.043-0.397
			l-22.809,10.534c-0.346-1.094-1.191-2.038-2.385-2.436l-12.272-4.074v-9.144c0-1.689,1.392-3.08,3.081-3.08h52.671
			c1.688,0,3.079,1.391,3.079,3.08V218.494L246.78,218.494L246.78,218.494z" />
												<path fill="none" stroke="#000000" stroke-width="5" stroke-miterlimit="10" d="M164.894,184.308
			c5.416,0,9.789-6.261,9.789-11.677c0-5.417-4.373-9.789-9.789-9.789c-5.417,0-9.789,4.373-9.789,9.789
			C155.104,178.046,159.477,184.308,164.894,184.308z" />
											</g>
										</g>
									</svg>

								</i>MARKETING</h4>
						</div>

					</div>
					<div class="col-md-3 col-sm-6 highlight">
						<div class="h-caption">
							<h4><i class="fa fa-5">
									<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="301px" height="313px" viewBox="46.31 56.405 301 313" enable-background="new 46.31 56.405 301 313" xml:space="preserve">
										<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="196.331" cy="214.905" rx="134.66" ry="146.143" />
										<path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M261.815,217.088c1.207,0,2.184-0.975,2.184-2.183
	v-52.387c0-1.208-0.977-2.183-2.184-2.183h-15.5c0.146-0.714,0.221-1.447,0.221-2.183c0-6.018-4.896-10.914-10.914-10.914
	s-10.914,4.896-10.914,10.914c0,0.735,0.074,1.469,0.221,2.183h-15.5c-1.208,0-2.184,0.975-2.184,2.183v16.192
	c-1.361-0.593-2.846-0.912-4.365-0.912c-6.018,0-10.914,4.896-10.914,10.914s4.896,10.914,10.914,10.914
	c1.52,0,3.004-0.318,4.365-0.912v16.192c0,1.208,0.976,2.183,2.184,2.183h10.914v21.828c0,0.233,0.039,0.467,0.112,0.689
	l1.655,4.967l-5.162,3.441c-0.736,0.492-1.104,1.377-0.93,2.243l2.183,10.915c0.067,0.34,0.218,0.663,0.434,0.937l8.257,10.315
	v10.147h4.365v-10.913c0-0.498-0.169-0.976-0.479-1.365l-8.4-10.498l-1.79-8.959l2.953-1.971l1.279,3.837l4.138-1.382l-4.249-12.758
	V210.54c0-1.204,0.979-2.183,2.184-2.183c1.203,0,2.182,0.979,2.182,2.183v24.011c0,0.959,0.629,1.81,1.55,2.089
	c0.919,0.279,1.916-0.079,2.45-0.878l3.717-5.577h2.029l3.717,5.577c0.407,0.607,1.088,0.972,1.816,0.972h3.197l3.719,5.577
	c0.405,0.606,1.086,0.971,1.815,0.971h3.198l3.351,5.027v11.671l-8.253,10.316c-0.311,0.387-0.479,0.864-0.479,1.362v10.913h4.365
	v-10.147l8.253-10.315c0.31-0.39,0.479-0.867,0.479-1.364v-13.098c0-0.429-0.13-0.854-0.367-1.211l-4.366-6.549
	c-0.406-0.606-1.087-0.971-1.815-0.971h-3.198l-3.718-5.578c-0.406-0.605-1.086-0.971-1.816-0.971h-3.196l-3.718-5.577
	c-0.406-0.606-1.088-0.972-1.816-0.972h-4.365c-0.729,0-1.41,0.365-1.816,0.972l-0.367,0.55v-10.252H261.815z M226.892,203.992
	c-3.61,0-6.549,2.938-6.549,6.548v2.183h-8.731v-18.235c0-0.908-0.563-1.72-1.41-2.043c-0.845-0.314-1.808-0.083-2.41,0.598
	c-1.241,1.41-3.032,2.218-4.911,2.218c-3.61,0-6.548-2.938-6.548-6.548s2.938-6.548,6.548-6.548c1.879,0,3.67,0.808,4.911,2.218
	c0.601,0.681,1.561,0.919,2.41,0.598c0.847-0.32,1.41-1.133,1.41-2.043v-18.235h16.447c0.779,0,1.501-0.417,1.89-1.093
	c0.39-0.677,0.392-1.508-0.002-2.186c-0.568-0.984-0.873-2.117-0.873-3.27c0-3.61,2.938-6.548,6.549-6.548
	c3.609,0,6.548,2.938,6.548,6.548c0,1.152-0.304,2.285-0.873,3.27c-0.394,0.677-0.394,1.508-0.002,2.186
	c0.39,0.676,1.108,1.093,1.89,1.093h16.448v48.021h-26.194v-2.183C233.438,206.93,230.501,203.992,226.892,203.992z" />
										<path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M130.848,217.088h16.192
	c-0.594,1.362-0.912,2.848-0.912,4.365c0,6.018,4.896,10.914,10.914,10.914s10.914-4.896,10.914-10.914
	c0-1.518-0.318-3.003-0.912-4.365h16.192c1.208,0,2.183-0.975,2.183-2.183v-20.418c0-0.908-0.563-1.72-1.41-2.043
	c-0.848-0.314-1.808-0.083-2.41,0.598c-1.242,1.41-3.032,2.218-4.911,2.218c-3.61,0-6.548-2.938-6.548-6.548
	s2.938-6.548,6.548-6.548c1.879,0,3.669,0.808,4.911,2.218c0.598,0.681,1.563,0.919,2.41,0.598c0.847-0.32,1.41-1.133,1.41-2.043
	v-20.418c0-1.208-0.976-2.183-2.183-2.183h-52.387c-1.207,0-2.183,0.975-2.183,2.183v52.387
	C128.665,216.114,129.641,217.088,130.848,217.088z M133.031,164.702h48.021v14.009c-1.362-0.593-2.847-0.912-4.365-0.912
	c-6.018,0-10.914,4.896-10.914,10.914s4.896,10.914,10.914,10.914c1.519,0,3.003-0.318,4.365-0.912v14.009h-18.235
	c-0.908,0-1.72,0.563-2.043,1.41c-0.319,0.852-0.083,1.81,0.598,2.41c1.41,1.241,2.218,3.031,2.218,4.91
	c0,3.61-2.938,6.549-6.549,6.549c-3.61,0-6.548-2.938-6.548-6.549c0-1.879,0.808-3.669,2.218-4.91
	c0.681-0.599,0.918-1.559,0.598-2.41c-0.321-0.848-1.133-1.41-2.043-1.41h-18.235V164.702z" />
										<path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M189.783,254.196c-1.519,0-3.003,0.318-4.365,0.912
	v-16.191c0-1.207-0.976-2.183-2.183-2.183h-20.418c-0.908,0-1.72,0.563-2.043,1.41c-0.319,0.851-0.083,1.81,0.598,2.409
	c1.41,1.242,2.218,3.033,2.218,4.912c0,3.609-2.938,6.548-6.549,6.548c-3.61,0-6.548-2.938-6.548-6.548
	c0-1.879,0.808-3.67,2.218-4.912c0.681-0.598,0.918-1.559,0.598-2.409c-0.321-0.848-1.133-1.41-2.043-1.41h-20.418
	c-1.207,0-2.183,0.976-2.183,2.183v43.655h4.366v-41.473h14.009c-0.594,1.362-0.912,2.847-0.912,4.366
	c0,6.018,4.896,10.914,10.914,10.914s10.914-4.896,10.914-10.914c0-1.52-0.318-3.004-0.912-4.366h14.009v18.235
	c0,0.908,0.563,1.721,1.41,2.043c0.845,0.318,1.808,0.086,2.41-0.598c1.241-1.41,3.032-2.219,4.911-2.219
	c3.61,0,6.548,2.939,6.548,6.549s-2.938,6.549-6.548,6.549c-1.879,0-3.67-0.809-4.911-2.219c-0.598-0.681-1.559-0.914-2.41-0.598
	c-0.847,0.32-1.41,1.133-1.41,2.043v11.687h4.366v-7.46c1.362,0.594,2.846,0.912,4.365,0.912c6.018,0,10.914-4.896,10.914-10.914
	S195.801,254.196,189.783,254.196z" />
										<path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M250.901,208.357h4.365V171.25
	c0-1.208-0.975-2.183-2.183-2.183h-37.107v4.365h34.925V208.357z" />
										<path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M176.687,169.067h-37.107
	c-1.208,0-2.183,0.975-2.183,2.183v37.107h4.366v-34.925h34.925V169.067z" />
										<path fill="none" stroke="#000000" stroke-width="3" stroke-miterlimit="10" d="M137.396,245.465h4.366v37.106h-4.366V245.465z" />
									</svg>

								</i>STRATEGIE</h4>
						</div>
					</div>
				</div>
			</div>
	</div>
	<!-- /row  -->
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="container text-center" style="text-align:center; margin-top:100px;">

		<h2 class="thin" style="text-align:center;">Nos conseils</h2>
		<p>Tous les jours, votre métier, votre marché, vos concurrents évoluent à chaque instant. Votre développement dépend de vos choix stratégiques et opérationnels.
		Vous recherchez des partenaires créatifs et rigoureux pour votre communication institutionnelle, commerciale ou interne ?</p>
		<p>
			TERADELIS, agence conseil en communication graphique et numérique, vous accompagne et participe à votre développement. Notre esprit de conquête et d’aventure, notre écoute, notre proximité et notre expérience sont au service de votre entreprise ou de votre collectivité.
			Vous souhaitez lancer un nouveau produit, conquérir une nouvelle clientèle ou la fidéliser, informer ou sensibiliser votre personnel?
			TERADELIS construit avec vous et pour vous des solutions sur-mesure.</p>
<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-6 highlight" style="width:100%;">
				<div class="h-caption">
					<h4><i class="fa fa-5">
							<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="301px" height="313px" viewBox="0 0 301 313" enable-background="new 0 0 301 313" xml:space="preserve">
								<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="150.5" cy="156.5" rx="134.66" ry="146.143" />
								<polygon fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="80.864,87.235 90.979,107.731 
	113.599,111.018 97.231,126.972 101.095,149.5 80.864,138.864 60.633,149.5 64.497,126.972 48.129,111.018 70.749,107.731 " />
								<polygon fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="216.973,87.235 227.088,107.731 
	249.708,111.018 233.34,126.972 237.204,149.5 216.973,138.864 196.742,149.5 200.605,126.972 184.238,111.018 206.857,107.731 " />
								<polygon fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="148.919,75.109 159.034,95.606 
	181.653,98.893 165.286,114.847 169.15,137.375 148.919,126.739 128.687,137.375 132.552,114.847 116.184,98.893 138.803,95.606 " />
								<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="148.446" cy="191.977" r="21.629" />
								<path fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" d="M137.737,209.887c0,0-32.717,14.967-37.792,47.113
	h97c0,0-9.906-32.227-34.953-47.113" />
							</svg>

						</i>E-REPUTATION</h4>
				</div>
				<div class="h-body text-center">
					<p>Gérer votre communication afin de conquérir ou fidéliser une clientèle.</p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 highlight" style="width:100%;">
				<div class="h-caption">
					<h4><i class="fa fa-5">
							<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="301px" height="313px" viewBox="0 0 301 313" enable-background="new 0 0 301 313" xml:space="preserve">
								<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="150.5" cy="156.5" rx="134.66" ry="146.143" />
								<rect x="61" y="145.869" fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" width="22.974" height="83.823" />
								<rect x="97.009" y="165.738" fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" width="22.974" height="63.954" />
								<rect x="133.018" y="131.588" fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" width="22.974" height="98.104" />
								<rect x="169.026" y="145.869" fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" width="22.974" height="83.823" />
								<rect x="209.026" y="115" fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" width="22.974" height="114.692" />
								<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="72.487" cy="114.588" r="6" />
								<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="108.496" cy="134.869" r="6" />
								<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="144.504" cy="101" r="6" />
								<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="180.514" cy="114.588" r="6" />
								<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="220.513" cy="83.646" r="6" />
								<polyline fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="66.487,108.588 108.496,134.869 
	144.504,101 180.514,114.588 226.513,78.646 " />
							</svg>
						</i>AUDIT OUTILS DE COMMUNICATION</h4>
				</div>
				<div class="h-body text-center">
					<p>Réalisation d'un diagnostic et de préconisation pour booster votre communication.</p>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 highlight" style="width:100%;">
				<div class="h-caption">
					<h4><i class="fa  fa-5">
							<svg version="1.1" id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="301px" height="313px" viewBox="0 0 301 313" enable-background="new 0 0 301 313" xml:space="preserve">
								<ellipse fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="150.5" cy="156.5" rx="134.66" ry="146.143" />
								<polygon fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="194,164.863 194,93.668 107,93.668 
	107,190.863 107,215.332 156.367,215.332 156,232 88,232 88,93.668 88,75 133.516,75 133.516,64 170,64 170,75 213.312,75 
	213.312,165 " />
								<circle fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" cx="187.312" cy="199.332" r="24" />
								<line fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" x1="119" y1="127.066" x2="179.5" y2="127.066" />
								<line fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" x1="119" y1="108.5" x2="179.5" y2="108.5" />
								<line fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" x1="119" y1="145.633" x2="179.5" y2="145.633" />
								<line fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" x1="119" y1="164.199" x2="179.5" y2="164.199" />
								<line fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" x1="119" y1="182.766" x2="156" y2="182.766" />
								<line fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" x1="119" y1="201.332" x2="148.031" y2="201.332" />
								<rect x="142.5" y="73" fill="none" stroke="#000000" stroke-width="6" stroke-miterlimit="10" width="18.5" height="7.5" />
								<polyline fill="none" stroke="#000000" stroke-width="8" stroke-miterlimit="10" points="176.5,201.332 187.312,210.5 199.5,190 " />
							</svg>
						</i>STRATEGIE ET PLAN DE COMMUNICATION</h4>
				</div>
				<div class="h-body text-center">
					<p>Redéfinition de votre stratégie et organisation de vos actions de communication.</p>
				</div>
			</div>
		</div> <!-- /row  -->
		</div>
	</div>
</div>
<!-- /Highlights -->

</body>

<?php
get_footer();
