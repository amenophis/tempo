Tempo.behavior.create('autocomplete', function(config, statics) {

    console.log(config.callback);
    if (!config.options) {
        config.options = {};
    }
    /*$if (!config.options.postVar) {
        config.options.postVar = config.id;
    }**/
    if (!config.options.minLength) {
        config.options.minLength = 2;
    }


    var cache = {};

    config.options.source =  function( request, response ) {
        var term = request.term;
        if ( term in cache ) {
            response( cache[ term ] );
            return;
        }

        $.getJSON(config.callback, request, function( data, status, xhr ) {
            cache[ term ] = data;
            response( data );
        });
    };

    $( "#" +  config.id).autocomplete( config.options);
});