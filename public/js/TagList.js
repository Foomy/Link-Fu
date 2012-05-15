/**
 * This closure implements the linklist UI behavior (e.g. add or delete items).
 */

TagList = {

	putInField: function (ref) {
		ref.each(function () {

			jQuery(this).unbind('click.is_tag').bind('click.is_tag', function () {
				var tagId = jQuery(this).data('tid');

				jQuery.ajax({
					type: 'POST',
					url: '/tagname/',
					data: {
						tagId: tagId
					},
					success: function (response) {
						var actuallyChosen;

						if (! response.error) {
							actuallyChosen = jQuery('.is_linktags').val();
							if (actuallyChosen !== '') {
								jQuery('.is_linktags').val(actuallyChosen + ', ' + response.tagname);
							}
							else {
								jQuery('.is_linktags').val(response.tagname);
							}
						}
					}
				});
			});

		});
	} // end putInField()

};

Trigger.addTrigger('is_tag', TagList.putInField, 1);