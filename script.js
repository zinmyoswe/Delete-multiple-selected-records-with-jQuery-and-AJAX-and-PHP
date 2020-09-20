$(document).ready(function(){

    $('#delete').click(function(){

        var post_arr = [];
        $('#recordsTable input[type=checkbox]').each(function() {
            if (jQuery(this).is(":checked")) {
                var id = this.id;
                var splitid = id.split('_');
                var postid = splitid[1];

                post_arr.push(postid);
              
            }
        });

        if(post_arr.length > 0){
            
            var isDelete = confirm("Do you really want to delete records?");
            if (isDelete == true) {
                // AJAX Request
                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'POST',
                    data: { post_id: post_arr},
                    success: function(response){
                        $.each(post_arr, function( i,l ){
                            $("#tr_"+l).remove();
                        });
                    }
                });
            } 

        }      
    });
 
});