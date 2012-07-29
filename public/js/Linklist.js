/**
 * This closure implements the linklist UI behavior.
 * (e.g. add or delete items, including pagination).
 */

Linklist = {

	deleteLink: function(ref) {
		ref.each(function() {

			jQuery(this).unbind('click').bind('click.is_linkctrl_del', function() {
				var id = jQuery(this).val();

				jQuery.ajax({
					type: 'post',
					url: '/index/delete/',
					data: {
						linkId: id
					},
					dataType: 'json',
					success: function(data) {
						if (!data.error) {
							console.log('#item_'+data.linkId);
							jQuery('#item_'+data.linkId).remove();
						}
					},
					error: function(data) {
						console.log('Fehler beim Speichern des Bookmarks ' + data.linkId);
					}
				});
			});

		});
	}, // end deleteLink()

	editLink: function(ref) {
		var id;

		ref.each(function() {

			jQuery(this).unbind('click').bind('click.is_linkctrl_edt', function() {

				id = jQuery(this).val();
				jQuery.ajax({
					type: 'post',
					url: '/index/edit/',
					data: {
						linkId: id
					},
					dataType: 'json',
					success: function(data) {
						if (!data.error) {
							jQuery('.is_linkform').attr('action', '/index/update/');
							jQuery('.is_linkid').val(data.linkId);
							jQuery('.is_linkref').val(data.reference);
							jQuery('.is_linktext').val(data.linktext);
						}
					}
				});

			});

		});

	} // end editLink()
};

Trigger.addTrigger('is_jumpto_firstpage', Linklist.first, 1);
Trigger.addTrigger('is_jumpto_prevpage', Linklist.prev, 1);
Trigger.addTrigger('is_jumpto_lastpage', Linklist.last, 1);
Trigger.addTrigger('is_jumpto_nextpage', Linklist.next, 1);

Trigger.addTrigger('is_linkctrl_add', Linklist.addLink, 1);
Trigger.addTrigger('is_linkctrl_del', Linklist.deleteLink, 1);
Trigger.addTrigger('is_linkctrl_edt', Linklist.editLink, 1);
