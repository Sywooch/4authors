"use strict";

	window.onload = function() {

		var window_width = window.innerWidth; //Sorry, ie8-

		/* Menu toggle */

		var menu_height;

		window_width < 480 ? menu_height = 300 : menu_height = 200;

		/* If changed */

		window.onresize = function() {
			window_width = window.innerWidth;
			window_width < 480 ? menu_height = 300 : menu_height = 200;

			var menu = document.querySelector('.main_menu');
			var menu_status = getCss(menu, 'display');
			if(menu_status === "block" && window_width < 768) {
				menu.style.height = menu_height + 'px';
			}
			else {
				menu.style.height = 0 + 'px';
			}
		};

		var toggle_menu = document.querySelector('.menu-mini');
		toggle_menu.addEventListener("click", function(){
			window_width = window.innerWidth;

			toggleBlock('.menu-mini', menu_height);
		});

		//



	};





	/* Functions */

	function toggleBlock(css, height) {
		var block = document.querySelector('.main_menu');
		var display = getCss(block, 'display');
		if(display === 'block') {
			var cur_hei = height;
			var hei = 0;
			block.style.height = height + 'px';

			var interval = setTimeout(function go() {
				block.style.height = (parseInt(block.style.height) - 5) + 'px';
				if(parseInt(block.style.height) > hei) {
					setTimeout(go, 1);
				}
				else {
					block.style.display = 'none';
				}
			}, 1);

		}
		else if(display === 'none') {
			var cur_hei = 0;
			var hei = height;
			block.style.height = '0px';
			block.style.display = 'block';

			var interval = setTimeout(function go() {
				block.style.height = (parseInt(block.style.height) + 5) + 'px';
				if(parseInt(block.style.height) < hei) {
					setTimeout(go, 1);
				}
			}, 1);
		}
	}

	function getCss(node, prop) {
		return getComputedStyle(node).getPropertyValue(prop);
	}

	
