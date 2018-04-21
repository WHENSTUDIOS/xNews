$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

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

function deletePost(id, modal){
    $.ajax({
        type:'post',
        url:'/dashboard/articles/delete/'+id,
        data: {_method: 'delete'},
        success:function(data){
            success('Successfully deleted article.');
            $('#delete'+modal).modal('hide');
            $('#l'+modal).remove();
            notify();
        }
    });
}

function deleteUser(id, modal){
    $.ajax({
        type:'post',
        url:'/dashboard/users/delete/'+id,
        data: {_method: 'delete'},
        success:function(data){
            success('Successfully deleted user.');
            $('#delete'+modal).modal('hide');
            $('#l'+modal).remove();
        }
    });
}

function success(msg){
    document.getElementById('success').style.display = 'block';
    $('#successMsg').html(msg);
}

function notify(){
    var notify = document.getElementById('notificationCount').innerHTML();
    var newNotify = notify + 1;
    $('#notificationCount').html(newNotify);
}