(function($){

//    var quartiers = {};

//     $('.step2 select').each(function(){
//         var select = $(this);
//         quartiers[select.attr('id')] = select;
//         select.remove();
//     });
//     //console.log(quartiers);

//     $('.step2').hide();

//     $('#commune_id').change(function(event){
//         var commune_id = $(this).val();

//         if(commune_id == 0 ){
//             $('#quartier').empty().append(quartiers['commune-1']);
//             $('.step2').show();
//         }else{
//             $('.step2').show();
//             $('#quartier').empty().append(quartiers['commune-'+commune_id]);
//         }
//     }).trigger('change');
    $('.ajaxList').change(function(event){
        var select = $(this);
        var id = '#'+select.data('target');
        //console.log(select.data('url'));
        $.get( select.data('url')+'/'+select.val(), function(data){
            if(data.error){
                alert(data.error);
            }else{
                var target = $(id).get(0);
                target.options.length = 0;
                for( var i in data.results){
                    var result = data.results[i];
                    target.options[i] = new Option(result.name, result.id, false, false);
                }
            }
        },'json' );
    });
    
})(jQuery);