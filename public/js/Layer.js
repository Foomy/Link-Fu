
var Layer = {

	$wrappedSet: null,
	$lContent: null,
	$lCaption: null,

	caption: '',
	content: '',

	width: 0,
	height: 0,

	top: 0,
	left: 0,
	isCenter: false,

	view: {
		width: window.innerWidth,
		heiht: window.innerHeight
	},

	init : function(ref) {
		this.$wrappedSet = jQuery(ref[0]);
		this.$lContent = jQuery('.is_layerContent');
		this.$lCaption = jQuery('.is_layerCaption');
	}, // end init

	show : function(ref) {

	}, // end show

	hide : function(ref) {

	} // end hide


};

Trigger.addTrigger('is_layer', Layer.init, 1);
Trigger.addTrigger('is_show_layer', Layer.show, 1);
Trigger.addTrigger('is_hide_layer', Layer.hide, 1);