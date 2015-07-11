/**
 * Created by Work on 2015/07/11.
 */
$.fn.dataTable.Editor.fieldTypes.EditAndLink = $.extend( true, {}, $.fn.dataTable.Editor.models.fieldType, {
        // Create the HTML mark-up needed for input and add any event handlers needed
        create: function ( field ) {
            field._input = $(
                '<div>' +
                    '<input type="text" />' +
                    //'<button class="inputButton" >Go</button>' +
                    '<a href="" class="menulink" target="_blank">open</a>' +
            '</div>'
            );

            return field._input;
        },

        "get": function ( conf ) {
            return $('input', conf._input)[0].value;
        },

        "set": function ( conf, val ) {
            $('input', conf._input)[0].value = val;
            $('a', conf._input)[0].href=val;
        },

        "enable": function ( conf ) {
            conf._input.prop( 'disabled', false );
        },

        "disable": function ( conf ) {
            conf._input.prop( 'disabled', true );
        }
    } );


