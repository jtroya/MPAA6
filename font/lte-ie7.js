/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'dpa\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-innovacion' : '&#x65;',
			'icon-circle' : '&#x6f;',
			'icon-doctorado' : '&#x64;',
			'icon-titulos-propios' : '&#x74;',
			'icon-masterhabilitante' : '&#x68;',
			'icon-grado' : '&#x67;',
			'icon-upm' : '&#x75;',
			'icon-etsam' : '&#x69;',
			'icon-master' : '&#x6d;',
			'icon-dpa' : '&#x70;',
			'icon-aro' : '&#x21;',
			'icon-pfc' : '&#x66;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};