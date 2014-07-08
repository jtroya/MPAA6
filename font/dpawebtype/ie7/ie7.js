/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referring to this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'dpawebtype\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icondpa-etsam': '&#x79;',
		'icondpa-dpa': '&#x70;',
		'icondpa-adm': '&#x61;',
		'icondpa-instituto': '&#x73;',
		'icondpa-noticias': '&#x6e;',
		'icondpa-innovacion': '&#x65;',
		'icondpa-investigacion': '&#x69;',
		'icondpa-doctorado': '&#x64;',
		'icondpa-master': '&#x6d;',
		'icondpa-pfc': '&#x66;',
		'icondpa-grado': '&#x67;',
		'icondpa-circle': '&#x6f;',
		'icondpa-titulos-propios': '&#x74;',
		'icondpa-upm': '&#x75;',
		'icondpa-aro': '&#x72;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icondpa-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
