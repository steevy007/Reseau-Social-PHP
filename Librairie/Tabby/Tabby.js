/ *
 * Plugin jQuery tabby version 0.12
 *
 * Ted Devito - http://teddevito.com/demos/textarea.html
 *
 * Copyright (c) 2009 Ted Devito
 *	 
 * La redistribution et l'utilisation sous forme source et binaire, avec ou sans modification, sont autorisées à condition que les éléments suivants 
 * les conditions sont remplies:
 *	
 * 1. Les redistributions du code source doivent conserver l'avis de droit d'auteur ci-dessus, cette liste de conditions et l'avertissement suivant.
 * 2. Les redistributions sous forme binaire doivent reproduire l'avis de droit d'auteur ci-dessus, cette liste de conditions et l'avertissement suivant  
 * dans la documentation et / ou les autres documents fournis avec la distribution.
 * 3. Le nom de l'auteur ne peut pas être utilisé pour approuver ou promouvoir des produits dérivés de ce logiciel sans autorisation écrite préalable 
 * autorisation. 
 *	 
 * CE LOGICIEL EST FOURNI PAR L'AUTEUR `` TEL QUEL '' ET TOUTE GARANTIE EXPRESSE OU IMPLICITE, Y COMPRIS, MAIS SANS S'Y LIMITER, LE 
 * LES GARANTIES IMPLICITES DE QUALITÉ MARCHANDE ET D'ADÉQUATION À UN USAGE PARTICULIER SONT EXCLUES. L'AUTEUR NE SERA EN AUCUN CAS
 * RESPONSABLE DE TOUT DOMMAGE DIRECT, INDIRECT, ACCESSOIRE, SPÉCIAL, EXEMPLAIRE OU CONSÉCUTIF (Y COMPRIS, MAIS SANS S'Y LIMITER, 
 * ACHAT DE BIENS OU DE SERVICES DE REMPLACEMENT; PERTE D'UTILISATION, DE DONNÉES OU DE PROFITS; OU INTERRUPTION D'AFFAIRES) TOUTEFOIS CAUSÉ ET SUR TOUT
 * THÉORIE DE LA RESPONSABILITÉ, QUE CE SOIT DANS LE CONTRAT, LA RESPONSABILITÉ STRICTE OU LE TORT (Y COMPRIS LA NÉGLIGENCE OU AUTREMENT) DÉCOULANT DE TOUTE MANIÈRE 
 * DE L'UTILISATION DE CE LOGICIEL, MÊME S'IL EST CONSEILLÉ DE LA POSSIBILITÉ DE TELS DOMMAGES.
 *
 * /
 
// crée une fermeture

(fonction ($) {
 
	// définition du plugin

	$ .fn.tabby = fonction (options) {
		// debug (this);
		// construire les options principales avant l'itération des éléments
		var opts = $ .extend ({}, $ .fn.tabby.defaults, options);
		var pressé = $ .fn.tabby.pressed; 
		
		// itère et reformate chaque élément correspondant
		retourner this.each (function () {
			$ this = $ (this);
			
			// construire des options spécifiques aux éléments
			var options = $ .meta? $ .extend ({}, opts, $ this.data ()): opts;
			
			$ this.bind ('keydown', fonction (e) {
				var kc = $ .fn.tabby.catch_kc (e);
				si (16 == kc) pressé.shft = true;
				/ *
				parce que CTRL + TAB et ALT + TAB par défaut à un événement (changement d'onglet / fenêtre) qui 
				empêchera js de capturer l'événement keyup, nous définirons un minuteur pour les libérer.
				* /
				if (17 == kc) {pressé.ctrl = vrai; setTimeout ("$. fn.tabby.pressed.ctrl = false;", 1000);}
				if (18 == kc) {pressé.alt = vrai; setTimeout ("$. fn.tabby.pressed.alt = false;", 1000);}
					
				if (9 == kc &&! pressé.ctrl &&! pressé.alt) {
					e.preventDefault; // ne fonctionne pas dans O9.63 ??
					pressé.last = kc; setTimeout ("$. fn.tabby.pressed.last = null;", 0);
					process_keypress ($ (e.target) .get (0), pressing.shft, options);
					retour faux;
				}
				
			}). bind ('keyup', fonction (e) {
				if (16 == $ .fn.tabby.catch_kc (e)) pressing.shft = false;
			}). bind ('blur', function (e) {// solution de contournement pour Opera - http://www.webdeveloper.com/forum/showthread.php?p=806588
				si (9 == pressé.last) $ (e.target) .one ('focus', fonction (e) {pressé.last = null;}). get (0) .focus ();
			});
		
		});
	};
	
	// définir et exposer toutes les méthodes supplémentaires
	$.fn.tabby.catch_kc = function(e) { return e.keyCode ? e.keyCode : e.charCode ? e.charCode : e.which; };
	$.fn.tabby.pressed = {shft : false, ctrl : false, alt : false, last: null};
	
	// private function for debugging
	function debug($obj) {
		if (window.console && window.console.log)
		window.console.log('textarea count: ' + $obj.size());
	};

	function process_keypress (o,shft,options) {
		var scrollTo = o.scrollTop;
		//var tabString = String.fromCharCode(9);
		
		// gecko; o.setSelectionRange is only available when the text box has focus
		if (o.setSelectionRange) gecko_tab (o, shft, options);
		
		// ie; document.selection is always available
		else if (document.selection) ie_tab (o, shft, options);
		
		o.scrollTop = scrollTo;
	}
	
	// plugin defaults
	$.fn.tabby.defaults = {tabString : String.fromCharCode(9)};
	
	fonction gecko_tab (o, shft, options) {
		var ss = o.selectionStart;
		var es = o.selectionEnd;	
				
		// quand il n'y a pas de sélection et que nous travaillons simplement avec le curseur, nous ajouterons / supprimerons les onglets au curseur, offrant plus de contrôle
		if (ss == es) {
			// MAJ + TAB
			if (shft) {
				// vérifier d'abord à gauche du curseur
				if ("\ t" == o.value.substring (ss-options.tabString.length, ss)) {
					o.value = o.value.substring (0, ss-options.tabString.length) + o.value.substring (ss); // le recompose en omettant un caractère à gauche
					o.focus ();
					o.setSelectionRange (ss - options.tabString.length, ss - options.tabString.length);
				} 
				// puis cocher à droite du curseur
				sinon si ("\ t" == o.value.substring (ss, ss + options.tabString.length)) {
					o.value = o.value.substring(0, ss) + o.value.substring(ss + options.tabString.length); // put it back together omitting one character to the right
					o.focus();
					o.setSelectionRange(ss,ss);
				}
			}
			// TAB
			else {			
				o.value = o.value.substring(0, ss) + options.tabString + o.value.substring(ss);
				o.focus();
	    		o.setSelectionRange(ss + options.tabString.length, ss + options.tabString.length);
			}
		} 
		// selections will always add/remove tabs from the start of the line
		else {
			// split the textarea up into lines and figure out which lines are included in the selection
			var lines = o.value.split("\n");
			var indices = new Array();
			var sl = 0; // start of the line
			var el = 0; // end of the line
			var sel = false;
			for (var i in lines) {
				el = sl + lines[i].length;
				indices.push({start: sl, end: el, selected: (sl <= ss && el > ss) || (el >= es && sl < es) || (sl > ss && el < es)});
				sl = el + 1;// for "\n"
			}
			
			// walk through the array of lines (indices) and add tabs where appropriate						
			var modifier = 0;
			for (var i in indices) {
				if (indices[i].selected) {
					var pos = indices[i].start + modifier; // adjust for tabs already inserted/removed
					// SHIFT+TAB
					if (shft && options.tabString == o.value.substring(pos,pos+options.tabString.length)) { // only SHIFT+TAB if there's a tab at the start of the line
						o.value = o.value.substring(0,pos) + o.value.substring(pos + options.tabString.length); // omit the tabstring to the right
						modifier -= options.tabString.length;
					}
					// TAB
					else if (!shft) {
						o.value = o.value.substring(0,pos) + options.tabString + o.value.substring(pos); // insert the tabstring
						modifier += options.tabString.length;
					}
				}
			}
			o.focus();
			var ns = ss + ((modifier > 0) ? options.tabString.length : (modifier < 0) ? -options.tabString.length : 0);
			var ne = es + modifier;
			o.setSelectionRange(ns,ne);
		}
	}
	
	function ie_tab (o, shft, options) {
		var range = document.selection.createRange();
		
		if (o == range.parentElement()) {
			// when there's no selection and we're just working with the caret, we'll add/remove the tabs at the caret, providing more control
			if ('' == range.text) {
				// SHIFT+TAB
				if (shft) {
					var bookmark = range.getBookmark();
					//first try to the left by moving opening up our empty range to the left
				    range.moveStart('character', -options.tabString.length);
				    if (options.tabString == range.text) {
				    	range.text = '';
				    } else {
				    	// if that didn't work then reset the range and try opening it to the right
				    	range.moveToBookmark(bookmark);
				    	range.moveEnd('character', options.tabString.length);
				    	if (options.tabString == range.text) 
				    		range.text = '';
				    }
				    // move the pointer to the start of them empty range and select it
				    range.collapse(true);
					range.select();
				}
				
				else {
					// very simple here. just insert the tab into the range and put the pointer at the end
					range.text = options.tabString; 
					range.collapse(false);
					range.select();
				}
			}
			// selections will always add/remove tabs from the start of the line
			else {
			
				var selection_text = range.text;
				var selection_len = selection_text.length;
				var selection_arr = selection_text.split("\r\n");
				
				var before_range = document.body.createTextRange();
				before_range.moveToElementText(o);
				before_range.setEndPoint("EndToStart", range);
				var before_text = before_range.text;
				var before_arr = before_text.split("\r\n");
				var before_len = before_text.length; // - before_arr.length + 1;
				
				var after_range = document.body.createTextRange();
				after_range.moveToElementText(o);
				after_range.setEndPoint("StartToEnd", range);
				var after_text = after_range.text; // we can accurately calculate distance to the end because we're not worried about MSIE trimming a \r\n
				
				var end_range = document.body.createTextRange();
				end_range.moveToElementText(o);
				end_range.setEndPoint("StartToEnd", before_range);
				var end_text = end_range.text; // we can accurately calculate distance to the end because we're not worried about MSIE trimming a \r\n
								
				var check_html = $(o).html();
				$("#r3").text(before_len + " + " + selection_len + " + " + after_text.length + " = " + check_html.length);				
				if((before_len + end_text.length) < check_html.length) {
					before_arr.push("");
					before_len += 2; // for the \r\n that was trimmed	
					if (shft && options.tabString == selection_arr[0].substring(0,options.tabString.length))
						selection_arr[0] = selection_arr[0].substring(options.tabString.length);
					else if (!shft) selection_arr[0] = options.tabString + selection_arr[0];	
				} else {
					if (shft && options.tabString == before_arr[before_arr.length-1].substring(0,options.tabString.length)) 
						before_arr[before_arr.length-1] = before_arr[before_arr.length-1].substring(options.tabString.length);
					else if (!shft) before_arr[before_arr.length-1] = options.tabString + before_arr[before_arr.length-1];
				}
				
				for (var i = 1; i < selection_arr.length; i++) {
					if (shft && options.tabString == selection_arr[i].substring(0,options.tabString.length))
						selection_arr[i] = selection_arr[i].substring(options.tabString.length);
					else if (!shft) selection_arr[i] = options.tabString + selection_arr[i];
				}
				
				if (1 == before_arr.length && 0 == before_len) {
					if (shft && options.tabString == selection_arr[0].substring(0,options.tabString.length))
						selection_arr[0] = selection_arr[0].substring(options.tabString.length);
					else if (!shft) selection_arr[0] = options.tabString + selection_arr[0];
				}

				if ((before_len + selection_len + after_text.length) < check_html.length) {
					selection_arr.push("");
					selection_len += 2; // for the \r\n that was trimmed
				}
				
				before_range.text = before_arr.join("\r\n");
				range.text = selection_arr.join("\r\n");
				
				var new_range = document.body.createTextRange();
				new_range.moveToElementText(o);
				
				if (0 < before_len)	new_range.setEndPoint("StartToEnd", before_range);
				else new_range.setEndPoint("StartToStart", before_range);
				new_range.setEndPoint("EndToEnd", range);
				
				new_range.select();
				
			} 
		}
	}

// end of closure
})(jQuery);