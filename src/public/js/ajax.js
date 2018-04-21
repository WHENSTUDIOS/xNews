function clearNotifications(){
    $.ajax({
        type:'GET',
        url:'/dashboard/notifications/clear',
        data:'_token = <?php echo csrf_token(); ?>',
        success:function(data){
            $('#notificationCount').hide();
            $('#notifications').html('You have 0 new notifications.');
            $('#notification').hide();
        }
    });
}

function clearComments(id, modal){
    $.ajax({
        type:'GET',
        url:'/dashboard/articles/clearcomments/' + id,
        success:function(data){
            success('Successfully cleared comments.');
            $('#clear'+modal).modal('hide');
        }
    });
}

function resetViews(id, modal){
    $.ajax({
        type:'GET',
        url:'/dashboard/articles/clearviews/' + id,
        success:function(data){
            success('Successfully reset views to 0.');
            $('#reset'+modal).modal('hide');
            $('#views'+modal).html('0');
        }
    });
}

function success(msg){
    document.getElementById('success').style.display = 'block';
    $('#successMsg').html(msg);
}