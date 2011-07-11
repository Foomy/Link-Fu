/**
 * This closure implements the linklist UI behavior (e.g. add or delete items).
 */

TagList = {

	putInField: function(ref) {
		ref.each(function() {

			jQuery(this).unbind('click.is_tag').bind('click.is_tag', function() {

				/**
				 *  @todo: Implement in-place editor jquery plugin, in order
				 *         to add links into the system.
				 */
				alert('This functionality is not implementet yet.');

			});

		});
	} // end putInField()

};

Trigger.addTrigger('is_tag', TagList.putInField, 1);