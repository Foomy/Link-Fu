/**
 * This closure implements the linklist UI behavior (e.g. add or delete items).
 */

Linklist = {

	addLink: function(ref) {
		ref.each(function() {

			jQuery(this).unbind('click.is_linkctrl_add').bind('click.is_linkctrl_add', function() {

				/**
				 *  @todo: Implement in-place editor jquery plugin, in order
				 *         to add links into the system.
				 */
				alert('This functionality is not implementet yet.');

			});

		});
	}, // end addLink()

	deleteLink: function(ref) {
		var id;

		ref.each(function() {

			jQuery(this).unbind('click.is_linkctrl_del').bind('click.is_linkctrl_del', function() {
				id = jQuery(this).attr('rel');

				jQuery.ajax({
					type: 'post',
					url: '/index/delete/',
					data: {
						linkId: id
					},
					dataType: 'json',
					success: function(data) {
						if (!data.error) {
							jQuery('#item_'+data.linkId).remove();
						}
					},
				});
			});

		});
	}, // end deleteLink()

	editLink: function(ref) {
		var id;

		ref.each(function() {

			jQuery(this).unbind('click.is_linkctrl_edt').bind('click.is_linkctrl_edt', function() {

				id = jQuery(this).attr('rel');
				jQuery.ajax({
					type: 'post',
					url: '/index/edit/',
					data: {
						linkId: id
					},
					dataType: 'json',
					success: function(data) {
						if (!data.error) {
							jQuery('#linkform').attr('action', '/index/update/');
							jQuery('#linkId').val(data.id);
							jQuery('#reference').val(data.reference);
							jQuery('#linktext').val(data.linktext);
						}
					}
				});

			});

		});

	} // end editLink()
};

Trigger.addTrigger('is_linkctrl_add', Linklist.addLink, 1);
Trigger.addTrigger('is_linkctrl_del', Linklist.deleteLink, 1);
Trigger.addTrigger('is_linkctrl_edt', Linklist.editLink, 1);

console.debug(Trigger.triggers);