/**
 * This closure implements javascript trigger behavior. The main intention is to
 * extract all the javascript code out from the (x)html view scripts.
 *
 * @todo Check, if there is a way to implement this as a jQuery plugin, and
 *       refactor it as the case may be.
 */

Trigger = {

	triggers: {},

	/**
	 * Initialises the trigger engine.
	 */
	init : function(selector) {

		var trigger, elements;
		var i, j;

		// Check selector and convert it to
		// a jQuery object if necessary
		if (typeof selector === 'undefined') {
			selector = document;
		}

		if (!(selector instanceof jQuery)) {
			selector = jQuery(selector);
		}

		for ( i = 1; i <= 9; i++) {
			if (Trigger.triggers[i]) {
				for (j in Trigger.triggers[i]) {
					trigger = Trigger.triggers[i][j];
					elements = selector.find('.' + trigger.name);
					trigger.callback(jQuery(elements));
				}
			}
		}

	}, // end init

	/**
	 * Adds a new trigger to the triggers register array.
	 *
	 * @param {string}
	 *            name The name of the trigger as is used in css deklaration.
	 *
	 * @param {function}
	 *            callback The name of the callback function.
	 *
	 * @param {int}
	 *            priority The order priority in which the callback functions
	 *            are called. The highest priority is 1, the lowest is 9.
	 *
	 */
	addTrigger: function(name, callback, priority) {

		if (! jQuery.isFunction(callback)) {
			return false;
		}

		if (typeof priority === 'undefined' || priority > 9) {
			priority = 9;
		}

		if (! Trigger.triggers[priority]) {
			Trigger.triggers[priority] = [];
		}

		Trigger.triggers[priority].push({
			priority: priority,
			name: name,
			callback: callback
		});

		return true;

	} // end addTrigger

};

// JavaScript initialisation
jQuery(document).ready(function() {
	Trigger.init();
});