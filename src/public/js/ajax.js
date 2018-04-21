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