/**
 * Use a field as a grouping title for other fields. This provides the end
 * user with easy to understand grouping.
 *
 * Fields defined with this type are not submitted to the server, but they do
 * need to be initialised as normal using `e-api add()` or `e-init fields`.
 *
 * @name Field set title
 * @summary Field grouping display
 *
 * @scss editor.title.scss
 *
 * @example
 *     
 * new $.fn.dataTable.Editor( {
 *   "ajax": "php/dates.php",
 *   "table": "#staff",
 *   "fields": [ {
 *       "label": "Personal information",
 *       "name": "pinfo",
 *       "type": "title"
 *     }, 
 *     // additional fields...
 *   ]
 * } );
 */

(function( factory ){
	if ( typeof define === 'function' && define.amd ) {
		// AMD
		define( ['jquery', 'datatables', 'datatables-editor'], factory );
	}
	else if ( typeof exports === 'object' ) {
		// Node / CommonJS
		module.exports = function ($, dt) {
			if ( ! $ ) { $ = require('jquery'); }
			factory( $, dt || $.fn.dataTable || require('datatables') );
		};
	}
	else if ( jQuery ) {
		// Browser standard
		factory( jQuery, jQuery.fn.dataTable );
	}
}(function( $, DataTable ) {
'use strict';


if ( ! DataTable.ext.editorFields ) {
    DataTable.ext.editorFields = {};
}

var _fieldTypes = DataTable.Editor ?
    DataTable.Editor.fieldTypes :
    DataTable.ext.editorFields;


_fieldTypes.title = {
    create: function ( field )      { return $('<div/>')[0]; },
    get:    function ( field )      { return ''; },
    set:    function ( field, val ) {}
};


}));
